<?php
class CWatermark {
 // chmod 1777 ./tmp ./bitrix/tmp ./upload  ./upload/tmp
 // св-ва инфоблока-настроить вн вид списка - вывести все поля -не обязательно но проще отладка
 // ./.upload/tmp сохраняется оригинал картинки и включены 2 файла лога - пишется $arFields
   //Срабатываем при создании элемента
   function ImageAdd($arFields) {
      //Указываем нужные ИБ, допустим ваш каталог имеет ID 1
      if ($arFields["IBLOCK_ID"] == 1) {
       CWatermark::log_array($arFields); // убрать после отладки 
         if (!empty($arFields["PREVIEW_PICTURE"]["tmp_name"])) {
            CWatermark::PostWaterMark($arFields["PREVIEW_PICTURE"]["tmp_name"]);
         }
         //Если заполнено детальное изображение
         if (!empty($arFields["DETAIL_PICTURE"]["tmp_name"])) {
//            //foreach($arFields[PROPERTY_VALUES][28] as &$file):
//             foreach($arFields["DETAIL_PICTURE"] as &$file):
//       CAllFile::ResizeImage(
//         $file, 
//         array("width" => "200", "height" => "200"), 
//         BX_RESIZE_IMAGE_PROPORTIONAL);
//	     endforeach;
            CWatermark::PostWaterMark($arFields["DETAIL_PICTURE"]["tmp_name"]);

 //        $tok="bbb";
            //$arFields[NAME] = $tok;  //имя присваиваем из свойства
            //if ($arFields[PROPERTY_VALUES][69][0] == "") {$arFields[ACTIVE] = "N";} //aктивность также в зависимости от свойства
//
//        $arFields[PROPERTY_VALUES][2][n0][VALUE]["name"]=$arFields[DETAIL_PICTURE]["name"];
//        $arFields[PROPERTY_VALUES][2][n0][VALUE]["type"]=$arFields[DETAIL_PICTURE]["type"];
//        $arFields[PROPERTY_VALUES][2][n0][VALUE]["tmp_name"]=$arFields[DETAIL_PICTURE]["tmp_name"];
//        $arFields[PROPERTY_VALUES][2][n0][VALUE][error]=$arFields[DETAIL_PICTURE][error];
//        $arFields[PROPERTY_VALUES][2][n0][VALUE][size]=$arFields[DETAIL_PICTURE][size];
//        $arFields[PROPERTY_VALUES][2][n0][VALUE]["COPY_FILE"] = "Y";
//            $arFields[TAGS] = trim($tok, " ;:\/*.,");
            $f=fopen($_SERVER["DOCUMENT_ROOT"]."/logc1.txt","w");
            fwrite($f, print_r($arFields,true));//печатаем в файл результирующий массив для проверки
            fclose($f);

     CWatermark::log_array($arFields); // убрать после отладки.
//Тут наносим на дополнительное фото, 2 это ID свойства ИБ       //for jcarusel

    foreach ($arFields["PROPERTY_VALUES"]["2"] as $key=>$moreimg)
         {
    CWatermark::PostWaterMark($arFields["PROPERTY_VALUES"]["2"][$key]['VALUE']['tmp_name']);


         }
             //REAL_PICTURE  //Оригинал
        CWatermark::PostWaterMark($arFields["PROPERTY_VALUES"]["2"]["n0"]["VALUE"]["tmp_name"]);
         //CWatermark::PostWaterMark($arFields[PROPERTY_VALUES][2][0][VALUE][tmp_name]);

/* [n0] => Array
                        (
                            [VALUE] => Array
                                (
                                    [name] =>
                                    [type] =>
                                    [tmp_name] =>
                                    [error] => 4
                                    [size] => 0
                                )

                        )
*/

//    foreach($arFields["PROPERTY_VALUES"]["2"] as &$file):
//       CAllFile::ResizeImage(
//         $file, 
//         array("width" => "200", "height" => "200"), 
//         BX_RESIZE_IMAGE_PROPORTIONAL);
//    endforeach;

      }
      }
   }
   //Срабатываем при изменение элемента
   function ImageUpdate($arFields) {
      //То же самое, указываем ID ИБ
      if ($arFields["IBLOCK_ID"] == 1) {
         //Если заполнено изображение анонса
         if(!empty($arFields["PREVIEW_PICTURE"]["tmp_name"])){
            CWatermark::PostWaterMark($arFields["PREVIEW_PICTURE"]["tmp_name"]);
         }
         //Если заполнено детальное изображение
         if (!empty($arFields["DETAIL_PICTURE"]["tmp_name"])) {
            CWatermark::PostWaterMark($arFields["DETAIL_PICTURE"]["tmp_name"]);
         }
      }
   }
   // записывает все что передадут в /bitrix/log.txt

   function log_array() {
   $arArgs = func_get_args(); 
   $sResult = ''; 
   foreach($arArgs as $arArg) { 
      $sResult .= "\n\n".print_r($arArg, true); 
   }

   if(!defined('LOG_FILENAME')) { 
      define('LOG_FILENAME', $_SERVER['DOCUMENT_ROOT'].'/bitrix/log.txt'); 
   } 
   AddMessage2Log($sResult, 'log_array -> ');
   }

   function PostWaterMark(&$image) {
//echo ("<pre>");
//print_r ($key);
//print_r ($arFields);
//echo ("</pre>");

      //Получаем папку для загрузок
      $_upload_dir = COption::GetOptionString("main", "upload_dir");



      $resultImage = imagecreatefromjpeg($image);
      imagealphablending($resultImage, true);
      //Создаем временную картинку  //пригодилось для копии только
      $_image = $_SERVER['DOCUMENT_ROOT'] . "/" . $_upload_dir . "/tmp/" . md5(microtime()) . ".jpg";
    imagejpeg($resultImage, $_image, 100);   //save original
      //Узнаем размеры загружаемой картинки
      $imagesizeW = imagesx($resultImage);
      $imagesizeH = imagesy($resultImage);

      //Открываем картинку для наложения
      //Но сначала масштабируем водяной знак, т.к. размеры картинок у нас разные
      //Узнаем размер будущего водяного знака (8% //35% от ширины картинки)

      $watermarkSize = ceil(8 * $imagesizeW / 100);

      $wmTargetArray = CFile::ResizeImageGet(
         63,
         array("width" => $watermarkSize, "height" => $watermarkSize),
         BX_RESIZE_IMAGE_PROPORTIONAL,
         true
      );
      //2181 - это ID watermark.png, который лежит в файловой системе Битрикса b_file ID SUBDIR FILE_NAME (закинуть в медиабиблиотеку)

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

      imagecopy($resultImage,$finalWaterMarkImage,$imagesizeW - $finalWaterMarkWidth - $watermarkMargin, $imagesizeH - $finalWaterMarkHeight - $watermarkMargin, 0, 0, $finalWaterMarkWidth, $finalWaterMarkHeight);

      imagealphablending($resultImage, false);
      imagesavealpha($resultImage, true);
      imagejpeg($resultImage, $image, 100);      //result $image overwrite original with watermark 8% size right bottom
     //imagejpeg($resultImage, $_image, 100);  //save copy with watermark in upload/tmp 
      imagedestroy($resultImage);
      imagedestroy($finalWaterMarkImage);
       //rename($_SERVER["DOCUMENT_ROOT"].$newimg["src"],$_image["tmp_name"]);
        //       $_image["size"]=$newimg["size"];

      //$GLOBALS['APPLICATION']->ThrowException('file $_image');
    //return ($_image);   //return as input $image
    
   }
   //Очищаем временную папку
  // function Clear() {
      //$_upload_dir = COption::GetOptionString("main", "upload_dir");
      //$_WFILE = glob($_SERVER['DOCUMENT_ROOT'] . "/" . $_upload_dir . "/tmp/*.jpg");
      //foreach($_WFILE as $_file) unlink($_file);
     // return true;
  // }
}

?>
