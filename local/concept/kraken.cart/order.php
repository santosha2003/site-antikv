<?
$site_id = trim($_REQUEST["site_id"]);
define("SITE_ID", $site_id);

require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/components/concept/kraken.cart/core.php");


    $arRes = array();
    $arRes["OK"] = "N";

    $host = $_SERVER["HTTP_HOST"];
    if(strlen($host)<=0){
        $host = $_SERVER["SERVER_NAME"];
    }

    $host = explode(":", $host);
    $host = $_SERVER["REQUEST_SCHEME"]."://".$host[0];

    $arIBlockElement = Array();
    $element_id = trim($_REQUEST["element"]);
    $arIBlockElement = GetIBlockElement($element_id);

    $form_admin = $arIBlockElement["PROPERTIES"]["FORM_ADMIN"]["VALUE_XML_ID"];

    if(strlen($form_admin)<=0)
        $form_admin = "light";

    $rsSites = CSite::GetByID($site_id);
    $arSite = $rsSites->Fetch();

    if(strlen($KRAKEN_TEMPLATE_ARRAY["MAIL_FROM"]['VALUE']) > 0)
        $email_from = htmlspecialcharsBack(trim($KRAKEN_TEMPLATE_ARRAY["MAIL_FROM"]['VALUE']));
    else
        $email_from = htmlspecialcharsBack(trim($arSite['EMAIL']));


    if(strlen($KRAKEN_TEMPLATE_ARRAY["MAIL_TO"]['VALUE']) > 0)
        $email_to = trim($KRAKEN_TEMPLATE_ARRAY["MAIL_TO"]['VALUE']);
    else
        $email_to = trim($arSite['EMAIL']);


            
    $header = trim($_REQUEST["header"]);
    $url = trim($_REQUEST["url"]);

    if(SITE_CHARSET == "windows-1251")
    {
        $header = utf8win1251(trim($_REQUEST["header"]));
        $url = utf8win1251(trim($_REQUEST["url"]));
    }

    $url = urldecode($url);

    $message = '';
    $arFiles = array();

    
    if($form_admin == 'light')
    {
        $phone = trim($_REQUEST["phone"]);
        $email = trim($_REQUEST["email"]);
        $date = trim($_REQUEST["date"]);
        $count = trim($_REQUEST["count"]);
        $checkbox = $_REQUEST["checkbox".$element_id];
        
        $name = trim($_REQUEST["name"]);
        $text = trim($_REQUEST["text"]);
        $address = trim($_REQUEST["address"]);
        $radiobutton = trim($_REQUEST["radiobutton".$element_id]);

        
        $check_value = '';
        

        if(SITE_CHARSET == "windows-1251")
        {
            $name = utf8win1251(trim($_REQUEST["name"]));
            $text = utf8win1251(trim($_REQUEST["text"]));
            $address = utf8win1251(trim($_REQUEST["address"]));
            $radiobutton = utf8win1251(trim($_REQUEST["radiobutton".$element_id]));


            if(is_array($checkbox) && !empty($checkbox))
            {
                foreach($checkbox as $k => $value)
                {
                    $checkbox[$k] = utf8win1251(trim($value));
                }
            }
                            
        }
        
        
        if(strlen($radiobutton) > 0)
        {
            $check_value = $radiobutton;
        }

        if(is_array($checkbox) && !empty($checkbox))
        {
            $check_value = implode(', ' , $checkbox);
        }
        
        
        if(strlen($comment) > 0)
            $message .= $comment;

        if(strlen($name) > 0)
            $message .= "<b>".GetMessage("KRAKEN_CART_MESSAGE_NAME")."</b>".$name."<br/>";
        

        if(strlen($phone) > 0)
            $message .= "<b>".GetMessage("KRAKEN_CART_MESSAGE_PHONE")."</b>".$phone."<br/>";
        
        if(strlen($email) > 0)
            $message .= "<b>".GetMessage("KRAKEN_CART_MESSAGE_EMAIL")."</b>".$email."<br/>"; 
            
        if(strlen($count) > 0)
            $message .= "<b>".GetMessage("KRAKEN_CART_MESSAGE_COUNT")."</b>".$count."<br/>";

        if(strlen($date) > 0)
            $message .= "<b>".GetMessage("KRAKEN_CART_MESSAGE_DATE")."</b>".$date."<br/>";
        

        if(strlen($address) > 0)
            $message .= "<b>".GetMessage("KRAKEN_CART_MESSAGE_ADDRESS")."</b>".$address."<br/>";
        

        if(strlen($check_value) > 0)
            $message .= "<b>".GetMessage("KRAKEN_CART_MESSAGE_CHECK_VALUE")."</b>".$check_value."<br/>";

        if(strlen($text) > 0)
            $message .= "<br/><b>".GetMessage("KRAKEN_CART_MESSAGE_TEXAREA")."</b>".$text."<br/>";
            
          
        
    }

    elseif($form_admin == 'professional')
    {
        
        $email = "";
        $phone = "";
        $name = "";
        
        $countName = 0;
        $countPhone = 0;
        $countEmail = 0;

        if(strlen($comment) > 0)
            $message .= $comment;
        
 
        foreach($arIBlockElement["PROPERTIES"]["FORM_PROP_INPUTS"]["VALUE"] as $k => $arVal)
        {
            
            $type = $arIBlockElement["PROPERTIES"]["FORM_PROP_INPUTS"]["DESCRIPTION"][$k];


                                                                    
            $type = explode(";", ToLower($type));
            
            foreach($type as $k1=>$val)
                $type[$k1] = trim($val);

            
            if($type[0] == "radio" || $type[0] == "checkbox" || $type[0] == "select")
            {
                $list = explode(";", htmlspecialcharsBack($arVal));                                                    
                $first = $list[0];
                
                if(substr_count($first, "<") > 0 && substr_count($first, ">") > 0)
                {
                    $tit = str_replace(array("<", ">"), array("", ""), $first);
                    unset($list[0]);
                    
                    if(!empty($_REQUEST["input_".$element_id."_$k"]) && is_array($_REQUEST["input_".$element_id."_$k"]) || strlen(trim($_REQUEST["input_".$element_id."_$k"])) > 0)
                        $message .= '<b>'.$tit.': </b> ';
                }
                  
                if(!empty($_REQUEST["input_".$element_id."_$k"]) && is_array($_REQUEST["input_".$element_id."_$k"]))
                {
                    
                    $check_array = $_REQUEST["input_".$element_id."_$k"];
                    
                    if(SITE_CHARSET == "windows-1251")
                    {
                        foreach($check_array as $c=>$check)
                            $check_array[$c] = utf8win1251(trim($check));
                    }
                    
                    $message .= implode(", ", $check_array).'<br/>';

                }
                else
                {

                    if(strlen(trim($_REQUEST["input_".$element_id."_$k"]))>0)
                    {
                        $check = trim($_REQUEST["input_".$element_id."_$k"]);
                        
                        if(SITE_CHARSET == "windows-1251")
                            $check = utf8win1251($check);

                        $message .= $check.'<br/>';
                    }
                    
                }

                
                
                
            }
            else
            {
                                            
                    
                if(strlen(trim($_REQUEST["input_".$element_id."_$k"]))>0)
                {
                    $desc = trim($_REQUEST["input_".$element_id."_$k"]);

                    if(SITE_CHARSET == "windows-1251")
                        $desc = utf8win1251(trim($_REQUEST["input_".$element_id."_$k"]));

                    $message .= '<b>'.$arVal.': </b>'.$desc.'<br/>';
                    
                    if($type[0] == "name")
                    {
                        if($countName <= 0)
                            $name = $desc;

                        $countName++;
                    }
                    
                    if($type[0] == "phone")
                    {
                        if($countPhone <= 0)
                            $phone = $desc;

                        $countPhone++;
                    }
                    
                    if($type[0] == "email")
                    {
                        if($countEmail <= 0)
                            $email = $desc;

                        $countEmail++;
                    }
                }
                
                
            }
            
            if(!empty($_FILES["input_".$element_id."_$k"]) && $_FILES["input_".$element_id."_$k"]["error"] == 0)
            {
                $newname = array();

                $filename = basename($_FILES["input_".$element_id."_$k"]['name']);
    
                $newname = $_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH.'/kraken_tmp_file/'.$filename;

                if (!file_exists($newname)) 
                {
                    move_uploaded_file($_FILES["input_".$element_id."_$k"]['tmp_name'], $newname);
                }

                $arFile = array($newname);

                $arFiles = array_merge($arFiles, $arFile);

            }
            
        }

    }


    $form_info = $message;
    

    global $DB_kraken;
    $cart_info = "";
    $pay_name = $DB_kraken["PAYMENT"]["ITEMS"][$_REQUEST["kraken_pay"]]["NAME_ON_SITE"];
    $deliv_name = $DB_kraken["DELIVERY"]["ITEMS"][$_REQUEST["kraken_deliv"]]["NAME_ON_SITE"];
    $pay_name_adm = $DB_kraken["PAYMENT"]["ITEMS"][$_REQUEST["kraken_pay"]]["NAME"];
    $deliv_name_adm = $DB_kraken["DELIVERY"]["ITEMS"][$_REQUEST["kraken_deliv"]]["NAME"];

    $deliv_text = trim($_REQUEST["deliv_text_".$_REQUEST["kraken_deliv"]]);

    if(SITE_CHARSET == "windows-1251")
        $deliv_text = utf8win1251($deliv_text);

    if(strlen($pay_name)>0 && $pay_name != NaN)
    {
        $message .= "<b>".GetMessage("KRAKEN_CART_MESSAGE_PAYMENT")."</b>".$pay_name."<br/>";
        $cart_info .= "<b>".GetMessage("KRAKEN_CART_MESSAGE_PAYMENT")."</b>".$pay_name."<br/>";
    }
    if(strlen($deliv_name)>0 && $deliv_name != NaN)
    {
        $message .= "<b>".GetMessage("KRAKEN_CART_MESSAGE_DELIVERY")."</b>".$deliv_name."<br/>";
        $cart_info .= "<b>".GetMessage("KRAKEN_CART_MESSAGE_DELIVERY")."</b>".$deliv_name."<br/>";
    }
    if(strlen($deliv_text)>0 && $deliv_text != NaN)
    {
        $deliv_text_title = GetMessage("KRAKEN_CART_MESSAGE_DELIVERY_TITLE");
        if(strlen($DB_kraken["DELIVERY"]["ITEMS"][$_REQUEST["kraken_deliv"]]["ADD_FIELD_NAME"])>0 && $DB_kraken["DELIVERY"]["ITEMS"][$_REQUEST["kraken_deliv"]]["ADD_FIELD_NAME"] != NULL)
            $deliv_text_title = $DB_kraken["DELIVERY"]["ITEMS"][$_REQUEST["kraken_deliv"]]["ADD_FIELD_NAME"].": ";

        $message .= "<b>".$deliv_text_title."</b>".$deliv_text."<br/>";
        $cart_info .= "<b>".$deliv_text_title."</b>".$deliv_text."<br/>";
    }


    $table = " 

    <div style='margin: 25px 0 10px;'><b>".GetMessage("KRAKEN_CART_MESSAGE_ORDER_LIST")."</b><div><br/>

    <table style='width: 100%;border: 0;border-collapse: collapse; margin: 0 0 25px;'>
		<tr>
			<th style='font-family: Arial;font-size: 12px;text-align: left;padding: 5px 10px;border-top: 1px solid #aaa;border-bottom: 1px solid #aaa;'></th>
			<th style='font-family: Arial;font-size: 12px;text-align: left;padding: 5px 10px;border-top: 1px solid #aaa;border-bottom: 1px solid #aaa;'>".GetMessage("KRAKEN_CART_MESSAGE_ELEM_NAME")."</th>
			<th style='font-family: Arial;font-size: 12px;text-align: left;padding: 5px 10px;border-top: 1px solid #aaa;border-bottom: 1px solid #aaa;'>".GetMessage("KRAKEN_CART_MESSAGE_ELEM_PRICE")."</th>
			<th style='font-family: Arial;font-size: 12px;text-align: left;padding: 5px 10px;border-top: 1px solid #aaa;border-bottom: 1px solid #aaa;'>".GetMessage("KRAKEN_CART_MESSAGE_ELEM_COUNT")."</th>
			<th style='font-family: Arial;font-size: 12px;text-align: left;padding: 5px 10px;border-top: 1px solid #aaa;border-bottom: 1px solid #aaa;'>".GetMessage("KRAKEN_CART_MESSAGE_ELEM_SUM")."</th>
		</tr>
    ";

    $list = "";
    $crm_table = "";



    foreach ($arResult["ITEMS"] as $key => $arItem){


        $unit = "";
        if(in_array($arItem["PROPERTIES"]["UNITS"]["VALUE"], $KRAKEN_TEMPLATE_ARRAY['CART_UNITS']['VALUE']) && $arItem["PROPERTIES"]["REQUEST_PRICE"]["VALUE"] != "Y")
            $unit = " ".$DB_kraken["UNITS"]["ITEMS"][$arItem["PROPERTIES"]["UNITS"]["VALUE"]]["~SYM_MAIN"];
            

    	$img = "";

        if($arItem["PROPERTIES"]["MORE_PHOTO"]["VALUE"][0] > 0)
        {
            if($arItem["PROPERTIES"]["RESIZE_IMAGES"]["VALUE_XML_ID"] == "scale")
                $img = CFile::ResizeImageGet($arItem["PROPERTIES"]["MORE_PHOTO"]["VALUE"][0], array('width'=>70, 'height'=>70), BX_RESIZE_IMAGE_PROPORTIONAL, false, Array(), false, 85);
            else
                $img = CFile::ResizeImageGet($arItem["PROPERTIES"]["MORE_PHOTO"]["VALUE"][0], array('width'=>70, 'height'=>70), BX_RESIZE_IMAGE_EXACT, false, Array(), false, 85);

        }
        else
            $img["src"] = SITE_TEMPLATE_PATH."/images/catalog.png";
                       

        if($arItem["PROPERTIES"]["MORE_PHOTO"]["VALUE"][0]>0)
            $img = CFile::ResizeImageGet($arItem["PROPERTIES"]["MORE_PHOTO"]["VALUE"][0], array('width'=>100, 'height'=>100), BX_RESIZE_IMAGE_PROPORTIONAL, false);
    	$list .= "
    	<tr>

    	<td style='width: 15%;vertical-align: top;font-family: Arial;font-size: 12px;text-align: left;padding: 10px;border-bottom: 1px solid #aaa;'>
            <img alt=".strip_tags($arItem["~NAME"])." src=".$host.$img["src"].">

    	<td style='vertical-align: top;font-family: Arial;font-size: 12px;text-align: left;padding: 10px;border-bottom: 1px solid #aaa;'>
        	<div>".strip_tags($arItem["~NAME"])."</div>
            <div style='font-style: italic;'>".strip_tags($arItem["PROPERTIES"]["ARTICLE"]["~VALUE"])."</div>"."
		</td>

		<td style='vertical-align: top;white-space: nowrap;font-family: Arial;font-size: 12px;text-align: left;padding: 10px;border-bottom: 1px solid #aaa;'>
        ".strip_tags($arItem["PROPERTIES"]["PRICE_FORMAT"]["VALUE"])."
            <div style='text-decoration:line-through'>".$arItem["PROPERTIES"]["OLD_PRICE_FORMAT"]["VALUE"]."</div>
		</td>
		<td style='vertical-align: top;white-space: nowrap;font-family: Arial;font-size: 12px;text-align: left;padding: 10px;border-bottom: 1px solid #aaa;'>
    	".$arItem["PROPERTIES"]["CART_PRICE_STEP_"]["VALUE"].strip_tags($unit)."
		</td>

		<td style='vertical-align: top;white-space: nowrap;font-family: Arial;font-size: 12px;text-align: left;padding: 10px;border-bottom: 1px solid #aaa;'>
    	".$arItem["PROPERTIES"]["PRICE_COUNT_FORMAT"]["VALUE"]."
        <div style='text-decoration:line-through'>".strip_tags($arItem["PROPERTIES"]["OLD_PRICE_COUNT_FORMAT"]["VALUE"])."</div>
		</td>

    	</tr>";

        $crm_table .= "<b>".($key+1).". </b>".strip_tags($arItem["~NAME"]).", "."<b>".GetMessage("KRAKEN_CART_MESSAGE_ELEM_PRICE").": </b>".strip_tags($arItem["PROPERTIES"]["PRICE_FORMAT"]["VALUE"]).", "."<b>".GetMessage("KRAKEN_CART_MESSAGE_ELEM_COUNT").": </b>".$arItem["PROPERTIES"]["CART_PRICE_STEP_"]["VALUE"].strip_tags($unit).", "."<b>".GetMessage("KRAKEN_CART_MESSAGE_ELEM_SUM").": </b>".$arItem["PROPERTIES"]["PRICE_COUNT_FORMAT"]["VALUE"].";<br/>";
    	
    }

    $table .= $list."</table>";

    $total_price_order = $arResult["TOTAL_NEW_NUM"];

    $deliv_price_format = "";

    if(strlen($deliv_price)>0 && $deliv_price != NaN)
    {
        $deliv_price = strip_tags($DB_kraken["DELIVERY"]["ITEMS"][$_REQUEST["kraken_deliv"]]["PRICE"]);
        $deliv_price = CKraken_format::convertCurr($deliv_price, $DB_kraken["DELIVERY"]["ITEMS"][$_REQUEST["kraken_deliv"]]["CURRENCY"], $KRAKEN_TEMPLATE_ARRAY['BASE_CURR']['VALUE']);
        $deliv_price_format = CKraken_format::CurrFormatString($deliv_price, $KRAKEN_TEMPLATE_ARRAY['BASE_CURR']['VALUE']);

        $total_price_order = $total_price_order + $deliv_price;
    }

    $total_price_order_format = CKraken_format::CurrFormatString($total_price_order, $KRAKEN_TEMPLATE_ARRAY['BASE_CURR']['VALUE']);


    if($arResult["REQUEST_PRICE"])
    {
        $total_price_format = $arResult["REQUEST_PRICE_REQ"];
        $total_price_order_format = $arResult["REQUEST_PRICE_REQ"];
    }


    $sale = $arResult["TOTAL_SALE"];
    $sum = $arResult["TOTAL_NEW"];
    $total_sum = $total_price_order_format;


    $total_info = "";
    $crm_total_info = "";

    if(strlen($sum)>0)
        $total_info .= "<div><b>".GetMessage("KRAKEN_CART_MESSAGE_LIST_PRICE")."</b> ".$sum."</div>";

    if(strlen($sale)>0)
        $total_info .= "<div><b>".GetMessage("KRAKEN_CART_MESSAGE_LIST_SALE")."</b> ".$sale."</div>";

    if(strlen($deliv_price_format)>0)
    {
        $total_info .= "<div><b>".GetMessage("KRAKEN_CART_MESSAGE_LIST_DELIVERY_PRICE")."</b> ".$deliv_price_format."</div>";
        $crm_total_info .= "<b>".GetMessage("KRAKEN_CART_MESSAGE_LIST_DELIVERY_PRICE")."</b>".$deliv_price_format."<br/>";
    }

    if(strlen($total_sum)>0)
    {
        $total_info .= "<div><b>".GetMessage("KRAKEN_CART_MESSAGE_LIST_TOTAL")."</b> ".$total_sum."</div>";
        $crm_total_info .= "<b>".GetMessage("KRAKEN_CART_MESSAGE_LIST_TOTAL")."</b>".$total_sum."<br/>";
    }




    use Bitrix\CKrakenOrders;
    use Bitrix\CKrakenOrdersItems;

    $f_sts = array_shift($DB_kraken["STATUS"]["ITEMS"]);

  

    $arOrder = array(
        'SUM' => htmlspecialcharsEx($arResult["TOTAL_NEW_NUM"]),
        'CURRENCY' => htmlspecialcharsEx($KRAKEN_TEMPLATE_ARRAY['BASE_CURR']['VALUE']),
        'STATUS' => htmlspecialcharsEx($f_sts["ID"]),
        'PROPERTIES' => htmlspecialcharsEx($form_info),
        'PAYED' => htmlspecialcharsEx("N"),
        'DELIVERY' => htmlspecialcharsEx($DB_kraken["DELIVERY"]["ITEMS"][$_REQUEST["kraken_deliv"]]["ID"]),
        'DELIVERY_SUM' => htmlspecialcharsEx($deliv_price),
        'PAYMENT' => htmlspecialcharsEx($DB_kraken["PAYMENT"]["ITEMS"][$_REQUEST["kraken_pay"]]["ID"])
    );


    $result = CKrakenOrders\CKrakenOrdersTable::add($arOrder);
    $id_order = $result->getId();
    $result = "";

    foreach($arResult["ITEMS"] as $key => $arItem){
        $arOrderItems = array(
            'NAME' => htmlspecialcharsEx($arItem["NAME"]),
            'ITEM_ID' => $arItem["ID"],
            'OFFER_ID' => htmlspecialcharsEx($arItem["OTHER_COMPLECT"]["ID"]),
            'PRICE' => htmlspecialcharsEx($arItem["PROPERTIES"]["PRICE_NUM"]["VALUE"]),
            'OLD_PRICE' => htmlspecialcharsEx($arItem["PROPERTIES"]["OLD_PRICE_NUM"]["VALUE"]),
            'CURRENCY' => htmlspecialcharsEx($KRAKEN_TEMPLATE_ARRAY['BASE_CURR']['VALUE']),
            'QUANTITY' => htmlspecialcharsEx($arItem["PROPERTIES"]["CART_PRICE_STEP_"]["VALUE"]),
            'ORDER_ID' => htmlspecialcharsEx($id_order),
            'REQUEST' => htmlspecialcharsEx($arItem["PROPERTIES"]["REQUEST_PRICE"]["VALUE"]),

        );
        
        $result = CKrakenOrdersItems\CKrakenOrdersItemsTable::add($arOrderItems);
    }
    $result = "";

    $url_order = $host."/bitrix/admin/kraken_shop_orders_view.php?ID=".$id_order;

    $search = array(
        "#SITE_NAME#",
        "#NAME_USER#",
        "#PHONE_USER#",
        "#EMAIL_USER#",
        "#DATE_USER#",
        "#CART_TABLE#",
        "#FORM_INFO#",
        "#CART_INFO#",
        "#TOTAL_INFO#",
        "#SUM#",
        "#SALE#",
        "#DELIV_PRICE#",
        "#TOTAL_SUM#",
        "#URL#",
        "#URL_ORDER#",
        "#ID_ORDER#",
    );
    $replace   = array(
        $arSite["NAME"],
        $name,
        $phone,
        $email,
        $date,
        $table,
        $form_info,
        $cart_info,
        $total_info,
        $sum,
        $sale,
        $deliv_price_format,
        $total_sum,
        $url,
        $url_order,
        $id_order
    );


    $theme_admin = GetMessage("KRAKEN_CART_MESSAGE_THEME_ADMIN_PART_1").$id_order.GetMessage("KRAKEN_CART_MESSAGE_THEME_ADMIN_PART_2")."\"".$arSite["NAME"]."\"";
    $theme_user = GetMessage("KRAKEN_CART_MESSAGE_THEME_USER_PART_1").$id_order.GetMessage("KRAKEN_CART_MESSAGE_THEME_USER_PART_2");

    if(strlen($KRAKEN_TEMPLATE_ARRAY["CART_MESS_THEME_ADMIN"]["~VALUE"])>0)
        $theme_admin = $KRAKEN_TEMPLATE_ARRAY["CART_MESS_THEME_ADMIN"]["~VALUE"];

    if(strlen($KRAKEN_TEMPLATE_ARRAY["CART_MESS_THEME_USER"]["~VALUE"])>0)
        $theme_user = $KRAKEN_TEMPLATE_ARRAY["CART_MESS_THEME_USER"]["~VALUE"];


    $id_order_mes = "<div><b>".GetMessage("KRAKEN_CART_MESSAGE_ORDER_ID")."</b> ".$id_order."</div>";
    $alert_admin = "<br/><br/>".GetMessage("KRAKEN_CART_MESSAGE_ALERT_ADMIN_PART_1")." <a target='_blank' href='".$host."/bitrix/admin/kraken_shop_orders_view.php?ID=".$id_order."&site_id=".$site_id."'>".GetMessage("KRAKEN_CART_MESSAGE_ALERT_ADMIN_PART_2")."</a>";

    if(strlen($KRAKEN_TEMPLATE_ARRAY["CART_MESS_ADMIN"]["~VALUE"])<=0)
    {

        $intro = GetMessage("KRAKEN_CART_MESSAGE_INTRO_ADMIN_PART_1").$arSite['NAME'].GetMessage("KRAKEN_CART_MESSAGE_INTRO_ADMIN_PART_2")."<br/>".GetMessage("KRAKEN_CART_MESSAGE_ADDRESS_LAND").$url."<br/><br/>";

        $kraken_cart_message_admin = $intro.$id_order_mes."<br/>".$message."<br/><br/>".$table.$total_info;
    }
    
    if(strlen($KRAKEN_TEMPLATE_ARRAY["CART_MESS_USER"]["~VALUE"])<=0)
    {
        $intro = GetMessage("KRAKEN_CART_MESSAGE_INTRO_USER")."<br/><br/>";
        $alert_user = "<br/><br/>".GetMessage("KRAKEN_CART_MESSAGE_ALERT_USER");
        $kraken_cart_message_user = $intro.$id_order_mes.$table.$cart_info."<br/>".$total_info.$alert_user;
    }


    if(strlen($KRAKEN_TEMPLATE_ARRAY["CART_MESS_ADMIN"]["~VALUE"])>0)
        $kraken_cart_message_admin = $KRAKEN_TEMPLATE_ARRAY["CART_MESS_ADMIN"]["~VALUE"];

    if(strlen($KRAKEN_TEMPLATE_ARRAY["CART_MESS_USER"]["~VALUE"])>0)
        $kraken_cart_message_user = $KRAKEN_TEMPLATE_ARRAY["CART_MESS_USER"]["~VALUE"];

    $theme_admin = str_replace($search, $replace, $theme_admin);
    $theme_user = str_replace($search, $replace, $theme_user);
    $kraken_cart_message_admin = str_replace($search, $replace, $kraken_cart_message_admin);
    $kraken_cart_message_user = str_replace($search, $replace, $kraken_cart_message_user);


    $arEventFields = array(
        "MESSAGE" => "<div style='width: 100%; max-width: 800px;'>".$kraken_cart_message_admin.$alert_admin."</div>",
        "EMAIL_TO" => $email_to,
        "EMAIL_FROM" => $email_from,
        "PAGE_NAME" => $arSite["NAME"],
        "THEME" => $theme_admin
    );

    $arEventFields2 = array(
        "EMAIL_FROM" => $email_from,
        "EMAIL_TO" => $email,
        "MESSAGE" => "<div style='width: 100%; max-width: 800px;'>".$kraken_cart_message_user."</div>",
        "THEME" => $theme_user,
    );




    
    
    if(!empty($_FILES["userfile"]) && $_FILES["userfile"]["error"] == 0 || !empty($arFiles))
    {
        
        if($_REQUEST["form_admin"] == 'light')
        {
            $filename = basename($_FILES['userfile']['name']);

            $newname = $_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH.'/kraken_tmp_file/'.$filename;
            if (!file_exists($newname)) 
            {
                move_uploaded_file($_FILES['userfile']['tmp_name'], $newname);
            }

            $arFiles = Array($newname);
        }
        
        

        if(CEvent::Send("KRAKEN_CART_ADMIN_".$site_id, $site_id, $arEventFields, "Y", "", $arFiles))
            $arRes["OK"] = "Y";

        if (file_exists($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH.'/kraken_tmp_file/'))
            foreach (glob($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH.'/kraken_tmp_file/*') as $file)
                unlink($file);
    }

    else
    {
        if(CEvent::Send("KRAKEN_CART_ADMIN_".$site_id, $site_id, $arEventFields, "Y", ""))
            $arRes["OK"] = "Y";
    }

    if(CEvent::Send("KRAKEN_CART_USER_".$site_id, $site_id, $arEventFields2))
        $arRes["OK"] = "Y";
        
    
    if(strlen($arIBlockElement["PROPERTIES"]['FORM_TEXT']["~VALUE"]["TEXT"]) > 0 || !empty($arIBlockElement['PROPERTIES']['FORM_FILES']['VALUE']) || strlen($arIBlockElement["PROPERTIES"]['FORM_THEME']["VALUE"]) > 0)
    {
        $arEventFields3 = array(
            "EMAIL_FROM" => $email_from,
            "EMAIL_TO" => $email,
            "MESSAGE" => $arIBlockElement["PROPERTIES"]['FORM_TEXT']["~VALUE"]["TEXT"],
            "THEME" => $arIBlockElement["PROPERTIES"]['FORM_THEME']["~VALUE"]
         );

        if(!empty($arIBlockElement['PROPERTIES']['FORM_FILES']['VALUE']))
        {
            $files = $arIBlockElement['PROPERTIES']['FORM_FILES']['VALUE'];

            if(CEvent::Send("KRAKEN_CART_USER_".$site_id, $site_id, $arEventFields3, "Y", "", $files))
                $arRes["OK"] = "Y";
        }
        else
        {
            if(CEvent::Send("KRAKEN_CART_USER_".$site_id, $site_id, $arEventFields3))
                $arRes["OK"] = "Y";
        }
    }

    

    $crm_mes = $form_info."<br/><br/>"."<b>".GetMessage("KRAKEN_CART_MESSAGE_ORDER_ID")."</b>".$id_order."<br/><br/>"."<b>".GetMessage("KRAKEN_CART_MESSAGE_ORDER_LIST")."</b><br/>".$crm_table."<br/>".GetMessage("KRAKEN_CART_MESSAGE_TEXT6")."<br/>".$cart_info.$crm_total_info;
    
    //bitrix24
    if($KRAKEN_TEMPLATE_ARRAY["BX_ON"]['VALUE'][0] == 'Y' && strlen($KRAKEN_TEMPLATE_ARRAY["BX_URL"]['VALUE']) > 0 && strlen($KRAKEN_TEMPLATE_ARRAY["BX_LOG"]['VALUE']) > 0 && strlen($KRAKEN_TEMPLATE_ARRAY["BX_PAS"]['VALUE']) > 0)
        {
            

            $crmUrl = "https://".trim($KRAKEN_TEMPLATE_ARRAY["BX_URL"]['VALUE'])."/"; // https://mycrm.bitrix24.ru/
            $login = trim($KRAKEN_TEMPLATE_ARRAY["BX_LOG"]['VALUE']);
            $password = trim($KRAKEN_TEMPLATE_ARRAY["BX_PAS"]['VALUE']);
            
            
            $title = GetMessage("KRAKEN_B24_TITLE").$arSite['NAME'];

            $mess = "";
            
            $mess .= GetMessage("KRAKEN_CART_MESSAGE_TEXT2").$arSite['NAME']."<br/>";
            $mess .= "<b>".GetMessage("KRAKEN_CART_MESSAGE_TEXT3")."</b>".GetMessage("KRAKEN_CART_MESSAGE_TEXT3_1")."<br/>";
            $mess .= GetMessage("KRAKEN_CART_MESSAGE_TEXT4").$url."<br/><br/>";
            
            $mess .= $crm_mes;

            $namebx = $name;
            $phonebx = $phone;
            
            if(SITE_CHARSET == "windows-1251")
            {
                $title = iconv('windows-1251', 'utf-8', $title);
                $namebx = iconv('windows-1251', 'utf-8', $namebx);
                $phonebx = iconv('windows-1251', 'utf-8', $phonebx);
                $mess = iconv('windows-1251', 'utf-8', $mess);
            }
            
            
            $arParams = array(
                'LOGIN' => $login, 
                'PASSWORD' => $password, 
                'TITLE' => $title
            );
             
            if(strlen($namebx) > 0)
                $arParams['NAME'] = $namebx;

            if(strlen($phonebx) > 0)
                $arParams['PHONE_WORK'] = $phonebx;
                
            if(strlen($email) > 0)
                $arParams['EMAIL_WORK'] = $email;
                
            if(strlen($mess) > 0)
                $arParams['COMMENTS'] = $mess;
                
                 
            
            $obHttp = new CHTTP();
            $result = $obHttp->Post($crmUrl.'crm/configs/import/lead.php', $arParams);
            $result = json_decode(str_replace('\'', '"', $result), true);
            $arRes["ER"] = '['.$result['error'].'] '.$result['error_message'];
   
        }


        //amocrm
        if($KRAKEN_TEMPLATE_ARRAY["SEND_TO_AMO"]['VALUE'][0] == 'Y' && strlen($KRAKEN_TEMPLATE_ARRAY["AMO_URL"]['VALUE']) > 0 && strlen($KRAKEN_TEMPLATE_ARRAY["AMO_LOG"]['VALUE']) > 0 && strlen($KRAKEN_TEMPLATE_ARRAY["AMO_HASH"]['VALUE']) > 0)
        {
            
            $crmUrl = "https://".trim($KRAKEN_TEMPLATE_ARRAY["AMO_URL"]['VALUE'])."/"; 
            $login = trim($KRAKEN_TEMPLATE_ARRAY["AMO_LOG"]['VALUE']);
            $hash = trim($KRAKEN_TEMPLATE_ARRAY["AMO_HASH"]['VALUE']);
            
            $title = GetMessage("B24_TITLE").$arSite['NAME'];
            
            $mess = "";
            
            $mess .= GetMessage("KRAKEN_CART_MESSAGE_TEXT2").$arSite['NAME']."\r\n";
            $mess .= "<b>".GetMessage("KRAKEN_CART_MESSAGE_TEXT3")."</b>".GetMessage("KRAKEN_CART_MESSAGE_TEXT3_1")."\r\n";
            $mess .= GetMessage("KRAKEN_CART_MESSAGE_TEXT4").$url."\r\n\r\n";
            
            $mess .= $crm_mes;

            $nameamo = $name;
            $phoneamo = $phone;
            
            if(SITE_CHARSET == "windows-1251")
            {
                $title = iconv('windows-1251', 'utf-8', $title);
                $nameamo = iconv('windows-1251', 'utf-8', $nameamo);
                $phoneamo = iconv('windows-1251', 'utf-8', $phoneamo);
                $mess = iconv('windows-1251', 'utf-8', $mess);
            }
            
            $mess = str_replace(Array("<b>","</b>","<br>", "<br/>"), Array("", "", "\r\n", "\r\n"), $mess);
            
            require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/concept.kraken/amocrm/add.php');
            
        }
    
    require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/concept.kraken/crm.php');

    $arRes["YANDEX"] = '';
        $arRes["GOOGLE"] = '';
        $arRes["GTM"] = '';


        $yaGoal = $KRAKEN_TEMPLATE_ARRAY["METRIKA_GOAL"]['VALUE'];

        $gogCat = $KRAKEN_TEMPLATE_ARRAY["GOOGLE_CATEGORY"]['VALUE'];
        $gogAct = $KRAKEN_TEMPLATE_ARRAY["GOOGLE_ACTION"]['VALUE'];

        $gtmEvn = $KRAKEN_TEMPLATE_ARRAY["GTM_EVENT"]['VALUE'];
        $gtmCat = $KRAKEN_TEMPLATE_ARRAY["GTM_CATEGORY"]['VALUE'];
        $gtmAct = $KRAKEN_TEMPLATE_ARRAY["GTM_ACTION"]['VALUE'];

        if(strlen($arIBlockElement['PROPERTIES']['YANDEX_GOAL']['VALUE']) > 0)
            $yaGoal = $arIBlockElement['PROPERTIES']['YANDEX_GOAL']['VALUE'];


        if(strlen($arIBlockElement['PROPERTIES']['GOOGLE_GOAL_CATEGORY']['VALUE'])>0)
            $gogCat = $arIBlockElement['PROPERTIES']['GOOGLE_GOAL_CATEGORY']['VALUE'];

        if(strlen($arIBlockElement['PROPERTIES']['GOOGLE_GOAL_ACTION']['VALUE'])>0)
            $gogAct = $arIBlockElement['PROPERTIES']['GOOGLE_GOAL_ACTION']['VALUE'];


        if(strlen($arIBlockElement['PROPERTIES']['GTM_EVENT']['VALUE'])>0)
            $gtmEvn = $arIBlockElement['PROPERTIES']['GTM_EVENT']['VALUE'];

        if(strlen($arIBlockElement['PROPERTIES']['GTM_GOAL_CATEGORY']['VALUE'])>0)
            $gtmCat = $arIBlockElement['PROPERTIES']['GTM_GOAL_CATEGORY']['VALUE'];

        if(strlen($arIBlockElement['PROPERTIES']['GTM_GOAL_ACTION']['VALUE'])>0)
            $gtmAct = $arIBlockElement['PROPERTIES']['GTM_GOAL_ACTION']['VALUE'];



        if(!empty($KRAKEN_TEMPLATE_ARRAY["ID_METRIKA"]) && strlen($yaGoal) > 0)
        {

            foreach($KRAKEN_TEMPLATE_ARRAY["ID_METRIKA"] as $idVal)
            {
                $arRes["YANDEX"] .= '<script>yaCounter'.htmlspecialcharsbx(trim($idVal)).'.reachGoal("'.htmlspecialcharsbx(trim($yaGoal)).'");</script>';
            }
        }
        
        if(strlen($KRAKEN_TEMPLATE_ARRAY["ID_GOOGLE"]) > 0 && strlen($gogCat) > 0 && strlen($gogAct) > 0)
        {
            $arRes["GOOGLE"] = '<script>ga("send", "event", "'.htmlspecialcharsbx(trim($gogCat)).'", "'.htmlspecialcharsbx(trim($gogAct)).'");</script>';
        }

        if(strlen($KRAKEN_TEMPLATE_ARRAY["ID_GTM"]) > 0 && strlen($gtmEvn) > 0)
        {
            $arRes["GTM"] = '<script>dataLayer.push({"event": "'.htmlspecialcharsbx(trim($gtmEvn)).'", "eventCategory": "'.htmlspecialcharsbx(trim($gtmCat)).'", "eventAction": "'.htmlspecialcharsbx(trim($gtmAct)).'"});</script>';
        }
   
 

    $arRes["CART_LINK"] = SITE_DIR."cart/?order_id=".$id_order;
    $arRes = json_encode($arRes);
    echo $arRes;

	
?>