<?php

namespace Sale\Handlers\PaySystem;

use Bitrix\Main\Error;
use Bitrix\Main\Request;
use Bitrix\Main\Type\DateTime;
use Bitrix\Main\Localization\Loc;
use Bitrix\Sale\PaySystem;
use Bitrix\Sale\Payment;

Loc::loadMessages(__FILE__);

class RoboxchangeHandler extends PaySystem\ServiceHandler
{
	/**
	 * @param Payment $payment
	 * @param Request|null $request
	 * @return PaySystem\ServiceResult
	 */
	public function initiatePay(Payment $payment, Request $request = null)
	{
		$params = array(
			'URL' => $this->getUrl('pay'),
			'PS_MODE' => $this->service->getField('PS_MODE'),
			'BX_PAYSYSTEM_CODE' => $payment->getPaymentSystemId(),
		);
		$this->setExtraParams($params);

		return $this->showTemplate($payment, "template");
	}

	/**
	 * @return array
	 */
	public static function getIndicativeFields()
	{
		return array('SHP_HANDLER' => 'ROBOXCHANGE');
	}

	/**
	 * @param Request $request
	 * @param $paySystemId
	 * @return bool
	 */
	static protected function isMyResponseExtended(Request $request, $paySystemId)
	{
		$id = $request->get('SHP_BX_PAYSYSTEM_CODE');
		return $id == $paySystemId;
	}

	/**
	 * @param Payment $payment
	 * @param $request
	 * @return bool
	 */
	private function isCorrectHash(Payment $payment, Request $request)
	{
		$hash = md5($request->get('OutSum').":".$request->get('InvId').":".$this->getBusinessValue($payment, 'ROBOXCHANGE_SHOPPASSWORD2').':SHP_BX_PAYSYSTEM_CODE='.$payment->getPaymentSystemId().':SHP_HANDLER=ROBOXCHANGE');

		return ToUpper($hash) == ToUpper($request->get('SignatureValue'));
	}

	/**
	 * @param Payment $payment
	 * @param Request $request
	 * @return bool
	 */
	private function isCorrectSum(Payment $payment, Request $request)
	{
		$sum = $request->get('OutSum');
		$paymentSum = $this->getBusinessValue($payment, 'PAYMENT_SHOULD_PAY');

		return (float)$paymentSum == (float)$sum;
	}

	/**
	 * @param Request $request
	 * @return mixed
	 */
	public function getPaymentIdFromRequest(Request $request)
	{
		return $request->get('InvId');
	}

	/**
	 * @return mixed
	 */
	protected function getUrlList()
	{
		return array(
			'pay' => array(
				self::TEST_URL => 'http://test.robokassa.ru/Index.aspx',
				self::ACTIVE_URL => 'https://merchant.roboxchange.com/Index.aspx'
			)
		);
	}

	/**
	 * @param Payment $payment
	 * @param Request $request
	 * @return PaySystem\ServiceResult
	 */
	public function processRequest(Payment $payment, Request $request)
	{
		$result = new PaySystem\ServiceResult();

		if ($this->isCorrectHash($payment, $request))
		{
			return $this->processNoticeAction($payment, $request);
		}
		else
		{
			PaySystem\ErrorLog::add(array(
				'ACTION' => 'processRequest',
				'MESSAGE' => 'Incorrect hash'
			));
			$result->addError(new Error('Incorrect hash'));
		}

		return $result;
	}

	/**
	 * @param Payment $payment
	 * @param Request $request
	 * @return PaySystem\ServiceResult
	 */
	private function processNoticeAction(Payment $payment, Request $request)
	{
		$result = new PaySystem\ServiceResult();

		$psStatusDescription = Loc::getMessage('SALE_HPS_ROBOXCHANGE_RES_NUMBER').": ".$request->get('InvId');
		$psStatusDescription .= "; ".Loc::getMessage('SALE_HPS_ROBOXCHANGE_RES_DATEPAY').": ".date("d.m.Y H:i:s");

		if ($request->get("IncCurrLabel") !== null)
			$psStatusDescription .= "; ".Loc::getMessage('SALE_HPS_ROBOXCHANGE_RES_PAY_TYPE').": ".$request->get("IncCurrLabel");

		$fields = array(
			"PS_STATUS" => "Y",
			"PS_STATUS_CODE" => "-",
			"PS_STATUS_DESCRIPTION" => $psStatusDescription,
			"PS_STATUS_MESSAGE" => Loc::getMessage('SALE_HPS_ROBOXCHANGE_RES_PAYED'),
			"PS_SUM" => $request->get('OutSum'),
			"PS_CURRENCY" => $this->getBusinessValue($payment, "PAYMENT_CURRENCY"),
			"PS_RESPONSE_DATE" => new DateTime(),
		);

		$result->setPsData($fields);

		if ($this->isCorrectSum($payment, $request))
		{
			$result->setOperationType(PaySystem\ServiceResult::MONEY_COMING);
		}
		else
		{
			PaySystem\ErrorLog::add(array(
				'ACTION' => 'processNoticeAction',
				'MESSAGE' => 'Incorrect sum'
			));
			$result->addError(new Error('Incorrect sum'));
		}

		return $result;
	}

	/**
	 * @param Payment $payment
	 * @return bool
	 */
	protected function isTestMode()
	{
		return ($this->getBusinessValue(null, 'PS_IS_TEST') == 'Y');
	}

	/**
	 * @return array
	 */
	public function getCurrencyList()
	{
		return array('RUB');
	}

	/**
	 * @param PaySystem\ServiceResult $result
	 * @param Request $request
	 * @return mixed
	 */
	public function sendResponse(PaySystem\ServiceResult $result, Request $request)
	{
		global $APPLICATION;
		if ($result->isResultApplied())
		{
			$APPLICATION->RestartBuffer();
			echo 'OK'.$request->get('InvId');
		}
	}

	/**
	 * @return array
	 */
	public static function getHandlerModeList()
	{
		return array(
			'Qiwi29OceanR' => Loc::getMessage('SALE_HPS_ROBOXCHANGE_QIWIR_TERMINALS'),
			'WMRM' => Loc::getMessage('SALE_HPS_ROBOXCHANGE_WMRM_EMONEY'),
			'YandexMerchantR' => Loc::getMessage('SALE_HPS_ROBOXCHANGE_YANDEXMERCHANTR_EMONEY'),
			'AlfaBankOceanR' => Loc::getMessage('SALE_HPS_ROBOXCHANGE_ALFABANKOCEANR_BANK'),
			'VTB24R' => Loc::getMessage('SALE_HPS_ROBOXCHANGE_VTB24R_BANK'),
			'BANKOCEAN2R' => Loc::getMessage('SALE_HPS_ROBOXCHANGE_OCEANBANKOCEANR_BANK'),
			'MegafonR' => Loc::getMessage('SALE_HPS_ROBOXCHANGE_MEGAFONR_MOBILE'),
			'MtsR' => Loc::getMessage('SALE_HPS_ROBOXCHANGE_MTSR_MOBILE'),
			'RapidaOceanEurosetR' => Loc::getMessage('SALE_HPS_ROBOXCHANGE_RAPIDAOCEANEUROSETR_OTHER'),
			'RapidaOceanSvyaznoyR' => Loc::getMessage('SALE_HPS_ROBOXCHANGE_RAPIDAOCEANSVYAZNOYR_OTHER')
		);
	}
}