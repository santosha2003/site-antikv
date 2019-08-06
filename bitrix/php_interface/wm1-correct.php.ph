
В файле init.php:

<?php
//Подключаем файл с функциями
require_once ($_SERVER['DOCUMENT_ROOT']."/bitrix/php_interface/watermark.php"); 

//Создание элемента

AddEventHandler("iblock", "OnBeforeIBlockElementAdd",array("CWatermark", "ImageAdd"));

//Изменение элемента

AddEventHandler("iblock", "OnBeforeIBlockElementUpdate",array("CWatermark", "ImageUpdate"));

?>


В файле watermark.php:



<?php
class CWatermark{

//Срабатываем при создании элемента

function ImageAdd(&$arFields){

//Указываем нужные ИБ, допустим ваш каталог имеет ID 12

if ($arFields["IBLOCK_ID"] == 12){

if (!empty($arFields["PREVIEW_PICTURE"]["tmp_name"])){

CWatermark::PostWaterMark($arFields["PREVIEW_PICTURE"]["tmp_name"]);
}

//Если заполнено детальное изображение

if (!empty($arFields["DETAIL_PICTURE"]["tmp_name"])){

CWatermark::PostWaterMark($arFields["DETAIL_PICTURE"]["tmp_name"]);
}


//Тут наносим на дополнительное фото, 132 это ID свойства ИБ

foreach ($arFields["PROPERTY_VALUES"]["132"] as $key=>$moreimg)

{

CWatermark::PostWaterMark($arFields["PROPERTY_VALUES"]["132"][$key]['VALUE']['tmp_name']);

}

}

}


//Срабатываем при изменение элемента

function ImageUpdate(&$arFields){


//То же самое, указываем ID ИБ

if ($arFields["IBLOCK_ID"] == 12){


//Если заполнено изображение анонса

if (!empty($arFields["PREVIEW_PICTURE"]["tmp_name"])){

CWatermark::PostWaterMark($arFields["PREVIEW_PICTURE"]["tmp_name"]);

}


//Если заполнено детальное изображение

if (!empty($arFields["DETAIL_PICTURE"]["tmp_name"])){

CWatermark::PostWaterMark($arFields["DETAIL_PICTURE"]["tmp_name"]);

}



//Тут наносим на дополнительное фото, 132 это ID свойства ИБ

foreach ($arFields["PROPERTY_VALUES"]["132"] as $key=>$moreimg)

{
CWatermark::PostWaterMark($arFields["PROPERTY_VALUES"]["132"][$key]['VALUE']['tmp_name']);
}
}
}

function PostWaterMark(&$_image){

//Получаем папку для загрузок

$_upload_dir = COption::GetOptionString("main","upload_dir"); 


//Открываем картинку для наложения
$wmTarget = $_SERVER['DOCUMENT_ROOT'] ."/bitrix/php_interface/watermark.png"; 
$resultImage = imagecreatefromjpeg($_image);
imagealphablending($resultImage, true);

//Создаем временную картинку
$_image = $_SERVER['DOCUMENT_ROOT'] . "/" . $_upload_dir. "/tmp/".md5(microtime()).".jpg";


//Загружаем PNG ватермарка
$finalWaterMarkImage = imagecreatefrompng($wmTarget);

//Узнаем размеры картинки водяного знака
$finalWaterMarkWidth = imagesx($finalWaterMarkImage);
$finalWaterMarkHeight = imagesy($finalWaterMarkImage);

//Узнаем размеры загружаемой картинки
$imagesizeW = imagesx($resultImage);
$imagesizeH = imagesy($resultImage);

//Пихаем водяной знак в нижний правый угол картинки
imagecopy($resultImage, $finalWaterMarkImage, $imagesizeW - $finalWaterMarkWidth, $imagesizeH - $finalWaterMarkHeight, 0, 0, $finalWaterMarkWidth, $finalWaterMarkHeight);


imagealphablending($resultImage, false);
imagesavealpha($resultImage, true);
imagejpeg($resultImage, $_image, 100);
imagedestroy($resultImage);
imagedestroy($finalWaterMarkImage);
}


//Очищаем временную папку
function Clear(){
$_upload_dir = COption::GetOptionString("main",
"upload_dir");
$_WFILE = glob($_SERVER['DOCUMENT_ROOT'] . "/" .
$_upload_dir . "/tmp/*.jpg");
foreach($_WFILE as $_file)
unlink($_file);

return true;

}

}

?>