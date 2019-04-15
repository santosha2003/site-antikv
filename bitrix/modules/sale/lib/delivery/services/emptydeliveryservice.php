<?php

namespace Bitrix\Sale\Delivery\Services;

use Bitrix\Main\Localization\Loc;
use Bitrix\Currency;

Loc::loadMessages(__FILE__);

/**
 * Class EmptyDeliveryService
 * @package Bitrix\Sale\Delivery\Services
 */

class EmptyDeliveryService extends Configurable
{
	/**
	 * @return string Class title.
	 */
	public static function getClassTitle()
	{
		return Loc::getMessage('SALE_DLVR_HANDL_EMP_DLV_SRV_TITLE');
	}

	/**
	 * @return string Class, service description.
	 */
	public static function getClassDescription()
	{
		return Loc::getMessage('SALE_DLVR_HANDL_EMP_DLV_SRV_DESC');
	}

	/**
	 * @return int
	 * @throws \Bitrix\Main\ArgumentException
	 */
	public static function getEmptyDeliveryServiceId()
	{
		$res = Table::getList(
			array(
				'select' => array('ID'),
				'filter' => array('=CLASS_NAME' => '\Bitrix\Sale\Delivery\Services\EmptyDeliveryService')
			)
		);

		$data = $res->fetch();

		return ($data) ? $data['ID'] : 0;
	}
}