<?php

namespace Bitrix\Sale\Bigdata;

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class TargetSaleMailConnector extends \Bitrix\Sender\Connector
{
	public function getName()
	{
		return Loc::getMessage('SALE_BIGDATA_TARGET_CONNECTOR_NAME');
	}

	public function getCode()
	{
		return 'target_sale';
	}

	public function getData()
	{
		$productIds = array();

		if (is_array($this->getFieldValue('PRODUCTS')) && count($this->getFieldValue('PRODUCTS')))
		{
			$productIds = array_values($this->getFieldValue('PRODUCTS'));
		}

		$userProducts = array();

		foreach ($productIds as $productId)
		{
			$response = \Bitrix\Sale\Bigdata\Cloud::getPotentialConsumers($productId);

			if (!empty($response['users']))
			{
				foreach ($response['users'] as $userId)
				{
					$userProducts[(string) $userId][] = $productId;
				}
			}
		}

		$rows = array();

		if (!empty($userProducts))
		{
			$result = \Bitrix\Main\UserTable::getList(array(
				'select' => array('USER_ID' => 'ID', 'NAME', 'EMAIL'),
				'filter' => array(
					'=ID' => array_keys($userProducts)
				)
			));

			while ($row = $result->fetch())
			{
				$row['PRODUCTS'] = $userProducts[$row['USER_ID']];

				$rows[] = $row;
			}
		}

		return $rows;
	}

	public static function getPersonalizeList()
	{
		return array(
			array(
				'CODE' => 'PRODUCTS',
				'NAME' => Loc::getMessage('SALE_BIGDATA_TARGET_CONNECTOR_PRODUCTS_TITLE'),
				'DESC' => Loc::getMessage('SALE_BIGDATA_TARGET_CONNECTOR_PRODUCTS_DESC')
			)
		);
	}

	public function getForm()
	{
		// items selector
		$html = '<div id="send_bigdata_pcons_list" style="margin-bottom: 20px">';

		// dummy for events
		$html .= '<input type="hidden" id="send_bigdata_changeform_dummy" name="'.$this->getFieldName('RND').'" value="">';

		$html .= '</div>';

		$html .= "
		<script>
			BX.ready(function(){

			});

			var send_bigdata_pcons_count = 0;

			function deleteProduct(id)
			{
				var li = BX('send_bigdata_pcons_list_e' + id);
				BX.remove(li);

				BX('send_bigdata_changeform_dummy').value = Math.random();
				BX.fireEvent(BX('send_bigdata_changeform_dummy'), 'change');
			}


			function catchProduct(e)
			{
				// skip duplicates
				if (BX('send_bigdata_pcons_list_e'+e.id))
				{
					return false;
				}

				// check if there is already limit
				var limit = 25;

				var currentCount = BX.findChildren(BX('send_bigdata_pcons_list'), {tag: 'li'}).length;

				if (currentCount >= limit)
				{
					// show notice
					var obPopupWin = BX.PopupWindowManager.create('sender_select_products_limit', null, {
						autoHide: false,
						offsetLeft: 0,
						offsetTop: 0,
						overlay : true,
						closeByEsc: true,
						titleBar: true,
						closeIcon: {top: '10px', right: '10px'}
					});

					obPopupWin.setTitleBar({
						content: BX.create(
							'span', {html: '<b>' + '".\CUtil::JSEscape(Loc::getMessage('SALE_BIGDATA_TARGET_CONNECTOR_SELECT_LIMIT_TITLE'))."' + '</b>', 'props': {'className': 'access-title-bar'}}
						)
					});

					var msg = '".\CUtil::JSEscape(Loc::getMessage('SALE_BIGDATA_TARGET_CONNECTOR_SELECT_LIMIT_MSG'))."';
					msg = msg.replace('#LIMIT#', limit);

					obPopupWin.setContent(msg);
					obPopupWin.setButtons([new BX.PopupWindowButton({
						text: '".\CUtil::JSEscape(Loc::getMessage('SALE_BIGDATA_TARGET_CONNECTOR_SELECT_LIMIT_CLOSE'))."',
						events: {click: function(){
							this.popupWindow.close();
						}}
				   })]);

					obPopupWin.show();

					return false;
				}

				// item
				var fieldName = \"{$this->getFieldName('PRODUCTS[]')}\".replace(\"\[\]\", \"[\"+e.id+\"]\");
				var itemElement = document.createElement('li');
				var title = e.name + ' (' + e.id + ') ';

				itemElement.id = 'send_bigdata_pcons_list_e'+e.id;
				itemElement.innerHTML = title + ' [ <a href=\"#\" onclick=\"deleteProduct('+e.id+'); return false;\">'+'".\CUtil::JSEscape(Loc::getMessage('SALE_BIGDATA_TARGET_CONNECTOR_SELECT_DEL'))."'+'</a> ]';
				itemElement.innerHTML += '<input type=\"hidden\" name=\"'+fieldName+'\" value=\"'+e.id+'\"> ';

				BX('send_bigdata_pcons_list').appendChild(itemElement);
			}

			function AddProductSearch()
			{
				var productPopup = new BX.CDialog({
					content_url: '/bitrix/admin/cat_product_search_dialog.php?lang=".LANG."&caller=sender_target_sale&func_name=catchProduct',
					height: Math.max(500, window.innerHeight-400),
					width: Math.max(800, window.innerWidth-400),
					draggable: true,
					resizable: true,
					min_height: 500,
					min_width: 800
				});

				BX.addCustomEvent(productPopup, 'onBeforeWindowClose', function(){
					BX.fireEvent(BX('send_bigdata_changeform_dummy'), 'change');
				});

				productPopup.Show();
			}
        </script>

        <button onclick='AddProductSearch(); return false;'>".htmlspecialcharsbx(Loc::getMessage('SALE_BIGDATA_TARGET_CONNECTOR_SELECT_TITLE'))."</button>
        ";

		if ($this->getFieldValue('PRODUCTS'))
		{
			// select titles
			$titles = array();

			$result = \Bitrix\Iblock\ElementTable::getList(array(
				'select' => array('ID', 'NAME'),
				'filter' => array('=ID' => $this->getFieldValue('PRODUCTS'))
			));

			while ($row = $result->fetch())
			{
				$titles[(int) $row['ID']] = $row['NAME'];
			}

			// preset
			$html .= "<script>".PHP_EOL;

			foreach ($this->getFieldValue('PRODUCTS') as $productId)
			{
				$html .= 'catchProduct('.\CUtil::PhpToJSObject(array(
					'id' => $productId,
					'name' => $titles[(int) $productId]
				)).');'.PHP_EOL;
			}


			$html .= "</script>";
		}

		return $html;
	}

	public static function onConnectorList()
	{
		$arData['CONNECTOR'] = __CLASS__;

		return $arData;
	}

}