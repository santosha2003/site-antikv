<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>


<?

$host = $_SERVER["HTTP_HOST"];

if(strlen($_SERVER["HTTP_HOST"])<=0)
    $host = $_SERVER["SERVER_NAME"];

$host = explode(":", $host);
$host = $host[0];

$sub = substr($host, 0, 4);

if($sub == "www.")
    $host = substr_replace($host, "", 0, 4);
   
$url = $_SERVER["REQUEST_SCHEME"]."://".$host.$_SERVER["REQUEST_URI"];
?>



<?
$search = array("http://", "https://", "/", "?", "=");
$replace   = array("", "", "\/", "", "");
$pattern = str_replace($search, $replace, $_SERVER['HTTP_REFERER']);
$arUrlExp = explode("\/", $pattern);

$ref_url = "";
if(preg_match("/^".$arUrlExp[0]."$/i", $host))
	$ref_url = $arUrlExp[0];
?>


<?if(strlen($ref_url) > 0 && $url != $_SERVER["HTTP_REFERER"]):?>

	<script type="text/javascript">

	    $("ul.nav").append('<li class="back"><a href="<?=$_SERVER["HTTP_REFERER"]?>"><?=GetMessage("KRAKEN_BACK")?></a></li>');

	</script>

<?endif;?>

<?
$GLOBALS["h1_main"] = $arResult["H1_MAIN"];
?>

<?$temp = $arResult["CACHED_TPL"]?>

<?if(!empty($arResult["COMPONENTS"])):?>

    <?foreach($arResult["COMPONENTS"] as $key=>$arItem):?>
        
        <?$path = $arItem["PROPERTIES"]["COMPONENT_PATH"]["VALUE"];?>

        <?$temp = preg_replace_callback(
        			"/#DYNAMIC".$key."#/is".BX_UTF_PCRE_MODIFIER,
        			create_function('$matches', 'ob_start();
        			$GLOBALS["APPLICATION"]->IncludeFile("'.$path.'", array(),
                        array(
                            "MODE"  => "php",
                        )
                    );
        			$retrunStr = @ob_get_contents();
        			ob_get_clean();
        			return $retrunStr;'),
        			$temp);
        ?>

    <?endforeach;?>

<?endif;?>

<?=$temp;?>