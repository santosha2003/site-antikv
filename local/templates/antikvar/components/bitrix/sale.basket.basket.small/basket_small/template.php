<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

	<div class="basketSmall">
	<?if ($arResult["READY"]=="Y"):?>
		<?
		foreach ($arResult["ITEMS"] as $v)
		{
			if ($v["DELAY"]=="N" && $v["CAN_BUY"]=="Y")
			{
				?>			
   <?$quant=$quant+$v["QUANTITY"]?>				
				<?
			}
		}
		?>		
	<?endif;?>
	 <a href="/personal/cart/"><b><?if ($quant):?><?=$quant?><?else:?>0<?endif?></b> товар(-ов)</a></div>

