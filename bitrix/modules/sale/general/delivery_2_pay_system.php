<?

use \Bitrix\Sale\Internals\DeliveryPaySystemTable;
use \Bitrix\Sale\Delivery;

class CSaleDelivery2PaySystem
{
	public static $arFirstDS = array();
	public static $arFirstPS = array();

	protected static function convertDeliveryIds($oldDeliveryIds = array(), $oldProfiles = array())
	{
		if(!is_array($oldDeliveryIds))
			$oldDeliveryIds = trim(strval($oldDeliveryIds)) != "" ? array($oldDeliveryIds) : array();

		if(!is_array($oldProfiles))
			$oldProfiles = trim(strval($oldProfiles)) != "" ? array($oldProfiles) : array();

		if(empty($oldDeliveryIds) && empty($oldProfiles))
			return array();

		$qParams = array(
			"LOGIC" => "AND",
		);

		if(!empty($oldDeliveryIds))
		{
			$params = array (
				"LOGIC" => "OR",
				"%CODE" => array()
			);

			foreach($oldDeliveryIds as $id)
			{
				$params["%CODE"][] = $id.":";
				$params["%CODE"][] = $id;
			}

			$qParams[] = $params;
		}

		if(!empty($oldProfiles))
		{
			$params = array (
				"LOGIC" => "OR",
				"%CODE" => array()
			);

			foreach($oldProfiles as $id)
				$params["%CODE"][] = ":".$id;

			$qParams[] = $params;
		}

		$res = Delivery\Services\Table::getList(array(
			'filter' => $qParams,
			'select' => array("ID")
		));

		$result = array();

		while($delivery = $res->fetch())
			$result[] = $delivery["ID"];

		return $result;
	}

	public static function GetList($arFilter = array(), $arGroupBy = false, $arSelectFields = array())
	{
		$params = array();

		if(is_array($arFilter) && !empty($arFilter))
		{
			if(isset($arFilter["DELIVERY_ID"]) || $arFilter["DELIVERY_PROFILE_ID"])
			{
				$ids = self::convertDeliveryIds(
					isset($arFilter["DELIVERY_ID"]) ? $arFilter["DELIVERY_ID"] : array(),
					isset($arFilter["DELIVERY_PROFILE_ID"]) ? $arFilter["DELIVERY_PROFILE_ID"] : array()
				);

				if(!empty($ids))
					$arFilter["=DELIVERY_ID"] = $ids;

				unset($arFilter["DELIVERY_ID"]);
				unset($arFilter["DELIVERY_PROFILE_ID"]);
			}

			if(isset($arFilter["PAYSYSTEM_ID"]))
			{
				$arFilter["=PAYSYSTEM_ID"] = $arFilter["PAYSYSTEM_ID"];
				unset($arFilter["PAYSYSTEM_ID"]);
			}

			$params['filter'] = $arFilter;
		}

		//todo:
		if(is_array($arGroupBy) && !empty($arGroupBy))
			$params['group'] = array_intersect($arGroupBy, array("DELIVERY_ID", "PAYSYSTEM_ID"));

		$params["select"] = array(
			"DELIVERY_ID",
			"PAYSYSTEM_ID",
			"DELIVERY_SERVICE_CODE" => "DELIVERY_SERVICE.CODE",
			"LINK_DIRECTION"
		);

		$params["runtime"] = array( new \Bitrix\Main\Entity\ReferenceField('DELIVERY_SERVICE', 'Bitrix\Sale\Delivery\Services\Table',
			array('=this.DELIVERY_ID' => 'ref.ID')
		));

		$records = array();
		$res = DeliveryPaySystemTable::getList($params);

		$reverseOnlyRecords = array(
			'D' => array(),
			'P' => array()
		);

		while($record = $res->fetch())
		{
			if($record['LINK_DIRECTION'] == 'D')
			{
				$reverseOnlyRecords['D'][$record["DELIVERY_SERVICE_CODE"]] = false;

				if($reverseOnlyRecords['P'][$record["PAYSYSTEM_ID"]] !== false)
					$reverseOnlyRecords['P'][$record["PAYSYSTEM_ID"]] = true;
			}
			elseif($record['LINK_DIRECTION'] == 'P')
			{
				$reverseOnlyRecords['P'][$record["PAYSYSTEM_ID"]] = false;

				if($reverseOnlyRecords['D'][$record["DELIVERY_SERVICE_CODE"]] !== false)
					$reverseOnlyRecords['D'][$record["DELIVERY_SERVICE_CODE"]] = true;
			}

			$delivery = CSaleDeliveryHelper::getDeliverySIDAndProfile($record["DELIVERY_SERVICE_CODE"]);
			$record["DELIVERY_ID"] = $delivery["SID"];
			$record["DELIVERY_PROFILE_ID"] = isset($delivery["PROFILE"]) ? $delivery["PROFILE"] : null;
			unset($record["DELIVERY_SERVICE_CODE"]);
			unset($record["LINK_DIRECTION"]);
			$records[] = $record;
		}

		foreach($reverseOnlyRecords['D'] as $deliveryCode => $reverseOnly)
		{
			if($reverseOnly)
			{
				$delivery = CSaleDeliveryHelper::getDeliverySIDAndProfile($record["DELIVERY_SERVICE_CODE"]);
				$record["DELIVERY_ID"] = $delivery["SID"];
				$record["DELIVERY_PROFILE_ID"] = isset($delivery["PROFILE"]) ? $delivery["PROFILE"] : null;

				foreach(self::getFullPaySystemList() as $psId)
				{
					$record["PAYSYSTEM_ID"] = $psId;
					$records[] = $record;
				}
			}
		}

		foreach($reverseOnlyRecords['P'] as $psId => $reverseOnly)
		{
			if($reverseOnly)
			{
				foreach(self::getFullDeliveryList() as $dlvCodes)
				{
					$dlvCodes["PAYSYSTEM_ID"] = $psId;
					$records[] = $dlvCodes;
				}
			}
		}

		$result = new \CDBResult;
		$result->InitFromArray($records);
		return $result;
	}

	protected static function getFullDeliveryList()
	{
		static $result = null;

		if($result === null)
		{
			$result = array();

			foreach(Delivery\Services\Manager::getActiveList() as $dlvId => $dlvParams)
			{
				$rec = array();
				$delivery = CSaleDeliveryHelper::getDeliverySIDAndProfile(
					\CSaleDelivery::getCodeById($dlvId)
				);
				$rec["DELIVERY_ID"] = $delivery["SID"];
				$rec["DELIVERY_PROFILE_ID"] = isset($delivery["PROFILE"]) ? $delivery["PROFILE"] : null;
				$result[] = $rec;
			}
		}

		return $result;
	}

	protected static function getFullPaySystemList()
	{
		static $result = null;

		if($result === null)
		{
			$result = array();
			$dbRes = Bitrix\Sale\PaySystem\Manager::getList(array(
				'filter' => array('ACTIVE' => 'Y')
			));

			while($ps = $dbRes->fetch())
				$result[] = $ps['ID'];
		}

		return $result;
	}
	public static function isPaySystemApplicable($paySystemId, $deliveryId)
	{
		if(strlen($deliveryId) <= 0)
			return true;

		$result = false;
		$arDelivery = CSaleDeliveryHelper::getDeliverySIDAndProfile($deliveryId);
		$psInList = $dInList = $together = false;
		$dbPSRec = self::GetList();

		while($arPSRec = $dbPSRec->Fetch())
		{
			$psInRecord = $dInRecord = false;

			if($arPSRec["PAYSYSTEM_ID"] == $paySystemId)
				$psInList = $psInRecord = true;

			if($arPSRec["DELIVERY_ID"] == $arDelivery["SID"]
				&&
				(
					is_null($arPSRec["DELIVERY_PROFILE_ID"])
					||
					$arPSRec["DELIVERY_PROFILE_ID"] == $arDelivery["PROFILE"]
				)
			)
			{
				$dInList = $dInRecord = true;
			}

			if($dInRecord && $psInRecord)
			{
				$together = true;
				break;
			}
		}

		if($together)
			$result = true;
		elseif (!$psInList || !$dInList)
			$result = true;

		return $result;
	}


	public static function UpdateDelivery($ID, $arFields)
	{
		if(!is_array($arFields) || strlen($ID) <= 0)
			return false;

		$arFilterFields["DELIVERY_ID"] = $ID;

		if(isset($arFields["DELIVERY_PROFILE_ID"]))
			$arFilterFields["DELIVERY_PROFILE_ID"] = $arFields["DELIVERY_PROFILE_ID"];

		self::Delete($arFilterFields);

		if(!is_array($arFields["PAYSYSTEM_ID"]))
			$arFields["PAYSYSTEM_ID"] = array("PAYSYSTEM_ID" => $arFields["PAYSYSTEM_ID"]);

		foreach ($arFields["PAYSYSTEM_ID"] as $psId)
		{
			$arFilterFields["PAYSYSTEM_ID"] = $psId;
			self::Add($arFilterFields);
		}

		return true;
	}

	/**
	 * UpdatePaySystem
	 *
	 * @param int $ID Pay system id.
	 * @param array $arFields delivery idenificators.
	 *
	 * @return bool true if success or false otherwise.
	 */
	public static function UpdatePaySystem($ID, $arFields)
	{
		$ID = trim($ID);
		$arUpdateFields = array("PAYSYSTEM_ID" => $ID);

		if (strlen($ID) <= 0 || !is_array($arFields) || empty($arFields))
			return false;

		if ($arFields[0] == "")
			unset($arFields[0]);

		self::Delete($arUpdateFields);

		$arRecords = array();

		foreach ($arFields as $deliveryId)
		{

			$delivery = CSaleDeliveryHelper::getDeliverySIDAndProfile($deliveryId);

			if(!isset($delivery["SID"]))
				continue;

			$arUpdateFields["DELIVERY_ID"] = $delivery["SID"];

			if(isset($delivery["PROFILE"]))
				$arUpdateFields["DELIVERY_PROFILE_ID"] = $delivery["PROFILE"];
			else
				$arUpdateFields["DELIVERY_PROFILE_ID"] = null;

			self::Add($arUpdateFields);
			$arRecords[] = $arUpdateFields;
		}

		return true;
	}

	public static function Delete($arFilter)
	{
		$con = \Bitrix\Main\Application::getConnection();
		$sqlHelper = $con->getSqlHelper();

		$delParams = "";

		if(isset($arFilter["PAYSYSTEM_ID"]) && strlen($arFilter["PAYSYSTEM_ID"]) > 0)
				$delParams .= "PAYSYSTEM_ID=".$sqlHelper->forSql($arFilter["PAYSYSTEM_ID"]);

		$code = "";

		if(isset($arFilter["DELIVERY_ID"]) && strlen($arFilter["DELIVERY_ID"]) > 0)
		{
			$code .= $arFilter["DELIVERY_ID"];

			if(isset($arFilter["DELIVERY_PROFILE_ID"]) && strlen($arFilter["DELIVERY_PROFILE_ID"]) > 0)
				$code .= ":".$arFilter["DELIVERY_PROFILE_ID"];
		}

		$deliveryId = 0;

		if(strlen($code) > 0)
			$deliveryId = \CSaleDelivery::getIdByCode($code);

		if(intval($deliveryId) > 0)
			$delParams .= "DELIVERY_ID=".$sqlHelper->forSql($deliveryId);

		if(strlen($delParams) > 0)
			$con->queryExecute("DELETE FROM ".DeliveryPaySystemTable::getTableName()." WHERE ".$delParams);

		return new CDBResult();
	}

	public static function Add($arFields)
	{
		if(!isset($arFields["DELIVERY_ID"])
			||
			strlen(trim($arFields["DELIVERY_ID"])) <=0
			||
			!isset($arFields["PAYSYSTEM_ID"])
			||
			intval($arFields["PAYSYSTEM_ID"]) <=0
		)
		{
			return false;
		}

		if(isset($arFields["DELIVERY_PROFILE_ID"]) && strlen($arFields["DELIVERY_PROFILE_ID"]) > 0)
		{
			$arFields["DELIVERY_ID"] .= ":".$arFields["DELIVERY_PROFILE_ID"];
			unset($arFields["DELIVERY_PROFILE_ID"]);
		}

		$arFields["DELIVERY_ID"] = \CSaleDelivery::getIdByCode($arFields["DELIVERY_ID"]);
		$res = DeliveryPaySystemTable::add($arFields);
		return new CDBResult($res);
	}

	public static function convertEmptyAllAgent()
	{
		return "";
	}
}
?>