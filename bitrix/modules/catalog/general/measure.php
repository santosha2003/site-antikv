<?php
<<<<<<< HEAD
use Bitrix\Main\Localization\Loc;
=======
use Bitrix\Main,
	Bitrix\Main\Localization\Loc,
	Bitrix\Catalog;
>>>>>>> 4bb3e4deb359749a96a02a5e4d7c22ab1399e137

Loc::loadMessages(__FILE__);
/**
 * Class CCatalogMeasureAll
 */
class CCatalogMeasureAll
{
	const DEFAULT_MEASURE_CODE = 796;
	protected static $defaultMeasure = null;
	/**
	 * @param string $action
	 * @param array $arFields
	 * @param int $id
	 * @return bool
	 */
	protected static function checkFields($action, &$arFields, $id = 0)
	{
		global $APPLICATION;
		$action = strtoupper($action);
		if ($action != 'ADD' && $action != 'UPDATE')
			return false;
		$id = (int)$id;
		if ($action == 'UPDATE' && $id <= 0)
			return false;

		if (array_key_exists('CODE', $arFields))
		{
			$code = trim($arFields['CODE']);
			if ($code === '')
			{
				$APPLICATION->ThrowException(Loc::getMessage('CAT_MEASURE_ERR_CODE_IS_ABSENT'));
				return false;
			}
			elseif(preg_match('/^[0-9]+$/', $code) !== 1)
			{
				$APPLICATION->ThrowException(Loc::getMessage('CAT_MEASURE_ERR_CODE_IS_BAD'));
				return false;
			}
			else
			{
				$arFields['CODE'] = (int)$code;
			}
		}

		$cnt = 0;
		switch ($action)
		{
			case 'ADD':
				if (!isset($arFields['CODE']))
					return false;
				$cnt = CCatalogMeasure::getList(array(), array("CODE" => $arFields['CODE']), array());
				break;
			case 'UPDATE':
				if (isset($arFields['CODE']))
					$cnt = CCatalogMeasure::getList(array(), array("CODE" => $arFields['CODE'], '!ID' => $id), array(), false, array('ID'));
				break;
		}
		if ($cnt > 0)
		{
			$APPLICATION->ThrowException(Loc::getMessage('CAT_MEASURE_ERR_CODE_ALREADY_EXISTS'));
			return false;
		}

<<<<<<< HEAD
		if((is_set($arFields, "IS_DEFAULT")) && (($arFields["IS_DEFAULT"]) == 'Y'))
		{
			$dbMeasure = CCatalogMeasure::getList(array(), array("IS_DEFAULT" => 'Y'), false, false, array('ID'));
			while($arMeasure = $dbMeasure->Fetch())
			{
				if(!self::update($arMeasure["ID"], array("IS_DEFAULT" => 'N')))
					return false;
			}
		}
=======
		if (isset($arFields["IS_DEFAULT"]) && $arFields["IS_DEFAULT"] == 'Y')
		{
			$filter = array('=IS_DEFAULT' => 'Y');
			if ($action == 'UPDATE')
				$filter['!=ID'] = $id;
			$iterator = Catalog\MeasureTable::getList(array(
				'select' => array('ID'),
				'filter' => $filter
			));
			while ($row = $iterator->fetch())
			{
				$result = Catalog\MeasureTable::update((int)$row['ID'], array('IS_DEFAULT' => 'N'));
				if (!$result->isSuccess())
					return false;
			}
			unset($result, $row, $iterator);
		}

>>>>>>> 4bb3e4deb359749a96a02a5e4d7c22ab1399e137
		return true;
	}

	/**
<<<<<<< HEAD
	 * @param $id
	 * @param $arFields
	 * @return bool|int
	 */
	public static function update($id, $arFields)
	{
		global $DB;

		$id = (int)$id;
		if(!self::checkFields('UPDATE', $arFields, $id))
			return false;

		$strUpdate = $DB->PrepareUpdate("b_catalog_measure", $arFields);
		$strSql = "UPDATE b_catalog_measure SET ".$strUpdate." WHERE ID = ".$id;
		if(!$DB->Query($strSql, true, "File: ".__FILE__."<br>Line: ".__LINE__))
			return false;
=======
	 * @deprecated deprecated since catalog 17.5.12
	 * @see \Bitrix\Catalog\MeasureTable:add
	 *
	 * @param array $arFields
	 * @return bool|int
	 */
	public static function add($arFields)
	{
		if (!static::checkFields('ADD', $arFields))
			return false;

		if (empty($arFields))
			return false;

		$id = false;
		$result = Catalog\MeasureTable::add($arFields);
		$success = $result->isSuccess();
		if (!$success)
			self::convertErrors($result);
		else
			$id = (int)$result->getId();
		unset($success, $result);

>>>>>>> 4bb3e4deb359749a96a02a5e4d7c22ab1399e137
		return $id;
	}

	/**
<<<<<<< HEAD
	 * @param $id
=======
	 * @deprecated deprecated since catalog 17.5.12
	 * @see \Bitrix\Catalog\MeasureTable:update
	 *
	 * @param int $id
	 * @param array $arFields
	 * @return bool|int
	 */
	public static function update($id, $arFields)
	{
		$id = (int)$id;
		if ($id <= 0)
			return false;
		if (!static::checkFields('UPDATE', $arFields, $id))
			return false;

		if (empty($arFields))
			return $id;

		$result = Catalog\MeasureTable::update($id, $arFields);
		$success = $result->isSuccess();
		if (!$success)
			self::convertErrors($result);
		unset($result);

		return ($success ? $id : false);
	}

	/**
	 * @deprecated deprecated since catalog 17.5.12
	 * @see \Bitrix\Catalog\MeasureTable:delete
	 *
	 * @param int $id
>>>>>>> 4bb3e4deb359749a96a02a5e4d7c22ab1399e137
	 * @return bool
	 */
	public static function delete($id)
	{
		global $DB;
		$id = (int)$id;
		if ($id > 0)
		{
			if($DB->Query("DELETE FROM b_catalog_measure WHERE ID = ".$id, true))
				return true;
		}
		return false;
	}

	public static function getDefaultMeasure($getStub = false, $getExt = false)
	{
		$getStub = ($getStub === true);
		$getExt = ($getExt === true);

		if (self::$defaultMeasure === null)
		{
			$measureRes = CCatalogMeasure::getList(
				array(),
				array('IS_DEFAULT' => 'Y'),
				false,
				false,
				array()
			);
			if ($measure = $measureRes->GetNext(true, $getExt))
			{
				$measure['ID'] = (int)$measure['ID'];
				$measure['CODE'] = (int)$measure['CODE'];
				self::$defaultMeasure = $measure;
			}
		}
		if (self::$defaultMeasure === null)
		{
			$measureRes = CCatalogMeasure::getList(
				array(),
				array('CODE' => self::DEFAULT_MEASURE_CODE),
				false,
				false,
				array()
			);
			if ($measure = $measureRes->GetNext(true, $getExt))
			{
				$measure['ID'] = (int)$measure['ID'];
				$measure['CODE'] = (int)$measure['CODE'];
				self::$defaultMeasure = $measure;
			}
		}
		if (self::$defaultMeasure === null)
		{
			if ($getStub)
			{
				$defaultMeasureDescription = CCatalogMeasureClassifier::getMeasureInfoByCode(self::DEFAULT_MEASURE_CODE);
				if ($defaultMeasureDescription !== null)
				{
					self::$defaultMeasure = array(
						'ID' => 0,
						'CODE' => self::DEFAULT_MEASURE_CODE,
						'MEASURE_TITLE' => htmlspecialcharsEx($defaultMeasureDescription['MEASURE_TITLE']),
						'SYMBOL_RUS' => htmlspecialcharsEx($defaultMeasureDescription['SYMBOL_RUS']),
						'SYMBOL_INTL' => htmlspecialcharsEx($defaultMeasureDescription['SYMBOL_INTL']),
						'SYMBOL_LETTER_INTL' => htmlspecialcharsEx($defaultMeasureDescription['SYMBOL_LETTER_INTL']),
						'IS_DEFAULT' => 'Y'
					);
					if ($getExt)
					{
						self::$defaultMeasure['~ID'] = '0';
						self::$defaultMeasure['~CODE'] = (string)self::DEFAULT_MEASURE_CODE;
						self::$defaultMeasure['~MEASURE_TITLE'] = self::$defaultMeasure['MEASURE_TITLE'];
						self::$defaultMeasure['~SYMBOL_RUS'] = self::$defaultMeasure['SYMBOL_RUS'];
						self::$defaultMeasure['~SYMBOL_INTL'] = self::$defaultMeasure['SYMBOL_INTL'];
						self::$defaultMeasure['~SYMBOL_LETTER_INTL'] = self::$defaultMeasure['SYMBOL_LETTER_INTL'];
						self::$defaultMeasure['~IS_DEFAULT'] = 'Y';
					}
				}
			}
		}
		return self::$defaultMeasure;
	}
<<<<<<< HEAD
=======

	private static function convertErrors(Main\Entity\Result $result)
	{
		global $APPLICATION;

		$oldMessages = array();
		foreach ($result->getErrorMessages() as $errorText)
			$oldMessages[] = array('text' => $errorText);
		unset($errorText);

		if (!empty($oldMessages))
		{
			$error = new CAdminException($oldMessages);
			$APPLICATION->ThrowException($error);
			unset($error);
		}
		unset($oldMessages);
	}
>>>>>>> 4bb3e4deb359749a96a02a5e4d7c22ab1399e137
}

/**
 * Class CCatalogMeasureResult
 */
class CCatalogMeasureResult extends CDBResult
{
	/**
	 * @param $res
	 */
<<<<<<< HEAD
	function CCatalogMeasureResult($res)
	{
	//    $res = new CDBResult($res);
	//	return $res;
     $res1 = new parent();
        $res1 = $res1 -> CDBResult($res);
        //parent::CDBResult($res);
=======
	public function __construct($res)
	{
		parent::__construct($res);
>>>>>>> 4bb3e4deb359749a96a02a5e4d7c22ab1399e137
	}

	/**
	 * @return array
	 */
<<<<<<< HEAD
    function Fetch()
    {
     $res1 = new parent();   // parent class CDBResult ($res) php 7.2 no error
        $res = $res1 -> Fetch();  //&& isset($res['CODE'])
        if (!empty($res))
        {
            if (array_key_exists('MEASURE_TITLE', $res) && $res["MEASURE_TITLE"] == '')
            {
                $tmpTitle = CCatalogMeasureClassifier::getMeasureTitle($res["CODE"], 'MEASURE_TITLE');
                $res["MEASURE_TITLE"] = ($tmpTitle == '') ? $res["SYMBOL_INTL"] : $tmpTitle;
            }
            if (array_key_exists('SYMBOL_RUS', $res) && $res["SYMBOL_RUS"] == '')
            {
                $tmpSymbol = CCatalogMeasureClassifier::getMeasureTitle($res["CODE"], 'SYMBOL_RUS');
                $res["SYMBOL_RUS"] = ($tmpSymbol == '') ? $res["SYMBOL_INTL"] : $tmpSymbol;
            }
            if (array_key_exists('SYMBOL', $res) && $res['SYMBOL'] == '')
            {
                $tmpSymbol = CCatalogMeasureClassifier::getMeasureTitle($res["CODE"], 'SYMBOL_RUS');
                $res["SYMBOL"] = ($tmpSymbol == '') ? $res["SYMBOL_INTL"] : $tmpSymbol;
            }
        }
        return $res;
    }

//	    $res = new CDBResult();      // php7.2 was error into DB CDBResultMysql::Fetch  too many parent (using this ... not into class )
// 		$res = $res -> Fetch();
// //		$res = parent::Fetch();
//  CCatalogMeasureResult::__construct()
//  /dist/bitrix/modules/catalog/general/measure.php:283

    /**
     * @param $res
     */
    public function __construct($res)
    {
        parent::__construct($res);
    }

}
=======
	function Fetch()
	{
		$res = parent::Fetch();
		if (!empty($res) && isset($res['CODE']))
		{
			if (array_key_exists('MEASURE_TITLE', $res) && $res["MEASURE_TITLE"] == '')
			{
				$tmpTitle = CCatalogMeasureClassifier::getMeasureTitle($res["CODE"], 'MEASURE_TITLE');
				$res["MEASURE_TITLE"] = ($tmpTitle == '') ? $res["SYMBOL_INTL"] : $tmpTitle;
			}
			if (array_key_exists('SYMBOL_RUS', $res) && $res["SYMBOL_RUS"] == '')
			{
				$tmpSymbol = CCatalogMeasureClassifier::getMeasureTitle($res["CODE"], 'SYMBOL_RUS');
				$res["SYMBOL_RUS"] = ($tmpSymbol == '') ? $res["SYMBOL_INTL"] : $tmpSymbol;
			}
			if (array_key_exists('SYMBOL', $res) && $res['SYMBOL'] == '')
			{
				$tmpSymbol = CCatalogMeasureClassifier::getMeasureTitle($res["CODE"], 'SYMBOL_RUS');
				$res["SYMBOL"] = ($tmpSymbol == '') ? $res["SYMBOL_INTL"] : $tmpSymbol;
			}
		}
		return $res;
	}
}
>>>>>>> 4bb3e4deb359749a96a02a5e4d7c22ab1399e137
