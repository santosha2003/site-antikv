<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?$APPLICATION->ShowHead()?>
<title><?$APPLICATION->ShowTitle()?></title>
<link href="<?=SITE_TEMPLATE_PATH?>/template_styles.css" rel="stylesheet" type="text/css" />
<?$APPLICATION->ShowPanel();?>
</head>
<body>

<div id="templatemo_container">

	<div id="templatemo_menu">
<?$APPLICATION->IncludeComponent("bitrix:menu", "top_menu", array(
	"ROOT_MENU_TYPE" => "top",
	"MENU_CACHE_TYPE" => "N",
	"MENU_CACHE_TIME" => "3600",
	"MENU_CACHE_USE_GROUPS" => "Y",
	"MENU_CACHE_GET_VARS" => array(
	),
	"MAX_LEVEL" => "1",
	"CHILD_MENU_TYPE" => "left",
	"USE_EXT" => "N",
	"DELAY" => "N",
	"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?>
    
    </div> <!-- end of menu -->
    
    <div id="templatemo_banner">
    
    	<div id="site_title">
            <h1>
            <a href="#">
            	<img src="images/templatemo_logo.png" alt="logo" />
	            <span>free website template</span></a>
            </h1>
        </div>
        
        <p>
        	“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat elit vel lectus ultrices ac bibendum lectus. <br />
       	  Phasellus ligula nisi, vulputate in tempus in, elementum id lacus.”      </p>
    
  </div> <!-- end of banner -->
    
    <div id="templatemo_content">

        <div id="main_column">
  