<?php
class CWatermark {
    //Срабатываем при создании элемента
    function ImageAdd($arFields)
	{
	    $ok = true;
	    print_r ($arFields["IBLOCK_ID"]);
	    //Указываем нужные ИБ
	    if ($arFields["IBLOCK_ID"] == 1)
		{
		    if (!empty($arFields["PREVIEW_PICTURE"]["tmp_name"]))
			{
			    $ok = $ok && CWatermark::PostWaterMark($arFields["PREVIEW_PICTURE"]["tmp_name"]);
			}
		    //Если заполнено детальное изображение
		    if (!empty($arFields["DETAIL_PICTURE"]["tmp_name"]))
			{
			    $ok = $ok && CWatermark::PostWaterMark($arFields["DETAIL_PICTURE"]["tmp_name"]);
			}
		    //Тут наносим на дополнительное фото
		    foreach ($arFields["PROPERTY_VALUES"]["4"] as $key=>$moreimg)
			{
			    $ok = $ok && CWatermark::PostWaterMark($arFields["PROPERTY_VALUES"]["4"][$key]['VALUE']['tmp_name']);
			}
		}
	    return $ok;
	}


	//Срабатываем при изменение элемента
	function ImageUpdate($arFields)
	{
	    $ok = true;
	    //То же самое, указываем ID ИБ
	    if ($arFields["IBLOCK_ID"] == 1)
		{
		    //Если заполнено изображение анонса
		    if (!empty($arFields["PREVIEW_PICTURE"]["tmp_name"]))
			{
			    $ok = $ok && CWatermark::PostWaterMark($arFields["PREVIEW_PICTURE"]["tmp_name"]);
			}
		    //Если заполнено детальное изображение
		    if (!empty($arFields["DETAIL_PICTURE"]["tmp_name"]))
			{
			    $ok = $ok && CWatermark::PostWaterMark($arFields["DETAIL_PICTURE"]["tmp_name"]);
			}
		    //Тут наносим на дополнительное фото, 78 это ID свойства ИБ
		    foreach ($arFields["PROPERTY_VALUES"]["4"] as $key=>$moreimg)
			{
			    $ok = $ok && CWatermark::PostWaterMark($arFields["PROPERTY_VALUES"]["4"][$key]['VALUE']['tmp_name']);
			}
		}
	    return $ok;
	}

function PostWaterMark($_image){

//Получаем папку для загрузок

$_upload_dir = COption::GetOptionString("main","upload_dir");


//Открываем картинку для наложения "{$docroot}/"
$wmTarget = $_SERVER['DOCUMENT_ROOT'] ."/bitrix/php_interface/wm.png";
$resultImage = imagecreatefromjpeg($_image);
imagealphablending($resultImage, true);

//Создаем временную картинку 
$_image = $_SERVER['DOCUMENT_ROOT'] . "/" . $_upload_dir. "/tmp/".md5(microtime()).".jpg";
$_im2 = $_SERVER['DOCUMENT_ROOT'] . "/" . $_upload_dir. "/tmp/".md5(microtime()).".jpg";

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
imagejpeg ($_image, $_im2, 90);
//$arFields["DETAIL_PICTURE"]["tmp_name"] = $_image;
<------>  //  if (!empty($debug)) {
<------><-//----->global $APPLICATION;
<------><-//----->$APPLICATION->throwException( print_r($debug, true) );
<------><//------>return false;
<------>  //  }
<------>   // return true;

//return $_image;
}


//Очищаем временную папку 
function Clear() {
//$_upload_dir = COption::GetOptionString("main","upload_dir");
//$_WFILE = glob($_SERVER['DOCUMENT_ROOT'] . "/" . $_upload_dir . "/tmp/*.jpg");
//foreach($_WFILE as $_file) unlink($_file);

return true;

}


/*	function PostWaterMark($image)
	{
	    // это я полностью переписал

	    if (empty($image)) return true;

	    $dir_upload = COption::GetOptionString("main","upload_dir");
	    $docroot = $_SERVER["DOCUMENT_ROOT"];
	    $hash = md5(microtime());

	    $wm_path = "{$docroot}/bitrix/php_interface/wm.png";
	    $wm = imagecreatefrompng($wm_path);
	    $wm_w = imagesx($wm);
	    $wm_h = imagesy($wm);
	    //$wm_a = $wm_w / $wm_h;

	    $im = imagecreatefromjpeg($image);
	    $im_w = imagesx($im);
	    $im_h = imagesy($im);
	    ///$im_a = $im_w / $im_h;
	    $image = "{$docroot}/{$dir_upload}/tmp/{$hash}.jpg";

	    $ratio = $im_w / $wm_w; //($im_a > $wm_a) ? $im_w / $wm_w : $im_h / $wm_h;

	    imagecopyresampled(
		$im,
		$wm,
		($im_w - ($wm_w * $ratio)) / 2,
		($im_h - ($wm_h * $ratio)) / 2,
		0,
		0,
		$wm_w * $ratio,
		$wm_h * $ratio,
		$wm_w,
		$wm_h
	    );

	    imagejpeg($im, $image, 90);

	    imagedestroy($im);
	    imagedestroy($wm);

	    if (!empty($debug)) {
		global $APPLICATION;
		$APPLICATION->throwException( print_r($debug, true) );
		return false;
	    }
	    return true;
	}

	//Очищаем временную папку
	function Clear()
	{
	    $_upload_dir = COption::GetOptionString("main", "upload_dir");
	    $_WFILE = glob($_SERVER['DOCUMENT_ROOT'] . "/" .$_upload_dir . "/tmp/*.jpg");
	    foreach($_WFILE as $_file)
	    unlink($_file);
	    return true;
	}
*/
    }

?>