<?php 

class CWatermark{ 

//����������� ��� �������� �������� 

function ImageAdd($arFields){ 

//��������� ������ ��, �������� ��� ������� ����� ID 14 

if ($arFields["IBLOCK_ID"] == 1  ){ 

 if (!empty($arFields["PREVIEW_PICTURE"]["tmp_name"])){ 

// CWatermark::PostWaterMark(&$arFields["PREVIEW_PICTURE"]["tmp_name"]); 
 } 


//���� ��������� ��������� ����������� 

 if (!empty($arFields["DETAIL_PICTURE"]["tmp_name"])){ 

 CWatermark::PostWaterMark($arFields["DETAIL_PICTURE"]["tmp_name"]); 
 } 




//��� ������� �� �������������� ����, 4 ��� ID �������� �� 

 foreach ($arFields["PROPERTY_VALUES"][4] as $key=>$moreimg) 

 { 

 CWatermark::PostWaterMark($arFields["PROPERTY_VALUES"][4][$key]['tmp_name']); 
 
// echo ("<pre>");
// print_r ($moreimg);
//echo ("</pre>");

 } 
 echo $arFields["DETAIL_PICTURE"]["tmp_name"];


} 















if ($arFields["IBLOCK_ID"] == 4 ){ 

 if (!empty($arFields["PREVIEW_PICTURE"]["tmp_name"])){ 

// CWatermark::PostWaterMark(&$arFields["PREVIEW_PICTURE"]["tmp_name"]); 
 } 


//���� ��������� ��������� ����������� 

 if (!empty($arFields["DETAIL_PICTURE"]["tmp_name"])){ 

 CWatermark::PostWaterMark($arFields["DETAIL_PICTURE"]["tmp_name"]); 
 } 




//��� ������� �� �������������� ����, 4 ��� ID �������� �� 

 foreach ($arFields["PROPERTY_VALUES"][8] as $key=>$moreimg) 

 { 

 CWatermark::PostWaterMark($arFields["PROPERTY_VALUES"][8][$key]['tmp_name']); 
 
// echo ("<pre>");
// print_r ($moreimg);
//echo ("</pre>");

 } 
 echo $arFields["DETAIL_PICTURE"]["tmp_name"];


} 








} 


//����������� ��� ��������� �������� 

function ImageUpdate($arFields){ 
/*echo ("<pre>");
print_r($arFields);
echo ("</pre>");
*/


//�� �� �����, ��������� ID �� 

if ($arFields["IBLOCK_ID"] == 1){ 


//���� ��������� ����������� ������ 

 if (!empty($arFields["PREVIEW_PICTURE"]["tmp_name"])){ 

 //CWatermark::PostWaterMark(&$arFields["PREVIEW_PICTURE"]["tmp_name"]); 

 } 


//���� ��������� ��������� ����������� 

 if (!empty($arFields["DETAIL_PICTURE"]["tmp_name"])){ 

 CWatermark::PostWaterMark($arFields["DETAIL_PICTURE"]["tmp_name"]); 

 } 



//��� ������� �� �������������� ����, 4 ��� ID �������� �� 

 foreach ($arFields["PROPERTY_VALUES"][4] as $key=>$mrmg) 

 { 
 CWatermark::PostWaterMark($arFields["PROPERTY_VALUES"][4][$key]['tmp_name']); 
 
//echo ("<pre>");
//print_r ($key);
//echo ("</pre>");
 } 
 

 //exit;
 

} 









//�� �� �����, ��������� ID �� 

if ($arFields["IBLOCK_ID"] == 4){ 


//���� ��������� ����������� ������ 

 if (!empty($arFields["PREVIEW_PICTURE"]["tmp_name"])){ 

 //CWatermark::PostWaterMark(&$arFields["PREVIEW_PICTURE"]["tmp_name"]); 

 } 


//���� ��������� ��������� ����������� 

 if (!empty($arFields["DETAIL_PICTURE"]["tmp_name"])){ 

 CWatermark::PostWaterMark($arFields["DETAIL_PICTURE"]["tmp_name"]); 

 } 



//��� ������� �� �������������� ����, 4 ��� ID �������� �� 

 foreach ($arFields["PROPERTY_VALUES"][8] as $key=>$mrmg) 

 { 
 CWatermark::PostWaterMark($arFields["PROPERTY_VALUES"][8][$key]['tmp_name']); 
 
//echo ("<pre>");
//print_r ($key);
//echo ("</pre>");
 } 
 

 //exit;
 

} 



} 

function PostWaterMark($_image){ 

//�������� ����� ��� �������� 

$_upload_dir = COption::GetOptionString("main","upload_dir");  


//��������� �������� ��� ��������� 
$wmTarget = $_SERVER['DOCUMENT_ROOT'] ."/bitrix/php_interface/wm.png";  
$resultImage = imagecreatefromjpeg($_image); 
imagealphablending($resultImage, true); 

//������� ��������� �������� 
$_image = $_SERVER['DOCUMENT_ROOT'] . "/" . $_upload_dir. "/tmp/".md5(microtime()).".jpg"; 


//��������� PNG ���������� 
$finalWaterMarkImage = imagecreatefrompng($wmTarget); 

//������ ������� �������� �������� ����� 
$finalWaterMarkWidth = imagesx($finalWaterMarkImage); 
$finalWaterMarkHeight = imagesy($finalWaterMarkImage); 

//������ ������� ����������� �������� 
$imagesizeW = imagesx($resultImage); 
$imagesizeH = imagesy($resultImage); 

//������ ������� ���� � ������ ������ ���� �������� 
imagecopy($resultImage, $finalWaterMarkImage, $imagesizeW - $finalWaterMarkWidth, $imagesizeH - $finalWaterMarkHeight, 0, 0, $finalWaterMarkWidth, $finalWaterMarkHeight); 


imagealphablending($resultImage, false); 
imagesavealpha($resultImage, true); 
imagejpeg($resultImage, $_image, 100); 
imagedestroy($resultImage); 
imagedestroy($finalWaterMarkImage); 
} 


//������� ��������� ����� 
function Clear(){ 


return true; 

} 

} 

?>