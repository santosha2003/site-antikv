<?
namespace Bitrix\Sale\Services\Base;

use Bitrix\Main\Event;
use Bitrix\Main\Loader;
use Bitrix\Sale\Internals\ServiceRestrictionTable;
use Bitrix\Sale\Internals\CollectableEntity;
use Bitrix\Main\NotImplementedException;
use Bitrix\Main\SystemException;
use Bitrix\Main\EventResult;

class RestrictionManager
{
	protected static $classNames;
	protected static $cachedFields = array();

	const MODE_CLIENT = 1;
	const MODE_MANAGER = 2;

	const SEVERITY_NONE = 0;
	const SEVERITY_SOFT = 1;
	const SEVERITY_STRICT = 2;

	const SERVICE_TYPE_SHIPMENT = 0;
	const SERVICE_TYPE_PAYMENT = 1;

	protected static function init()
	{
		if(static::$classNames != null)
			return;

		$classes = static::getBuildInRestrictions();

		Loader::registerAutoLoadClasses('sale', $classes);

		$event = new Event('sale', static::getEventName());
		$event->send();
		$resultList = $event->getResults();

		if (is_array($resultList) && !empty($resultList))
		{
			$customClasses = array();

			foreach ($resultList as $eventResult)
			{
				/** @var  EventResult $eventResult*/
				if ($eventResult->getType() != EventResult::SUCCESS)
					throw new SystemException("Can't add custom restriction class successfully");

				$params = $eventResult->getParameters();

				if(!empty($params) && is_array($params))
					$customClasses = array_merge($customClasses, $params);
			}

			if(!empty($customClasses))
			{
				Loader::registerAutoLoadClasses(null, $customClasses);
				$classes = array_merge($customClasses, $classes);
			}
		}

		static::$classNames = array_keys($classes);
	}

	/**
	 * @return string
	 * @throws NotImplementedException
	 */
	public static function getEventName()
	{
		throw new NotImplementedException;
	}

	/**
	 * @return array
	 * @throws SystemException
	 */
	public static function getClassesList()
	{
		if (static::$classNames === null)
			self::init();

		return static::$classNames;
	}

	/**
	 * @param $serviceId
	 * @param CollectableEntity $entity
	 * @param int $mode
	 * @return int
	 * @throws SystemException
	 */
	public static function checkService($serviceId, CollectableEntity $entity, $mode = self::MODE_CLIENT)
	{
		if(intval($serviceId) <= 0)
			return self::SEVERITY_NONE;

		self::init();
		$result = self::SEVERITY_NONE;
		$restrictions = static::getRestrictionsList($serviceId);

		foreach($restrictions as $rstrParams)
		{
			if(!$rstrParams['PARAMS'])
				$rstrParams['PARAMS'] = array();

			$res = $rstrParams['CLASS_NAME']::checkByEntity($entity, $rstrParams['PARAMS'], $mode, $serviceId);

			if($res == self::SEVERITY_STRICT)
				return $res;

			if($res == self::SEVERITY_SOFT && $result != self::SEVERITY_SOFT)
				$result = self::SEVERITY_SOFT;
		}

		return $result;
	}

	/**
	 * @return int
	 * @throws NotImplementedException
	 */
	protected static function getServiceType()
	{
		throw new NotImplementedException;
	}

	/**
	 * @param $serviceId
	 * @return array
	 */
	public static function getRestrictionsList($serviceId)
	{
		if(intval($serviceId) <= 0)
			return array();

		$serviceType = static::getServiceType();
		$cacheId = $serviceId."_".$serviceType;

		if (isset(static::$cachedFields[$cacheId]))
			return static::$cachedFields[$cacheId];

		$result = array();

		$dbRes = ServiceRestrictionTable::getList(array(
			'filter' => array(
				'=SERVICE_ID' => $serviceId,
				'=SERVICE_TYPE' => $serviceType
			),
			'order' => array('SORT' =>'ASC')
		));

		while($restriction = $dbRes->fetch())
			$result[$restriction["ID"]] = $restriction;

		static::$cachedFields[$cacheId] = $result;
		return $result;
	}

	/**
	 * @param $id
	 * @return array Sites from restrictions.
	 */
	public static function getSitesByServiceId($id)
	{
		if($id <= 0)
			return array();

		$result = array();

		foreach(static::getRestrictionsList($id) as $fields)
		{
			if($fields['CLASS_NAME'] == '\Bitrix\Sale\Delivery\Restrictions\BySite')
			{
				$result = $fields["PARAMS"]["SITE_ID"];
				break;
			}
		}

		return $result;
	}

	/**
	 * @param array $servicesIds
	 * @throws NotImplementedException
	 * @throws \Bitrix\Main\ArgumentException
	 * @internal
	 */
	public static function prepareData(array $servicesIds)
	{
		if(empty($servicesIds))
			return;

		$ids = array_diff($servicesIds, array_keys(static::$cachedFields));
		$serviceType = static::getServiceType();

		$dbRes = ServiceRestrictionTable::getList(array(
			'filter' => array(
				'=SERVICE_ID' => $servicesIds,
				'=SERVICE_TYPE' => $serviceType
			),
			'order' => array('SORT' =>'ASC')
		));

		while($restriction = $dbRes->fetch())
		{
			$cacheId = $restriction["SERVICE_ID"]."_".$serviceType;

			if(!isset(static::$cachedFields[$cacheId]))
				static::$cachedFields[$cacheId] = array();

			static::$cachedFields[$cacheId][$restriction["ID"]] = $restriction;
		}

		foreach($ids as $serviceId)
		{
			$cacheId = $serviceId."_".$serviceType;

			if(!isset(static::$cachedFields[$cacheId]))
				static::$cachedFields[$cacheId] = array();
		}

		/** @var \Bitrix\Sale\Services\Base\Restriction  $className */
		foreach(static::getClassesList() as $className)
			$className::prepareData($ids);
	}

	/**
	 * @return array
	 * @throws NotImplementedException
	 */
	public static function getBuildInRestrictions()
	{
		throw new NotImplementedException;
	}
}