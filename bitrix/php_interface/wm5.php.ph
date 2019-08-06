<?php
class MyWatermark {
   //Срабатываем при создании элемента
   function ImageAdd(&$arFields) {
      //Указываем нужные ИБ, допустим ваш каталог имеет ID 14
      if ($arFields["IBLOCK_ID"] == 5) {
         if (!empty($arFields["PREVIEW_PICTURE"]["tmp_name"])) {
            MyWatermark::PostWaterMark(&$arFields["PREVIEW_PICTURE"]["tmp_name"]);
         }
         //Если заполнено детальное изображение
         if (!empty($arFields["DETAIL_PICTURE"]["tmp_name"])) {
            MyWatermark::PostWaterMark(&$arFields["DETAIL_PICTURE"]["tmp_name"]);
         }
      }
   }
   //Срабатываем при изменение элемента
   function ImageUpdate(&$arFields) {
      //То же самое, указываем ID ИБ
      if ($arFields["IBLOCK_ID"] == 5) {
         //Если заполнено изображение анонса
         if(!empty($arFields["PREVIEW_PICTURE"]["tmp_name"])){
            MyWatermark::PostWaterMark(&$arFields["PREVIEW_PICTURE"]["tmp_name"]);
         }
         //Если заполнено детальное изображение
         if (!empty($arFields["DETAIL_PICTURE"]["tmp_name"])) {
            MyWatermark::PostWaterMark(&$arFields["DETAIL_PICTURE"]["tmp_name"]);
         }
      }
   }
   function PostWaterMark(&$_image) {
      //Получаем папку для загрузок
      $_upload_dir = COption::GetOptionString("main", "upload_dir");
      $resultImage = imagecreatefromjpeg($_image);
      imagealphablending($resultImage, true);
      //Создаем временную картинку
      $_image = $_SERVER['DOCUMENT_ROOT'] . "/" . $_upload_dir . "/tmp/" . md5(microtime()) . ".jpg";
      //Узнаем размеры загружаемой картинки
      $imagesizeW = imagesx($resultImage);
      $imagesizeH = imagesy($resultImage);
      //Открываем картинку для наложения
      //Но сначала масштабируем водяной знак, т.к. размеры картинок у нас разные
      //Узнаем размер будущего водяного знака (35% от ширины картинки)
      $watermarkSize = ceil(35 * $imagesizeW / 100);
      $wmTargetArray = CFile::ResizeImageGet(
         2181, 
         array("width" => $watermarkSize, "height" => $watermarkSize),
         BX_RESIZE_IMAGE_PROPORTIONAL,
         true
      );
      //2181 - это ID watermark.png, который лежит в файловой системе Битрикса (можно закинуть в медиабиблиотеку)
      //$wmTarget = $_SERVER['DOCUMENT_ROOT'] . "/bitrix/php_interface/watermark.png";
      $wmTarget = $_SERVER['DOCUMENT_ROOT'] . $wmTargetArray["src"];

      //Загружаем PNG ватермарка
      $finalWaterMarkImage = imagecreatefrompng($wmTarget);
      //Узнаем размеры картинки водяного знака
      $finalWaterMarkWidth = imagesx($finalWaterMarkImage);
      $finalWaterMarkHeight = imagesy($finalWaterMarkImage);


      //Пихаем водяной знак в нижний правый угол картинки
      //Узнаем какой ставить отступ с краев (4% от ширины картинки)

      $watermarkMargin = ceil(4 * $imagesizeW / 100);

      imagecopy(
         $resultImage, 
         $finalWaterMarkImage, 
         $imagesizeW - $finalWaterMarkWidth - $watermarkMargin, 
         $imagesizeH - $finalWaterMarkHeight - $watermarkMargin, 
         0, 0, 
         $finalWaterMarkWidth, 
         $finalWaterMarkHeight
      );

      imagealphablending($resultImage, false);
      imagesavealpha($resultImage, true);
      imagejpeg($resultImage, $_image, 100);
      imagedestroy($resultImage);
      imagedestroy($finalWaterMarkImage);
   }
   //Очищаем временную папку
   function Clear() {
      $_upload_dir = COption::GetOptionString("main", "upload_dir");
      $_WFILE = glob($_SERVER['DOCUMENT_ROOT'] . "/" . $_upload_dir . "/tmp/*.jpg");
      foreach($_WFILE as $_file) unlink($_file);
      return true;
   }
}
?>