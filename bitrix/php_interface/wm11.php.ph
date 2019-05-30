<?php
/* zukka.ru watermark class for additional Bitrix images */
class ZWatermark {
   const
      WATERMARK = "/bitrix/php_interface/wm.png", // относительный урл к картинке ватермарка
      POSITION = "mc", // положение ватермарка
      MAXWIDTH = 1900, // максимальная ширина
      MAXHEIGHT = 1080, // максимальная высота
      ALPHA = 100; // уровень альфа

function ProcImages(&$arFields) {
   $IBLOCKS = [1,4,11]; // номера обрабатываемых инфоблоков. Массивы нельзя пихать в константы(
   $FIELDS = [2,25,29]; // номера обрабатываемых свойств инфоблоков

   if(!in_array($arFields["IBLOCK_ID"], $IBLOCKS)) return $arFields;
   foreach ($FIELDS as $field)
      if(isset($arFields["PROPERTY_VALUES"][$field]))
         foreach ($arFields["PROPERTY_VALUES"][$field][n0] as &$image)
            ZWatermark::PostWaterMark($image["VALUE"]);
}

function PostWaterMark(&$image) {
   if($image["tmp_name"])
   {
   $wt = ["name"=>"watermark","position"=>ZWatermark::POSITION,"size"=>"real","type"=>"image",
      "alpha_level"=>ZWatermark::ALPHA,"file"=>$_SERVER["DOCUMENT_ROOT"].ZWatermark::WATERMARK];
   $size = ["width"=>ZWatermark::MAXWIDTH,"height"=>ZWatermark::MAXHEIGHT];
   $origsize = getimagesize($image["tmp_name"]);
   if($origsize) {
      $mtr = mt_rand(111111111,999999999);
      $file = ["FILE_NAME"=>$mtr,"SUBDIR"=>"tmp","CONTENT_TYPE"=>$image["type"],"WIDTH"=>$origsize[0],"HEIGHT"=>$origsize[1]];
      if(copy($image["tmp_name"],$_SERVER["DOCUMENT_ROOT"]."/upload/tmp/".$mtr)) {
         $newimg = CFile::ResizeImageGet($file,$size,BX_RESIZE_IMAGE_PROPORTIONAL,true,[$wt]);
         if($newimg["src"]) {
               //unlink($image["tmp_name"]);
               rename($_SERVER["DOCUMENT_ROOT"].$newimg["src"],$image["tmp_name"]);
               $image["size"]=$newimg["size"];
            }
         }
      }
   }
}

}

//ну и использовать потом так в init.php:
//Код

//AddEventHandler("iblock", "OnBeforeIBlockElementAdd",array("ZWatermark", "ProcImages")); 
//AddEventHandler("iblock", "OnBeforeIBlockElementUpdate",array("ZWatermark", "ProcImages")); 
?>