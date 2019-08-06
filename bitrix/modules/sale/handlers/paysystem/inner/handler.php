<?php

namespace Sale\Handlers\PaySystem;


use Bitrix\Main\Request;
use Bitrix\Sale\PaySystem;
use Bitrix\Sale\Payment;
use Bitrix\Sale\Result;
use Bitrix\Sale\Internals\UserBudgetPool;
use Bitrix\Main\Entity\EntityError;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class InnerHandler extends PaySystem\BaseServiceHandler implements PaySystem\IRefund
{
	/**
	 * @param Payment $payment
	 * @param Request|null $request
	 * @return Result
	 */
	public function initiatePay(Payment $payment, Request $request = null)
	{
		$result = new Result();

		/** @var \Bitrix\Sale\PaymentCollection $collection */
		$collection = $payment->getCollection();

		/** @var \Bitrix\Sale\Order $order */
		$order = $collection->getOrder();

		$paymentSum = Payment::roundByFormatCurrency($payment->getSum(), $order->getCurrency());
		$userBudget = Payment::roundByFormatCurrency(UserBudgetPool::getUserBudgetByOrder($order), $order->getCurrency());

		if($userBudget >= $paymentSum)
			UserBudgetPool::addPoolItem($order, ( $paymentSum * -1 ), UserBudgetPool::BUDGET_TYPE_ORDER_PAY, $payment);
		else
			$result->addError(new EntityError(Loc::getMessage('ORDER_PSH_INNER_ERROR_INSUFFICIENT_MONEY')));

		return $result;
	}

	/**
	 * @return array
	 */
	public function getCurrencyList()
	{
		return array();
	}

	public function refund(Payment $payment)
	{
		$result = new Result();

		/** @var \Bitrix\Sale\PaymentCollection $collection */
		$collection = $payment->getCollection();

		/** @var \Bitrix\Sale\Order $order */
		$order = $collection->getOrder();

		UserBudgetPool::addPoolItem($order, $payment->getSum(), UserBudgetPool::BUDGET_TYPE_ORDER_UNPAY, $payment);

		return $result;
	}

	/**
	 * @param Payment $payment
	 * @return Result
	 */
	public function creditNoDemand(Payment $payment)
	{
		return $this->initiatePay($payment);
	}
}