<?
global $INTRANET_TOOLBAR;
global $DB_kraken;

use Bitrix\Main\Context,
	Bitrix\Main\Type\DateTime,
	Bitrix\Main\Loader,
	Bitrix\Iblock;

CModule::IncludeModule("iblock");
CModule::IncludeModule("concept.kraken");


	$arResult = array();
	$iblockIdLand = 0;

	$cur_site = $arParams["CURRENT_SITE"];

	if(strlen($cur_site)<=0)
	{	
		$cur_site = $_REQUEST["site_id"];
		CKraken::krakenOptions($cur_site);
	}

	global $KRAKEN_TEMPLATE_ARRAY;

	$ibcode = 'concept_kraken_site_catalog_'.$cur_site;

	$KRAKEN_CART = $APPLICATION->get_cookie('_kraken_cart_'.$cur_site, "");
	$KRAKEN_CART = unserialize($KRAKEN_CART);

	
	$id_cart = array();
	foreach ($KRAKEN_CART as $value) {
		$id_cart[] = $value["id"];
	}


	if(!empty($id_cart))
	{
		$arResult["SALE"] = false;
		$arResult["REQUEST_PRICE"] = false;
		$arResult["FROM"] = false;
		$cur_total = 0;
		$cur_total_old = 0;
		$cur_total_sale = 0;
		$cur_total_max = 0;

		$count_added_elements = 0;

		$arFilter = Array('IBLOCK_CODE' => $ibcode, "ID"=>$id_cart, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "PROPERTY_CART_ADD_ON_VALUE" => "Y");
		$res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false);

		while($ob = $res->GetNextElement())
		{
			$arItem = $ob->GetFields();  
			$arItem["PROPERTIES"] = $ob->GetProperties();
			$arItem["OTHER_COMPLECT"] = array();
			
			// 
			if(strlen($KRAKEN_CART[$arItem["ID"]]["other_complect"])>0)
			{
				$arItem["OTHER_COMPLECT"]["NAME"] = $arItem["PROPERTIES"]["OTHER_COMPLECT"]["~VALUE"][$KRAKEN_CART[$arItem["ID"]]["other_complect"]]." ". $arItem["PROPERTIES"]["OTHER_COMPLECT"]["~DESCRIPTION"][$KRAKEN_CART[$arItem["ID"]]["other_complect"]];

				$arItem["OTHER_COMPLECT"]["VALUE"] = $KRAKEN_CART[$arItem["ID"]]["other_complect"];
				$arItem["OTHER_COMPLECT"]["ID"] = $KRAKEN_CART[$arItem["ID"]]["other_complect"];
			}

			// 
			$from_on = "";
			if($arItem["PROPERTIES"]["PRICE_FROM"]["VALUE"] == "Y" && strlen($from_on) <= 0) 
	            $from_on = GetMessage("KRAKEN_COMP_CART_FROM")." ";
			
			$cur_step = trim($arItem["PROPERTIES"]["CART_PRICE_STEP"]["VALUE"]);
			if($cur_step<=0)
			{
				$arItem["PROPERTIES"]["CART_PRICE_STEP"]["VALUE"] = 1;
				$cur_step = 1;
			}

			$cur_min_count = floatval(trim($arItem["PROPERTIES"]["CART_MIN_COUNT"]["VALUE"]));
			if($cur_min_count<=0)
			{
				$arItem["PROPERTIES"]["CART_MIN_COUNT"]["VALUE"] = 1;
				$cur_min_count = 1;
			}

			if($cur_min_count < $cur_step)
				$arItem["PROPERTIES"]["CART_MIN_COUNT"]["VALUE"] = $cur_step;


			$cur_step_cookie = floatval(trim($KRAKEN_CART[$arItem["ID"]]["count"]));

			if($cur_step_cookie>0)
				$arItem["PROPERTIES"]["CART_PRICE_STEP_"]["VALUE"] = floatval(trim($KRAKEN_CART[$arItem["ID"]]["count"]));
			
			else
			{
				$arItem["PROPERTIES"]["CART_PRICE_STEP_"]["VALUE"] = 1;
				$cur_step_cookie = 1;
			}

			if($cur_step_cookie < $cur_min_count)
			{
				$arItem["PROPERTIES"]["CART_PRICE_STEP_"]["VALUE"] = $cur_min_count;
				$cur_step_cookie = $cur_min_count;
			}


			$total_element_val = CKraken_format::convertCurr($arItem["PROPERTIES"]["PRICE"]["VALUE"], $arItem["PROPERTIES"]["CURR"]["VALUE"], $KRAKEN_TEMPLATE_ARRAY["BASE_CURR"]['VALUE']) * $cur_step_cookie;
			$total_element_val_old = CKraken_format::convertCurr($arItem["PROPERTIES"]["OLD_PRICE"]["VALUE"], $arItem["PROPERTIES"]["CURR"]["VALUE"], $KRAKEN_TEMPLATE_ARRAY["BASE_CURR"]['VALUE']) * $cur_step_cookie;

			$arItem["PROPERTIES"]["PRICE_NUM"]["VALUE"] = CKraken_format::convertCurr($arItem["PROPERTIES"]["PRICE"]["VALUE"], $arItem["PROPERTIES"]["CURR"]["VALUE"], $KRAKEN_TEMPLATE_ARRAY["BASE_CURR"]['VALUE']);
			$arItem["PROPERTIES"]["OLD_PRICE_NUM"]["VALUE"] = CKraken_format::convertCurr($arItem["PROPERTIES"]["OLD_PRICE"]["VALUE"], $arItem["PROPERTIES"]["CURR"]["VALUE"], $KRAKEN_TEMPLATE_ARRAY["BASE_CURR"]['VALUE']);

			$arItem["PROPERTIES"]["PRICE_COUNT"]["VALUE"] = $total_element_val;
			$arItem["PROPERTIES"]["OLD_PRICE_COUNT"]["VALUE"] = $total_element_val_old;


			if($total_element_val_old>0 && $arItem["PROPERTIES"]["REQUEST_PRICE"]["VALUE"] != "Y" && !$arResult["SALE"])
				$arResult["SALE"] = true;


			if($arItem["PROPERTIES"]["PRICE_FROM"]["VALUE"] == "Y" && !$arResult["FROM"] && $arItem["PROPERTIES"]["REQUEST_PRICE"]["VALUE"] != "Y") 
				$arResult["FROM"] = true;


			

			if($total_element_val>0)
			{
				if($arItem["PROPERTIES"]["REQUEST_PRICE"]["VALUE"] == "Y")
				{
					$cur_total += 0;

					if(!$arResult["REQUEST_PRICE"] && $count_added_elements == 0)
						$arResult["REQUEST_PRICE"] = true;
				}

				else
				{
					if($arResult["REQUEST_PRICE"])
						$arResult["REQUEST_PRICE"] = false;

					if($total_element_val_old<=0)
						$cur_total_max += $total_element_val;

					$cur_total += $total_element_val;
				}

				
			}


			if($total_element_val_old>0 && $total_element_val>0)
			{
				
				if($arItem["PROPERTIES"]["REQUEST_PRICE"]["VALUE"] == "Y")
				{
					$cur_total_old += 0;
					$cur_total_max += 0;
				}

				else
				{
					$cur_total_old += $total_element_val_old;
					$cur_total_max += $total_element_val_old;
				}
				
			}

			

			$unit = "";
	        if(in_array($arItem["PROPERTIES"]["UNITS"]["VALUE"], $KRAKEN_TEMPLATE_ARRAY['CART_UNITS']['VALUE']) && $arItem["PROPERTIES"]["REQUEST_PRICE"]["VALUE"] != "Y")
	        {
	            $unit = $DB_kraken["UNITS"]["ITEMS"][$arItem["PROPERTIES"]["UNITS"]["VALUE"]]["~SYM_MAIN"];

	            if(strlen($DB_kraken["UNITS"]["ITEMS"][$arItem["PROPERTIES"]["UNITS"]["VALUE"]]["~SYM_PRICE"])>0)
	                $unit = $DB_kraken["UNITS"]["ITEMS"][$arItem["PROPERTIES"]["UNITS"]["VALUE"]]["~SYM_PRICE"];

	            $unit = "<span class='units-style'> ".$unit."</span>";
	        }

	        $from = "";
	            if($arItem["PROPERTIES"]["PRICE_FROM"]["VALUE"] == "Y" && $arItem["PROPERTIES"]["REQUEST_PRICE"]["VALUE"] != "Y")
	            $from = GetMessage("KRAKEN_COMP_CART_FROM");

	        $price = "";
	            if($arItem["PROPERTIES"]["REQUEST_PRICE"]["VALUE"] == "Y")
	                $price = GetMessage("KRAKEN_COMP_CART_REQUEST");
	            else
	                $price = CKraken_format::convertMain($arItem["PROPERTIES"]["PRICE"]["VALUE"], $arItem["PROPERTIES"]["CURR"]["VALUE"], $KRAKEN_TEMPLATE_ARRAY["BASE_CURR"]['VALUE']);

	        $price_count = "";
	            if($arItem["PROPERTIES"]["REQUEST_PRICE"]["VALUE"] == "Y")
	                $price_count = GetMessage("KRAKEN_COMP_CART_REQUEST");

	            else
	                $price_count = CKraken_format::CurrFormatString($arItem["PROPERTIES"]["PRICE_COUNT"]["VALUE"], $KRAKEN_TEMPLATE_ARRAY["BASE_CURR"]['VALUE']);

	        $oldprice = "";
	            if($arItem["PROPERTIES"]["OLD_PRICE"]["VALUE"] && $arItem["PROPERTIES"]["REQUEST_PRICE"]["VALUE"] != "Y")
	                $oldprice = CKraken_format::convertMain($arItem["PROPERTIES"]["OLD_PRICE"]["VALUE"], $arItem["PROPERTIES"]["CURR"]["VALUE"], $KRAKEN_TEMPLATE_ARRAY["BASE_CURR"]['VALUE']);


	        $old_price_count = "";
	        if($arItem["PROPERTIES"]["OLD_PRICE_COUNT"]["VALUE"] > 0 && $arItem["PROPERTIES"]["REQUEST_PRICE"]["VALUE"] != "Y")
	            $old_price_count = CKraken_format::CurrFormatString($arItem["PROPERTIES"]["OLD_PRICE_COUNT"]["VALUE"], $KRAKEN_TEMPLATE_ARRAY["BASE_CURR"]['VALUE']);


	        $arItem["PROPERTIES"]["PRICE_FORMAT"]["VALUE"] = $from.$price.$unit;
	        $arItem["PROPERTIES"]["PRICE_COUNT_FORMAT"]["VALUE"] = $from.$price_count;
			$arItem["PROPERTIES"]["OLD_PRICE_FORMAT"]["VALUE"] = $oldprice;
			$arItem["PROPERTIES"]["OLD_PRICE_COUNT_FORMAT"]["VALUE"] = $old_price_count;

			$arResult["ITEMS"][] = $arItem;

			$count_added_elements++;
		}


		$cur_total_sale = $cur_total_max - $cur_total;
		$arResult["TOTAL_SALE_NUM"] = $cur_total_sale;
		$arResult["TOTAL_SALE"] = CKraken_format::CurrFormatString($cur_total_sale, $KRAKEN_TEMPLATE_ARRAY["BASE_CURR"]['VALUE']);

		$arResult["TOTAL_OLD"] = CKraken_format::CurrFormatString($cur_total_old, $KRAKEN_TEMPLATE_ARRAY["BASE_CURR"]['VALUE']);


		if($arResult["SALE"])
	        $arResult["SALE_TEXT"] = GetMessage('KRAKEN_COMP_CART_TOTAL_SALE');
	    else
	        $arResult["SALE_TEXT"] = GetMessage('KRAKEN_COMP_CART_TOTAL');


		$from = "";
		if($arResult["FROM"])
	        $from = GetMessage('KRAKEN_COMP_CART_FROM');

	    $arResult["TOTAL_NEW"] = $from.CKraken_format::CurrFormatString($cur_total, $KRAKEN_TEMPLATE_ARRAY["BASE_CURR"]['VALUE']);

	    $arResult["TOTAL_NEW_NUM"] = $cur_total;
	    
	    if($arResult["REQUEST_PRICE"])
			$arResult["REQUEST_PRICE_REQ"] = GetMessage("KRAKEN_COMP_CART_REQUEST");
		

		$arResult["COUNT"] = 0;
		if(!empty($arResult["ITEMS"]))
			$arResult["COUNT"] = count($arResult["ITEMS"]);

	}


?>