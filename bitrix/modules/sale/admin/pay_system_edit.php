<?
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Application;
use Bitrix\Sale\Internals\PaySystemActionTable;
use Bitrix\Main\Page\Asset;
use Bitrix\Sale\Helpers\Admin\BusinessValueControl;
use Bitrix\Sale\Services\PaySystem\Restrictions;
use Bitrix\Sale\PaySystem;
use Bitrix\Sale\BusinessValue;
use Bitrix\Main\SystemException;

require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/sale/include.php");

require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/sale/lib/helpers/admin/businessvalue.php');

$saleModulePermissions = $APPLICATION->GetGroupRight("sale");
if ($saleModulePermissions < "W")
	$APPLICATION->AuthForm(GetMessage("ACCESS_DENIED"));

Loc::loadMessages(__FILE__);

$lheStyle = '
<style type="text/css">
	.bxlhe_frame_hndl_dscr {
		-moz-border-bottom-colors: none;
		-moz-border-left-colors: none;
		-moz-border-right-colors: none;
		-moz-border-top-colors: none;
		background: none repeat scroll 0 0 #FFFFFF;
		border-color: #87919C #959EA9 #9EA7B1;
		border-image: none;
		border-radius: 4px 4px 4px 4px;
		border-style: solid;
		border-width: 1px;
		box-shadow: 0 1px 0 0 rgba(255, 255, 255, 0.3), 0 2px 2px -1px rgba(180, 188, 191, 0.7) inset;
		color: #000000;
		display: inline-block;
		outline: medium none;
		vertical-align: middle;
		!important;
	}
</style>';

Asset::getInstance()->addString($lheStyle);
Asset::getInstance()->addJs("/bitrix/js/sale/pay_system.js");

\Bitrix\Sale\Delivery\Restrictions\Manager::getClassesList();

$instance = Application::getInstance();
$context = $instance->getContext();
$request = $context->getRequest();
$server = $context->getServer();
$documentRoot = Application::getDocumentRoot();

$id = (int)$request->get('ID');

if (CModule::IncludeModule("fileman"))
	$bFilemanModuleInst = true;

$aTabs = array(
	array(
		"DIV" => "edit1",
		"TAB" => GetMessage("SPSN_TAB_PAYSYS"),
		"ICON" => "sale",
		"TITLE" => GetMessage("SPSN_TAB_PAYSYS_DESCR"),
	)
);

if ($id > 0 && $request->getRequestMethod() !== 'POST')
{
	$aTabs[] = array(
		"DIV" => "edit3",
		"TAB" => GetMessage("SPS_PAY_SYSTEM_RESTRICTION"),
		"ICON" => "sale",
		"TITLE" => GetMessage("SPS_PAY_SYSTEM_RESTRICTION_DESC"),
	);
}

$tabControl = new CAdminTabControl("tabControl", $aTabs);


$errorMessage = '';
$businessValueControl = new BusinessValueControl('PAYSYSTEM');

if ($server->getRequestMethod() == "POST"
	&& ($request->get('save') !== null || $request->get('apply') !== null)
	&& $saleModulePermissions == "W"
	&& check_bitrix_sessid())
{
	$name = trim($request->get('NAME'));
	if ($name == '')
		$errorMessage .= Loc::getMessage("ERROR_NO_NAME")."<br>";

	if ($request->get('ACTION_FILE') == '')
		$errorMessage .= Loc::getMessage("ERROR_NO_ACTION_FILE")."<br>";

	$sort = (int)$request->get('SORT');

	if ($sort <= 0)
		$sort = 100;

	$actionFile = $request->get('ACTION_FILE');
	if (!$actionFile)
		$errorMessage = Loc::getMessage('SALE_PSE_ERROR_ACTION_SAVE');

	if ($errorMessage === '')
	{
		$fields = array(
			"NAME" => $name,
			"PSA_NAME" => $request->get('PSA_NAME'),
			"ACTIVE" => ($request->get('ACTIVE') != 'Y') ? 'N' : $request->get('ACTIVE'),
			"CODE" => $request->get('CODE'),
			"NEW_WINDOW" => ($request->get('NEW_WINDOW') != 'Y') ? 'N' : $request->get('NEW_WINDOW'),
			"ALLOW_EDIT_PAYMENT" => ($request->get('ALLOW_EDIT_PAYMENT') != 'Y') ? 'N' : $request->get('ALLOW_EDIT_PAYMENT'),
			"IS_CASH" => ($request->get('IS_CASH') != 'Y') ? 'N' : $request->get('IS_CASH'),
			"SORT" => $sort,
			"ENCODING" => $request->get('ENCODING'),
			"DESCRIPTION" => $request->get('DESCRIPTION'),
			"ACTION_FILE" => $actionFile
		);

		if ($request->get('PS_MODE'))
			$fields['PS_MODE'] = $request->get('PS_MODE');

		$path = PaySystem\Manager::getPathToHandlerFolder($actionFile);
		if (\Bitrix\Main\IO\File::isFileExists($documentRoot.$path.'/handler.php'))
		{
			require_once $documentRoot.$path.'/handler.php';

			$className = PaySystem\Manager::getClassNameFromPath($path);
			$fields['HAVE_PAYMENT'] = 'Y';

			if (is_subclass_of($className, '\Bitrix\Sale\PaySystem\IPrePayable'))
				$fields['HAVE_PREPAY'] = 'Y';

			if (is_subclass_of($className, '\Bitrix\Sale\PaySystem\ServiceHandler'))
				$fields['HAVE_RESULT_RECEIVE'] = 'Y';

			if (is_subclass_of($className, '\Bitrix\Sale\PaySystem\IPayable'))
				$fields['HAVE_PRICE'] = 'Y';
		}
		else
		{
			if (\Bitrix\Main\IO\File::isFileExists($documentRoot.$actionFile."/pre_payment.php"))
				$fields["HAVE_PREPAY"] = "Y";
			if (\Bitrix\Main\IO\File::isFileExists($documentRoot.$actionFile."/result.php"))
				$fields["HAVE_RESULT"] = "Y";
			if (\Bitrix\Main\IO\File::isFileExists($documentRoot.$actionFile."/action.php"))
				$fields["HAVE_ACTION"] = "Y";
			if (\Bitrix\Main\IO\File::isFileExists($documentRoot.$actionFile."/payment.php"))
				$fields["HAVE_PAYMENT"] = "Y";
			if (\Bitrix\Main\IO\File::isFileExists($documentRoot.$actionFile."/result_rec.php"))
				$fields["HAVE_RESULT_RECEIVE"] = "Y";
		}

		if($request->get('TARIF') !== null)
		{
			if ($path !== null)
			{
				if (\Bitrix\Main\IO\File::isFileExists($documentRoot.$path.'/handler.php'))
				{
					require_once $documentRoot.$path.'/handler.php';

					$className = PaySystem\Manager::getClassNameFromPath($actionFile);
					$fields["TARIF"] = $className::prepareToField($request->get('TARIF'));
				}
			}
			else
			{
				$fields["TARIF"] = CSalePaySystemsHelper::prepareTarifForSaving($actionFile, $request->get('TARIF'));
			}
		}

		$isConsumerChange = $request->get('ACTION_FILE') != $request->get('PRIOR_ACTION_FILE');
		$file = $request->getFile('LOGOTIP');

		if ($file !== null && $file["error"] == 0)
		{
			$imageFileError = CFile::CheckImageFile($file);

			if ($imageFileError === null)
			{
				$fields['LOGOTIP'] = $file;
				$fields['LOGOTIP']['del'] = trim($request->get("LOGOTIP_del"));
				$fields['LOGOTIP']['MODULE_ID'] = "sale";
				CFile::SaveForDB($fields, 'LOGOTIP', 'sale/paysystem/logotip');
			}
			else
			{
				$errorMessage .= $imageFileError.'.<br>';
			}
		}
		elseif ($request->get("LOGOTIP_del") !== null && $request->get("LOGOTIP_del") == 'Y')
		{
			$fields['LOGOTIP'] = 0;
		}

		$data = PaySystem\Manager::getHandlerDescription($request->get('ACTION_FILE'));

		if ($id > 0)
		{
			$result = PaySystemActionTable::update($id, $fields);

			if (!$result->isSuccess())
				$errorMessage .= join(',', $result->getErrorMessages()).".<br>";
		}
		else
		{
			$result = PaySystemActionTable::add($fields);
			if (!$result->isSuccess())
			{
				$errorMessage .= join(',', $result->getErrorMessages());
			}
			else
			{
				$id = $result->getId();
				if ($id > 0)
				{
					$service = new PaySystem\Service($fields);
					$currency = $service->getCurrency();
					if ($currency)
					{
						$params = array(
							'SERVICE_ID' => $id,
							'SERVICE_TYPE' => Restrictions\Manager::SERVICE_TYPE_PAYMENT,
							'PARAMS' => array('CURRENCY' => $currency)
						);
						Restrictions\Manager::getClassesList();
						$saveResult = \Bitrix\Sale\Services\PaySystem\Restrictions\Currency::save($params);
						if (!$saveResult->isSuccess())
							$errorMessage .= Loc::getMessage('SALE_PSE_ERROR_RSRT_CURRENCY_SAVE');
					}
				}
			}
		}

		if ($errorMessage === '')
		{
			if ($isConsumerChange)
			{
				$priorActionFile = $request->get('PRIOR_ACTION_FILE');
				if (empty($priorActionFile))
					BusinessValue::addConsumer('PAYSYSTEM_NEW', $data);
				else
					BusinessValue::changeConsumer('PAYSYSTEM_'.$id, $data);
			}

			if ($businessValueControl->setMapFromPost())
			{
				if ($isConsumerChange && empty($priorActionFile))
					$businessValueControl->changeConsumerKey('PAYSYSTEM_NEW', 'PAYSYSTEM_'.$id);

				if (!$businessValueControl->saveMap())
					$errorMessage .= Loc::getMessage('SALE_PSE_ERROR_SET_BIZVAL_MAP');
			}
			else
			{
				$errorMessage .= Loc::getMessage('SALE_PSE_ERROR_SET_BIZVAL_MAP');
			}
		}
	}

	if ($errorMessage === '')
	{
		if (strlen($request->get('apply')) > 0)
			LocalRedirect("sale_pay_system_edit.php?ID=".$id."&lang=".$context->getLanguage()."&".$tabControl->ActiveTabParam());
		else
			LocalRedirect("sale_pay_system.php?lang=".$context->getLanguage());
	}
}

$paySystem = array();
if ($id > 0)
{
	$dbRes = \Bitrix\Sale\PaySystem\Manager::getList(
		array(
			'filter' => array('ID' => $id),
			'order' => array("SORT" => "ASC")
		)
	);

	$paySystem = $dbRes->fetch();
}

require_once($documentRoot."/bitrix/modules/sale/prolog.php");

$APPLICATION->SetTitle(($id > 0) ? Loc::getMessage("SALE_EDIT_RECORD", array("#ID#" => $id)) : Loc::getMessage("SALE_NEW_RECORD"));

$restrictionsHtml = '';

if ($id > 0 && $request->getRequestMethod() !== 'POST')
{
	ob_start();
	require_once($documentRoot."/bitrix/modules/sale/admin/pay_system_restrictions_list.php");
	$restrictionsHtml = ob_get_contents();
	ob_end_clean();
}

require($documentRoot."/bitrix/modules/main/include/prolog_admin_after.php");

?>

<?
$aMenu = array(
	array(
		"TEXT" => Loc::getMessage("SPSN_2FLIST"),
		"LINK" => "/bitrix/admin/sale_pay_system.php?lang=".$context->getLanguage().GetFilterParams("filter_"),
		"ICON" => "btn_list"
	)
);

if ($id > 0 && $saleModulePermissions >= "W")
{
	$aMenu[] = array("SEPARATOR" => "Y");

	$aMenu[] = array(
			"TEXT" => Loc::getMessage("SPSN_NEW_PAYSYS"),
			"LINK" => "/bitrix/admin/sale_pay_system_edit.php?lang=".$context->getLanguage().GetFilterParams("filter_"),
			"ICON" => "btn_new"
		);

	$aMenu[] = array(
			"TEXT" => Loc::getMessage("SPSN_DELETE_PAYSYS"),
			"LINK" => "javascript:if(confirm('".Loc::getMessage("SPSN_DELETE_PAYSYS_CONFIRM")."')) window.location='/bitrix/admin/sale_pay_system.php?action=delete&ID[]=".$id."&lang=".$context->getLanguage()."&".bitrix_sessid_get()."#tb';",
			"WARNING" => "Y",
			"ICON" => "btn_delete"
		);
}
$contextMenu = new CAdminContextMenu($aMenu);
$contextMenu->Show();
?>

<?if ($errorMessage !== '')
	CAdminMessage::ShowMessage(array("DETAILS"=>$errorMessage, "TYPE"=>"ERROR", "MESSAGE"=>Loc::getMessage("SPSN_ERROR"), "HTML"=>true));?>

<script language="JavaScript">
function setLHEClass(lheDivId)
{
	BX.ready(
		function(){
			var lheDivObj = BX(lheDivId);

			if(lheDivObj)
				BX.addClass(lheDivObj, 'bxlhe_frame_hndl_dscr');
	});
}
</script>

<form method="POST" action="<?=$APPLICATION->GetCurPage();?>" name="pay_sys_form" enctype="multipart/form-data">
<?echo GetFilterHiddens("filter_");?>
<input type="hidden" name="Update" value="Y">
<input type="hidden" name="lang" value="<?=$context->getLanguage();?>">
<input type="hidden" name="ID" value="<?=$id;?>" id="ID">
<?=bitrix_sessid_post();?>

<?
$tabControl->Begin();
$tabControl->BeginNextTab();
?>
	<?if ($id>0):?>
		<tr>
			<td width="40%">ID:</td>
			<td width="60%"><?=$id;?></td>
		</tr>
	<?endif;?>
	<tr class="adm-detail-required-field">
		<td width="40%" valign="top"><?=Loc::getMessage("SPS_ACT_FILE");?>:</td>
		<td width="60%" valign="top">
			<select name="ACTION_FILE" onchange='BX.Sale.PaySystem.getHandlerOptions(this)'>
				<?
					$handlerList = Bitrix\Sale\PaySystem\Manager::getHandlerList();

					if ($request->get('ACTION_FILE') !== null)
						$handlerName = $request->get('ACTION_FILE');
					else
						$handlerName = $paySystem['ACTION_FILE'];
					if (strpos($paySystem['ACTION_FILE'], '/') !== false)
					{
						$psTitle = '';
						$data = array();
						if (\Bitrix\Main\IO\File::isFileExists($documentRoot.$handlerName.'/.description.php'))
						{
							include $documentRoot.$handlerName.'/.description.php';

							if ($psTitle)
							{
								if (strrpos($paySystem['ACTION_FILE'], 'modules/sale') !== false)
									$handlerList['SYSTEM'][$handlerName] = $psTitle;
								else
									$handlerList['USER'][$handlerName] = $psTitle;
							}
							elseif ($data)
							{
								$handlerList['SYSTEM'][$handlerName] = $data['NAME'];
							}
						}
					}
				?>
				<option value=""><?=Loc::getMessage("SPS_NO_ACT_FILE") ?></option>
				<?if ($handlerList['USER']):?>
					<optgroup label="<?=Loc::getMessage("SPS_ACT_USER");?>">
						<?foreach($handlerList['USER'] as $handler => $title): ?>
							<option value="<?=htmlspecialcharsbx($handler) ?>"<?=(ToLower($handlerName) == $handler) ? " selected" : '';?>>
								<?=htmlspecialcharsbx($title);?>
							</option>
						<?endforeach;?>
					</optgroup>
				<?endif;?>
				<optgroup label="<?=Loc::getMessage("SPS_ACT_SYSTEM");?>">
					<?
					$innerId = PaySystem\Manager::getInnerPaySystemId();
					foreach($handlerList['SYSTEM'] as $handler => $title):?>
						<?
							if ($innerId > 0 && $handler == 'inner' && $handlerName != 'inner')
								continue;
						?>
						<option value="<?=htmlspecialcharsbx($handler) ?>"<?=(ToLower($handlerName) == ToLower($handler) ? " selected" : '');?>>
							<?=htmlspecialcharsEx($title) ?>
						</option>
					<?endforeach;?>
				</optgroup>
			</select>
			<input type="hidden" value="<?=$paySystem['ACTION_FILE']?>" name="PRIOR_ACTION_FILE">
		</td>
	</tr>
	<tbody id="pay_system_ps_mode">
		<?
			$psMode = $request->get('PS_MODE') ? $request->get('PS_MODE') : $paySystem['PS_MODE'];
		?>
		<?if ($paySystem['PS_MODE'] || $request->get('PS_MODE')):?>
			<tr>
				<td width="40%" valign="top"><?=Loc::getMessage("F_PS_MODE");?>:</td>
				<td width="60%" valign="top">
					<?
						$className = PaySystem\Manager::getClassNameFromPath($handlerName);

						if (!class_exists($className))
						{
							$path = PaySystem\Manager::getPathToHandlerFolder($handler);
							if ($path)
								require_once $documentRoot.$path.'/handler.php';
						}

						if (!class_exists('\Bitrix\Sale\Internals\Input\Enum'))
							require $documentRoot.'/bitrix/modules/sale/lib/internals/input.php';

						if (class_exists($className))
						{
							echo Bitrix\Sale\Internals\Input\Enum::getEditHtml(
								'PS_MODE',
								array('OPTIONS' => $className::getHandlerModeList()), $psMode);
						}
					?>
				</td>
			</tr>
		<?endif;?>
	</tbody>
	<tr class="adm-detail-required-field">
		<td width="40%"><?=Loc::getMessage("F_PSA_NAME");?>:</td>
		<td width="60%">
			<?
			$psaName = $request->get('PSA_NAME') ? $request->get('PSA_NAME') : $paySystem['PSA_NAME'];
			?>
			<input type="text" name="PSA_NAME" value="<?=htmlspecialcharsbx($psaName);?>" size="40">
		</td>
	</tr>
	<tr class="adm-detail-required-field">
		<td width="40%"><?=Loc::getMessage("F_NAME");?>:</td>
		<td width="60%">
			<?
				$name = $request->get('NAME') ? $request->get('NAME') : $paySystem['NAME'];
			?>
			<input type="text" name="NAME" value="<?=htmlspecialcharsbx($name);?>" size="40">
		</td>
	</tr>
	<tr>
		<td width="40%"><label for="ACTIVE"><?=Loc::getMessage("F_ACTIVE");?>:</label></td>
		<td width="60%">
			<?
				if ($request->isPost())
					$active = $request->get('ACTIVE') ? $request->get('ACTIVE') : '';
				else
					$active = isset($paySystem['ACTIVE']) ? $paySystem['ACTIVE'] : 'Y';
			?>
			<input type="checkbox" name="ACTIVE" id="ACTIVE" value="Y" <?=($active == 'Y' ? 'checked' : '')?>>
		</td>
	</tr>
	<tr>
		<td width="40%"><?=Loc::getMessage("F_SORT");?>:</td>
		<td width="60%">
			<?
				$sort = $request->get('SORT') ? $request->get('SORT') : $paySystem['SORT'];
			?>
			<input type="text" name="SORT" value="<?=htmlspecialcharsbx($sort)?>" size="5">
		</td>
	</tr>
	<tr>
		<td width="40%" valign="top"><?=Loc::getMessage("F_DESCRIPTION");?>:</td>
		<td width="60%" valign="top">
			<?
				$description = $request->get('DESCRIPTION') ? $request->get('DESCRIPTION') : $paySystem['DESCRIPTION'];
			?>
			<?=wrapDescrLHE("DESCRIPTION", $description, "hndl_dscr_".$id);?>
			<script language="JavaScript">setLHEClass('bxlhe_frame_hndl_dscr_<?=$id;?>'); </script>
		</td>
	</tr>
	<tr>
		<td width="40%" valign="top"><?=Loc::getMessage('SPS_LOGOTIP')?>:</td>
		<td width="60%" valign="top">
			<div><input type="file" name="LOGOTIP"></div>
			<?if ($paySystem["LOGOTIP"] > 0):?>
				<br>
				<?
				$logoFileArray = CFile::GetFileArray($paySystem["LOGOTIP"]);
				echo CFile::ShowImage($logoFileArray, 150, 150, "border=0", "", false);
				?>
				<?if (!empty($paySystem["LOGOTIP"])) :?>
					<div style="margin-top:10px;">
						<input type="checkbox" name="LOGOTIP_del" value="Y" id="LOGOTIP_del" >
						<label for="LOGOTIP_del"><?=Loc::getMessage("SPS_LOGOTIP_DEL");?></label>
					</div>
				<?endif;?>
			<?endif;?>
		</td>
	</tr>
	<tr>
		<td width="40%" align="right"><label for="NEW_WINDOW"><?=Loc::getMessage("SPS_NEW_WINDOW");?>:</label></td>
		<td width="60%">
			<?
				if ($request->isPost())
					$active = $request->get('NEW_WINDOW') ? $request->get('NEW_WINDOW') : '';
				else
					$active = isset($paySystem['NEW_WINDOW']) ? $paySystem['NEW_WINDOW'] : 'N';
			?>

			<input type="checkbox" name="NEW_WINDOW" id="NEW_WINDOW" value="Y"<?=($active == 'Y') ? ' checked' : '';?>>
		</td>
	</tr>
	<tr>
		<td width="40%" align="right"><label for="IS_CASH"><?=Loc::getMessage("SPS_IS_CASH");?>:</label></td>
		<?
			$isCash = ($request->isPost()) ? $request->get('IS_CASH') : $paySystem['IS_CASH'];
		?>
		<td width="60%">
			<select name="IS_CASH">
				<option value="Y" <? if ($isCash == "Y") echo "selected"?>><?=Loc::getMessage('SALE_RDL_ACTION_YES');?></option>
				<option value="N" <? if ($isCash == "N") echo "selected"?>><?=Loc::getMessage('SALE_RDL_ACTION_NO');?></option>
			</select>
		</td>
	</tr>
	<tr>
		<td width="40%" align="right"><label for="ALLOW_EDIT_PAYMENT"><?=Loc::getMessage("SPS_ALLOW_EDIT_PAYMENT");?>:</label></td>
		<td width="60%">
			<?
				if ($request->isPost())
					$allowEditPayment = $request->get('ALLOW_EDIT_PAYMENT') ? $request->get('ALLOW_EDIT_PAYMENT') : '';
				else
					$allowEditPayment = isset($paySystem['ALLOW_EDIT_PAYMENT']) ? $paySystem['ALLOW_EDIT_PAYMENT'] : 'Y';
			?>

			<input type="checkbox" name="ALLOW_EDIT_PAYMENT" id="ALLOW_EDIT_PAYMENT" value="Y"<?=($allowEditPayment == 'Y') ? ' checked' : '';?>>
		</td>
	</tr>
	<tr>
		<td width="40%" align="right"><?=Loc::getMessage("SPS_ENCODING");?>:</td>
		<td width="60%">
			<select name="ENCODING">
				<option value="" <? if ($paySystem['ENCODING'] == "") echo "selected"?>></option>
				<option value="windows-1251" <? if ($paySystem['ENCODING'] == "windows-1251") echo "selected"?>>windows-1251</option>
				<option value="utf-8" <? if ($paySystem['ENCODING'] == "utf-8") echo "selected"?>>utf-8</option>
				<option value="iso-8859-1" <? if ($paySystem['ENCODING'] == "iso-8859-1") echo "selected"?>>iso-8859-1</option>
			</select>
		</td>
	</tr>
	<tr>
		<td width="40%"><?=Loc::getMessage("F_CODE");?>:</td>
		<td width="60%">
			<?
				$code = $request->get('CODE') ? $request->get('CODE') : $paySystem['CODE'];
			?>
			<input type="text" name="CODE" value="<?=htmlspecialcharsbx($code);?>" size="40">
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center" class="heading">
			<?=Loc::getMessage('SALE_PSE_BIS_VAL_SETTINGS')?>
		</td>
	</tr>
	<tr>
		<td colspan="2" id="paysystem-business-value-settings" style="padding-top: 10px">
			<?
				if ($request->get('ACTION_FILE') !== null)
				{
					$data = PaySystem\Manager::getHandlerDescription($request->get('ACTION_FILE'));

					if ($id > 0)
					{
						$consumer = 'PAYSYSTEM_'.$id;
						try
						{
							BusinessValue::changeConsumer($consumer, $data);
						}
						catch (SystemException $e)
						{
							BusinessValue::addConsumer('PAYSYSTEM_'.$id, $data);
						}
					}
					else
					{
						$consumer = 'PAYSYSTEM_NEW';
						if ($data)
							BusinessValue::addConsumer($consumer, $data);
					}

					$businessValueControl->renderMap(array('CONSUMER_KEY' => $consumer));
				}
				elseif ($id > 0)
				{
					$businessValueControl->renderMap(array('CONSUMER_KEY' => 'PAYSYSTEM_'.$id));
				}
			?>
		</td>
	</tr>
	<tbody id="pay_system_tariff">
		<?
			$actionFile = ($request->get('ACTION_FILE')) ? $request->get('ACTION_FILE') : $paySystem['ACTION_FILE'];
			$tariffBlock = '';

			$tariff = PaySystem\Manager::getTariff($actionFile, $paySystem['ID']);
			if($tariff)
			{
				$tariffBlock = '<tr class="heading"><td align="center" colspan="2">'.Loc::getMessage('SALE_PS_TARIFF').'</td></tr>';

				$arMultiControlQuery = array();
				foreach ($tariff as $fieldId => $arField)
				{
					if(!empty($arMultiControlQuery)
						&&
						(!isset($arField['MCS_ID'])|| !array_key_exists($arField['MCS_ID'], $arMultiControlQuery))
					)
					{
						$tariffBlock .= CSaleHelper::getAdminMultilineControl($arMultiControlQuery);
						$arMultiControlQuery = array();
					}

					$controlHtml = CSaleHelper::getAdminHtml($fieldId, $arField, 'TARIF', 'pay_sys_form');

					if($arField["TYPE"] == 'MULTI_CONTROL_STRING')
					{
						$arMultiControlQuery[$arField['MCS_ID']]['CONFIG'] = $arField;
						continue;
					}
					elseif(isset($arField['MCS_ID']))
					{
						$arMultiControlQuery[$arField['MCS_ID']]['ITEMS'][] = $controlHtml;
						continue;
					}

					$tariffBlock .= CSaleHelper::wrapAdminHtml($controlHtml, $arField);
				}

				if(!empty($arMultiControlQuery))
					$tariffBlock .= CSaleHelper::getAdminMultilineControl($arMultiControlQuery);

				echo $tariffBlock;
				echo "<script type=\"text/javascript\">BX.Sale.PaySystem.initTariffLoad();</script>";
			}
		?>
	</tbody>
<?

$tabControl->EndTab();

if ($restrictionsHtml !== ''):?>
	<?$tabControl->BeginNextTab();?>
		<tr><td id="sale-paysystem-restriction-container"><?=$restrictionsHtml?></td></tr>
	<?$tabControl->EndTab();
endif;

$tabControl->Buttons(
		array(
				"disabled" => ($saleModulePermissions < "W"),
				"back_url" => "/bitrix/admin/sale_pay_system.php?lang=".$context->getLanguage().GetFilterParams("filter_")
			)
	);
$tabControl->End();
?>
</form>
<script language="JavaScript">
	BX.message({
		SALE_RDL_RESTRICTION: '<?=Loc::getMessage("SALE_RDL_RESTRICTION")?>',
		SALE_RDL_SAVE: '<?=Loc::getMessage("SALE_RDL_SAVE")?>',
		SALE_PS_MODE: '<?=Loc::getMessage("F_PS_MODE")?>'
	});
</script>
<?
require($documentRoot."/bitrix/modules/main/include/epilog_admin.php");

function wrapDescrLHE($inputName, $content = '', $divId = false)
{
	ob_start();
	$ar = array(
		'inputName' => $inputName,
		'height' => '160',
		'width' => '100%',
		'content' => $content,
		'bResizable' => true,
		'bManualResize' => true,
		'bUseFileDialogs' => false,
		'bFloatingToolbar' => false,
		'bArisingToolbar' => false,
		'bAutoResize' => true,
		'bSaveOnBlur' => true,
		'toolbarConfig' => array(
			'Bold', 'Italic', 'Underline', 'Strike',
			'CreateLink', 'DeleteLink',
			'Source', 'BackColor', 'ForeColor'
		)
	);

	if($divId)
		$ar['id'] = $divId;

	$LHE = new CLightHTMLEditor;
	$LHE->Show($ar);
	$sVal = ob_get_contents();
	ob_end_clean();

	return $sVal;
}

?>
