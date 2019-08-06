<?php
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage sale
 * @copyright 2001-2012 Bitrix
 */
namespace Bitrix\Sale\Internals;

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class PaySystemActionTable extends \Bitrix\Main\Entity\DataManager
{
	public static function getTableName()
	{
		return 'b_sale_pay_system_action';
	}

	public static function getMap()
	{
		return array(
			'ID' => array(
				'data_type' => 'integer',
				'primary' => true,
				'autocomplete' => true,
			),
			'PAY_SYSTEM_ID' => array(
				'data_type' => 'integer'
			),
			'PERSON_TYPE_ID' => array(
				'data_type' => 'integer'
			),
			'NAME' => array(
				'data_type' => 'string'
			),
			'PSA_NAME' => array(
				'data_type' => 'string'
			),
			'CODE' => array(
				'data_type' => 'string'
			),
			'SORT' => array(
				'data_type' => 'integer'
			),
			'ACTION_FILE' => array(
				'data_type' => 'string'
			),
			'RESULT_FILE' => array(
				'data_type' => 'string'
			),
			'DESCRIPTION' => array(
				'data_type' => 'string'
			),
			'NEW_WINDOW' => array(
				'data_type' => 'boolean',
				'values' => array('N', 'Y')
			),
			'PARAMS' => array(
				'data_type' => 'string'
			),
			'TARIF' => array(
				'data_type' => 'string'
			),
			'PS_MODE' => array(
				'data_type' => 'string'
			),
			'HAVE_PAYMENT' => array(
				'data_type' => 'boolean',
				'values' => array('N', 'Y')
			),
			'HAVE_ACTION' => array(
				'data_type' => 'boolean',
				'values' => array('N', 'Y')
			),
			'HAVE_RESULT' => array(
				'data_type' => 'boolean',
				'values' => array('N', 'Y')
			),
			'HAVE_PREPAY' => array(
				'data_type' => 'boolean',
				'values' => array('N', 'Y')
			),
			'HAVE_PRICE' => array(
				'data_type' => 'boolean',
				'values' => array('N', 'Y')
			),
			'HAVE_RESULT_RECEIVE' => array(
				'data_type' => 'boolean',
				'values' => array('N', 'Y')
			),
			'ENCODING' => array(
				'data_type' => 'string'
			),
			'LOGOTIP' => array(
				'data_type' => 'integer'
			),
			'ACTIVE' => array(
				'data_type' => 'boolean',
				'values' => array('N', 'Y')
			),
			'ALLOW_EDIT_PAYMENT' => array(
				'data_type' => 'boolean',
				'values' => array('N', 'Y')
			),
			'IS_CASH' => array(
				'data_type' => 'boolean',
				'values' => array('N', 'Y')
			)
		);
	}
}
