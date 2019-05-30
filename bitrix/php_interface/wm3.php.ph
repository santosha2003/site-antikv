$arFilters = array(array("name" => "watermark", "position" => "center", "size"=>"big", 'type'=>'image', "file"=>$_SERVER['DOCUMENT_ROOT']."/upload/watermark.png",'alpha_level'=>'50'));

$arFileTmp = CFile::ResizeImageGet(
            $pictureId,
            array("width" => 175, "height" => 235),
            BX_RESIZE_IMAGE_EXACT,
            false, $arFilters
         );