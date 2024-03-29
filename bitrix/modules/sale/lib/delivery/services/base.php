<?php
namespace Bitrix\Sale\Delivery\Services;

use Bitrix\Main\Event;
use Bitrix\Sale\Delivery;
use Bitrix\Sale\Shipment;
use Bitrix\Main\EventResult;
use Bitrix\Main\SystemException;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

/* Inputs for deliveries */
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/sale/lib/delivery/inputs.php");

/**
 * Class Base (abstract)
 * Base class for delivery services
 * @package Bitrix\Sale\Delivery
 */
abstract class Base
{
	protected $id = 0;
	protected $name = "";
	protected $code = "";
	protected $sort = 100;
	protected $logotip = 0;
	protected $parentId = 0;
	protected $currency = "";
	protected $active = false;
	protected $description = "";
	protected $config = array();
	protected $restricted = false;
	protected $trackingClass = "";
	protected $extraServices = array();
	protected $trackingParams = array();
	protected $allowEditShipment = array();

	protected static $isProfile = false;
	protected static $canHasProfiles = false;
	protected static $isCalculatePriceImmediately = false;
	protected static $whetherAdminExtraServicesShow = false;

	const EVENT_ON_CALCULATE = "onSaleDeliveryServiceCalculate";

	/**
	 * Constructor
	 * @param array $initParams Delivery service params
	 * @throws \Bitrix\Main\ArgumentNullException
	 * @throws \Bitrix\Main\ArgumentTypeException
	 * @throws \Bitrix\Main\SystemException
	 */
	public function __construct(array $initParams)
	{
		$initParams = $this->prepareFieldsForUsing($initParams);

		if(isset($initParams["PARENT_ID"]))
			$this->parentId = $initParams["PARENT_ID"];
		else
			$this->parentId = 0;

		if(!isset($initParams["ACTIVE"]))
			$initParams["ACTIVE"] = "N";

		if(!isset($initParams["NAME"]))
			$initParams["NAME"] = "";

		if(!isset($initParams["CONFIG"]))
			$initParams["CONFIG"] = array();

		if(!is_array($initParams["CONFIG"]))
			throw new \Bitrix\Main\ArgumentTypeException("CONFIG", "array");

		$this->active = $initParams["ACTIVE"];
		$this->name = $initParams["NAME"];
		$this->config = $initParams["CONFIG"];

		if(isset($initParams["ID"]) )
			$this->id = $initParams["ID"];

		if(isset($initParams["DESCRIPTION"]))
			$this->description = $initParams["DESCRIPTION"];

		if(isset($initParams["CODE"]))
			$this->code = $initParams["CODE"];

		if(isset($initParams["SORT"]))
			$this->sort = $initParams["SORT"];

		if(isset($initParams["LOGOTIP"]))
			$this->logotip = $initParams["LOGOTIP"];

		if(isset($initParams["CURRENCY"]))
			$this->currency = $initParams["CURRENCY"];

		if(isset($initParams["ALLOW_EDIT_SHIPMENT"]))
			$this->allowEditShipment = $initParams["ALLOW_EDIT_SHIPMENT"];

		if(isset($initParams["RESTRICTED"]))
			$this->restricted = $initParams["RESTRICTED"];

		$this->trackingParams = is_array($initParams["TRACKING_PARAMS"]) ? $initParams["TRACKING_PARAMS"] : array();

		if(isset($initParams["EXTRA_SERVICES"]))
			$this->extraServices = new \Bitrix\Sale\Delivery\ExtraServices\Manager($initParams["EXTRA_SERVICES"], $this->currency);
		elseif($this->id > 0)
			$this->extraServices = new \Bitrix\Sale\Delivery\ExtraServices\Manager($this->id, $this->currency);
		else
			$this->extraServices = new \Bitrix\Sale\Delivery\ExtraServices\Manager(array(), $this->currency);
	}

	/**
	 * Calculates delivery price
	 * @param \Bitrix\Sale\Shipment $shipment.
	 * @param array $extraServices.
	 * @return \Bitrix\Sale\Delivery\CalculationResult
	 */
	public function calculate(\Bitrix\Sale\Shipment $shipment = null, $extraServices = array()) // null for compability with old configurable services api
	{
		if($shipment && !$shipment->getCollection())
			return false;

		$result = $this->calculateConcrete($shipment);

		if($shipment)
		{
			if(empty($extraServices))
				$extraServices = $shipment->getExtraServices();

			$this->extraServices->setValues($extraServices);
			$this->extraServices->setOperationCurrency($shipment->getCurrency());
			$extraServicePrice = $this->extraServices->getTotalCost();

			if(floatval($extraServicePrice) > 0)
				$result->setExtraServicesPrice($extraServicePrice);
		}

		$eventParams = array(
			"RESULT" => $result,
			"SHIPMENT" => $shipment
		);

		$event = new Event('sale', self::EVENT_ON_CALCULATE, $eventParams);
		$event->send();
		$resultList = $event->getResults();

		if (is_array($resultList) && !empty($resultList))
		{
			foreach ($resultList as &$eventResult)
			{
				if ($eventResult->getType() != EventResult::SUCCESS)
					continue;

				$params = $eventResult->getParameters();

				if(isset($params["RESULT"]))
					$result = $params["RESULT"];
			}
		}

		return $result;
	}

	/**
	 * @return Delivery\ExtraServices\Manager[]
	 */
	public function getExtraServices()
	{
		return $this->extraServices;
	}

	/**
	 * @return string The currency of delivery service.
	 */
	public function getCurrency()
	{
		return $this->currency;
	}

	/**
	 * @param Shipment $shipment
	 * @return float|int
	 */
	protected static function calculateShipmentPrice(\Bitrix\Sale\Shipment $shipment)
	{
		$result = 0;

		foreach($shipment->getShipmentItemCollection() as $shipmentItem)
		{
			/** @var  \Bitrix\Sale\BasketItem $basketItem */
			$basketItem = $shipmentItem->getBasketItem();
			$result += $basketItem->getPrice();
		}

		return $result;
	}

	/**
	 * Returns class name
	 * @return string
	 */
	public static function getClassTitle()
	{
		return "";
	}

	/**
	 * Returns class description
	 * @return string
	 */
	public static function getClassDescription()
	{
		return "";
	}

	/**
	 * @param \Bitrix\Sale\Shipment $shipment.
	 * @return \Bitrix\Sale\Delivery\CalculationResult
	 */
	abstract protected function calculateConcrete(\Bitrix\Sale\Shipment $shipment);

	/**
	 * @param array $fields
	 * @return array
	 * @throws SystemException
	 */
	public function prepareFieldsForSaving(array $fields)
	{
		$strError = "";

		$structure = $fields["CLASS_NAME"]::getConfigStructure();
		foreach($structure as $key1 => $rParams)
		{
			foreach($rParams["ITEMS"] as $key2 => $iParams)
			{
				if($iParams["TYPE"] == "DELIVERY_SECTION")
					continue;

				$errors = \Bitrix\Sale\Internals\Input\Manager::getError($iParams, $fields["CONFIG"][$key1][$key2]);

				if(!empty($errors))
				{
					$strError .= Loc::getMessage("SALE_DLVR_BASE_FIELD")." \"".$iParams["NAME"]."\": ".implode("<br>\n", $errors)."<br>\n";
				}
			}
		}

		if($strError != "")
			throw new SystemException($strError);

		return $fields;
	}

	/**
	 * Returns service configuration (only structure without values)
	 * @return array
	 * @throws \Exception
	 */
	protected function getConfigStructure()
	{
		return array();
	}

	/**
	 * @param array $confStructure The structure of configuration
	 * @param array $confValues The configuration's values
	 * @return array glued config with values
	 */
	protected function glueValuesToConfig(array $confStructure, $confValues = array())
	{
		if(!is_array($confValues))
			$confValues = array();

		if(isset($confStructure["ITEMS"]) && is_array($confStructure["ITEMS"]))
		{
			$confStructure["ITEMS"] = $this->glueValuesToConfig($confStructure["ITEMS"], $confValues);
		}
		else
		{
			foreach($confStructure as $itemKey => $itemParams)
			{
				if(isset($confStructure[$itemKey]["VALUE"]))
					continue;

				if(isset($itemParams["ITEMS"]) && is_array($itemParams["ITEMS"]))
					$confStructure[$itemKey]["ITEMS"] = $this->glueValuesToConfig($itemParams["ITEMS"], $confValues[$itemKey]);
				elseif(isset($confValues[$itemKey]))
					$confStructure[$itemKey]["VALUE"] = $confValues[$itemKey];
				elseif(!isset($itemParams["VALUE"]) && isset($itemParams["DEFAULT"]))
					$confStructure[$itemKey]["VALUE"] = $itemParams["DEFAULT"];
			}
		}

		return $confStructure;
	}

	/**
	 * @return array
	 * @throws SystemException
	 */
	public function getConfig()
	{
		$configStructure = $this->getConfigStructure();

		if(!is_array($configStructure))
			throw new SystemException ("Method getConfigStructure() must return an array!");

		foreach($configStructure as $key => $configSection)
			$configStructure[$key] = $this->glueValuesToConfig($configSection, isset($this->config[$key]) ? $this->config[$key] : array());

		return $configStructure;
	}

	/**
	 * @return array Fields witch user will see on delivery admin page
	 */
	public static function getAdminFieldsList()
	{
		return Table::getMap();
	}

	/**
	 * @return bool Show or not restrictions on admin page
	 * For example lib/delivery/services/group.php: we must hide it on public page always, and nobody can cancel this.
	 */
	public static function whetherAdminRestrictionsShow()
	{
		return true;
	}

	/**
	 * @return bool Can this services has children.
	 */
	public static function canHasChildren()
	{
		return false;
	}

	/**
	 * @return bool Can this services has profiles.
	 */
	public static function canHasProfiles()
	{
		return self::$canHasProfiles;
	}

	/**
	 * @return array profiles handlers class names
	 */
	public static function getChildrenClassNames()
	{
		return array();
	}

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getCode()
	{
		return $this->code;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @return int
	 */
	public function getParentId()
	{
		return $this->parentId;
	}

	/**
	 * @return mixed
	 */
	public function getSort()
	{
		return $this->sort;
	}

	/**
	 * @return string
	 */
	public function getNameWithParent()
	{
		$result =  $this->name;

		if($parent = $this->getParentService())
			$result = $parent->getName()." (".$result.")";

		return $result;
	}

	/**
	 * @return int
	 */
	public function getLogotip()
	{
		return $this->logotip;
	}

	/**
	 * @return string
	 */
	public function getLogotipPath()
	{
		$logo = $this->getLogotip();
		return intval($logo) > 0 ? \CFile::GetPath($logo) : "";
	}

	/**
	 * @return Base
	 */
	public function getParentService()
	{
		return null;
	}

	/**
	 * @param array $fields
	 * @return array
	 */
	public function prepareFieldsForUsing(array $fields)
	{
		return $fields;
	}

	/**
	 * @return array
	 */
	public function getEmbeddedExtraServicesList()
	{
		return array();

		/*
		exapmple for concrete handlers
		return array(
			"ZAPALECH" => array(
				"NAME" => "extra service name",
				"SORT" => 50,
				"RIGHTS" => "YYY",
				"ACTIVE" => "Y",
				"CLASS_NAME" => '\Bitrix\Sale\Delivery\ExtraServices\Checkbox',
				"DESCRIPTION" => "Extra service description",
				"PARAMS" => array("PRICE" => 2000)
			)
		);
		*/
	}

	/**
	* @return bool If admin could edit extra services
	*/
	public static function whetherAdminExtraServicesShow()
	{
		return self::$whetherAdminExtraServicesShow;
	}

	/**
	 * @param int $serviceId
	 * @param array $fields
	 * @return bool
	 */
	public static function onAfterAdd($serviceId, array $fields = array())
	{
		return true;
	}

	/**
	 * @param int $serviceId
	 * @param array $fields
	 * @return bool
	 */
	public static function onAfterUpdate($serviceId, array $fields = array())
	{
		return true;
	}

	/**
	 * @param int $serviceId
	 * @return bool
	 */
	public static function onAfterDelete($serviceId)
	{
		return true;
	}

	/**
	 * @param Shipment $shipment
	 * @return bool
	 */
	public function isCompatible(Shipment $shipment)
	{
		return true;
	}

	/**
	 * @return array
	 */
	public function getProfilesList()
	{
		return array();
	}

	/**
	 * @return bool
	 */
	public static function isProfile()
	{
		return self::$isProfile;
	}

	/**
	 * @return string Class name inherited from \Bitrix\Sale\Delivery\Tracking\Base
	 */
	public function getTrackingClass()
	{
		return $this->trackingClass;
	}

	/**
	 * @param string $class Class name inherited from \Bitrix\Sale\Delivery\Tracking\Base
	 */
	public function setTrackingClass($class)
	{
		$this->trackingClass = $class;
	}

	/**
	 * @return array
	 */
	public function getTrackingParams()
	{
		return $this->trackingParams;
	}

	/**
	 * @return bool
	 */
	public function isCalculatePriceImmediately()
	{
		return self::$isCalculatePriceImmediately;
	}

	/**
	 * @return bool
	 */
	public function isRestricted()
	{
		return $this->restricted;
	}

	/**
	 * @return array
	 */
	public static function onGetBusinessValueConsumers()
	{
		return array();
	}

	/**
	 * @return bool
	 */
	public static function isInstalled()
	{
		return true;
	}

	public static function install()
	{
		return true;
	}

	public static function unInstall()
	{
		return true;
	}

	/**
	 * @return array
	 */
	public function isAllowEditShipment()
	{
		return $this->allowEditShipment != 'N';
	}


}