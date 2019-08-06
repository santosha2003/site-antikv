<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

$entityId = CSalePaySystemAction::GetParamValue("PAYMENT_ID");
list($orderId, $paymentId) = \Bitrix\Sale\PaySystem\Manager::getIdsByPayment($entityId);

/** @var \Bitrix\Sale\Order $order */
$order = \Bitrix\Sale\Order::load($orderId);

/** @var \Bitrix\Sale\PaymentCollection $paymentCollection */
$paymentCollection = $order->getPaymentCollection();

/** @var \Bitrix\Sale\Payment $payment */
$payment = $paymentCollection->getItemById($paymentId);

$data = \Bitrix\Sale\PaySystem\Manager::getById($payment->getPaymentSystemId());

$service = new \Bitrix\Sale\PaySystem\Service($data);
$service->initiatePay($payment);

return;

include(GetLangFileName(dirname(__FILE__)."/", "/payment.php"));
$domain = "";
if(CSalePaySystemAction::GetParamValue("TEST") == "Y")
	$domain = "sandbox.";

$arOrder = CSaleOrder::GetByID(CSalePaySystemAction::GetParamValue("ORDER_ID"));

if(CSalePaySystemAction::GetParamValue("PAYED") != "Y")
{
?>
<table border="0" width="100%" cellpadding="2" cellspacing="2">
<form action="https://www.<?=$domain?>paypal.com/cgi-bin/webscr" method="post">
	<td align="center">
		<input type="hidden" name="cmd" value="_xclick">
		<input type="hidden" name="buttonsource" value="Bitrix_Cart">
		<input type="hidden" name="business" value="<?= htmlspecialcharsEx(CSalePaySystemAction::GetParamValue("BUSINESS")) ?>">
		<input type="hidden" name="item_name" value="Invoice <?= CSalePaySystemAction::GetParamValue("ORDER_ID")." (".CSalePaySystemAction::GetParamValue("DATE_INSERT").")"?>">
		<input type="hidden" name="currency_code" value="<?= CSalePaySystemAction::GetParamValue("CURRENCY")?>">
		<input type="hidden" name="amount" value="<?=roundEx(CSalePaySystemAction::GetParamValue("SHOULD_PAY"), 2);?>">
		<input type="hidden" name="custom" value="<?= CSalePaySystemAction::GetParamValue("ORDER_ID")?>">
		<input type="hidden" name="item_number" value="<?=CSalePaySystemAction::GetParamValue("ORDER_PAYMENT_ID");?>">

		<?
		if(strlen(CSalePaySystemAction::GetParamValue("ON0"))>0)
		{
			?>
			<input type="hidden" name="on0" value="<?=urlencode(CSalePaySystemAction::GetParamValue("ON0"))?>">
			<input type="hidden" name="os0" value="<?=urlencode(CSalePaySystemAction::GetParamValue("OS0"))?>">
			<?
		}
		if(strlen(CSalePaySystemAction::GetParamValue("ON1"))>0 && strlen(CSalePaySystemAction::GetParamValue("ON0"))>0)
		{
			?>
			<input type="hidden" name="on1" value="<?=urlencode(CSalePaySystemAction::GetParamValue("ON1"))?>">
			<input type="hidden" name="os1" value="<?=urlencode(CSalePaySystemAction::GetParamValue("OS1"))?>">
			<?
		}
		if(strlen(CSalePaySystemAction::GetParamValue("NOTIFY_URL"))>0)
		{
			?>
			<input type="hidden" name="notify_url" value="<?=CSalePaySystemAction::GetParamValue("NOTIFY_URL")?>">
			<?
		}
		if(strlen(CSalePaySystemAction::GetParamValue("RETURN"))>0)
		{
			?>
			<input type="hidden" name="return" value="<?=CSalePaySystemAction::GetParamValue("RETURN")?>">
			<?
		}
		$buttonSrc = (strlen(CSalePaySystemAction::GetParamValue("BUTTON_SRC"))>0) ? CSalePaySystemAction::GetParamValue("BUTTON_SRC") : "http://www.paypal.com/en_US/i/btn/x-click-but6.gif";
		?>

		<input type="image" src="<?=$buttonSrc?>" name="submit">
	</td>
</tr>
</FORM>
</table>
<?
}
else
{
	echo GetMessage("PPL_I3");
}
?>