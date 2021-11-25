<?php

// Watermark settings
$rusantiWatermark = array(
    'orig' => array(
        'method' => BX_RESIZE_IMAGE_PROPORTIONAL,
        'sizes' => array(
            'width' => 1000,
            'height' => 1000,
        ),
        'watermark' => array(
            array(
                'name' => 'watermark',
                'type' => 'image',
                'file' => $_SERVER['DOCUMENT_ROOT'] . '/images/new-pattern-1000-1000.png',
                'alpha_level' => 100,
                'position' => 'topleft',
                'size' => 'real',
                'fill' => 'exact',
            )
        ),
    ),
    'bigThumb' => array(
        'method' => BX_RESIZE_IMAGE_PROPORTIONAL,
        'sizes' => array(
            'width' => 390,
            'height' => 390,
        ),
        'watermark' => array(
            array(
                'name' => 'watermark',
                'type' => 'image',
                'file' => $_SERVER['DOCUMENT_ROOT'] . '/images/pattern-390-390.png',
                'alpha_level' => 100,
                'position' => 'topleft',
                'size' => 'real',
                'fill' => 'exact',
            )
        ),
    ),
);

// регистрируем обработчик
AddEventHandler("iblock", "OnAfterIBlockElementAdd", Array("RusantiWatermark", "OnAfterIBlockElementAddHandler"));
AddEventHandler("iblock", "OnAfterIBlockElementUpdate", Array("RusantiWatermark", "OnAfterIBlockElementUpdateHandler"));

// Наложить водяной знак на изображения Медиабиблиотеки во время загрузки файла
AddEventHandler("main",'OnFileSave', array('RusantiWatermark', 'mediaLibraryWatermark'));

class RusantiWatermark
{
    public static $iblockId = 1;
    public static $propCode = 'FOTO';

    public static function OnAfterIBlockElementAddHandler(&$arFields)
    {
        // same as update handler
        static::OnAfterIBlockElementUpdateHandler($arFields);
    }

    public static function OnAfterIBlockElementUpdateHandler(&$arFields)
    {

        $rusantiWatermark = isset($GLOBALS['rusantiWatermark']) ? $GLOBALS['rusantiWatermark'] : FALSE;

        if($arFields["RESULT"] && static::checkIblock($arFields) && !empty($rusantiWatermark)) {
            static::configTimeout();

            $PROPERTY_CODE = static::$propCode;

            // Находим свойство
            $dbRes = CIBlockElement::GetProperty($arFields["IBLOCK_ID"], $arFields["ID"], "sort", "asc", array("CODE" => $PROPERTY_CODE));
            while ($arMorePhoto = $dbRes->GetNext(true, false))
            {
                if ($arMorePhoto["PROPERTY_TYPE"] == "F" // файл
                    //&& $arMorePhoto["MULTIPLE"] == "Y" // множественное
                )
                {
                    // находим подробные сведения о файле
                    $arFile = CFile::GetFileArray($arMorePhoto["VALUE"]);

                    // Original with watermark
                    static::generateWatermark($arFile, TRUE);
                }
            }
        }
    }

    public static function generateWatermark($arFile, $bImmediate = FALSE) {
        $rusantiWatermark = isset($GLOBALS['rusantiWatermark']) ? $GLOBALS['rusantiWatermark'] : FALSE;

        $orig = isset($rusantiWatermark['orig']) ? $rusantiWatermark['orig'] : FALSE;

        if ($orig) {
            CFile::ResizeImageGet($arFile, $orig['sizes'], $orig['method'], false, $orig['watermark'], $bImmediate);
        }

        $bigThumb = isset($rusantiWatermark['bigThumb']) ? $rusantiWatermark['bigThumb'] : FALSE;

        if ($bigThumb) {
            CFile::ResizeImageGet($arFile, $bigThumb['sizes'], $bigThumb['method'], false, $bigThumb['watermark'], $bImmediate);
        }
    }

    protected static function checkIblock(&$arFields) {
        $iblockId = static::$iblockId;

        if (!isset($arFields['IBLOCK_ID']) || $arFields['IBLOCK_ID'] != $iblockId) {
            return false;
        }

        return true;
    }

    protected static function configTimeout() {
        // for many high-resolution images resize + watermark takes long time
        //ignore_user_abort(1);
        set_time_limit(900);
    }

    public static function bulkGenerate() {
        if (!CModule::IncludeModule('iblock')) {
            return 'iblock module disabled';
        }

        //
        set_time_limit(0);
        ignore_user_abort(1);

        clearstatcache();

        $progressFile = $_SERVER['DOCUMENT_ROOT'] . '/watermark_in-progress.log';

        if (file_exists($progressFile)) {
            return 'watermark generation already in progress';
        }

        file_put_contents($progressFile, 'in progress');


        $pageFile = $_SERVER['DOCUMENT_ROOT'] . '/watermark_page.log';

        if (!file_exists($pageFile)) {
            file_put_contents($pageFile, '0');
        }

        $arSelect = array("ID", 'IBLOCK_ID', "PROPERTY_" . static::$propCode);
        $arOrder = array('ID' => 'ASC', 'property_' . static::$propCode => 'ASC');
        $arFilter = array('ACTIVE' => 'Y', 'IBLOCK_ID' => static::$iblockId);
        $arNav = array(
            'nPageSize' => 50,
            'iNumPage' => 0,
            'checkOutOfRange' => true,
        );

        do {
            clearstatcache();

            if (!file_exists($progressFile)) {
                return 'generation stopped by removing in in-progress file';
            }

            $iNumPage = (int) file_get_contents($pageFile);
            $iNumPage++;

            $arNav['iNumPage'] = $iNumPage;

            $res = CIBlockElement::GetList($arOrder, $arFilter, false, $arNav, $arSelect);
            $propCode = 'PROPERTY_' . static::$propCode . '_VALUE';

            while ($row = $res->fetch()) {
                if (isset($row[$propCode]) && $row[$propCode] > 0) {
                    static::generateWatermark($row[$propCode], TRUE);

                    clearstatcache();

                    if (!file_exists($progressFile)) {
                        return 'generation stopped by removing in in-progress file';
                    }
                }
            }

            file_put_contents($pageFile, $iNumPage);
        } while ($res->SelectedRowsCount() > 0);

        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/watermark_finish.log', 'finish');
        return 'watermark generation finished';
    }

    public static function mediaLibraryWatermark(&$arFile, $fileName, $module)
    {
        global $rusantiWatermark;

        if (
            empty($rusantiWatermark['orig'])
            || $module !== 'medialibrary'
            || !CFile::IsImage($arFile["name"])
        ) {
            return;
        }

        /*file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/mi_vars.txt', print_r([
            'file' => $arFile, 'filename' => $fileName, 'module' => $module
        ], true));*/

        $origImgSizes = $rusantiWatermark['orig']['sizes'];
        $origImgMethod = $rusantiWatermark['orig']['method'];
        $origImgWatermark = $rusantiWatermark['orig']['watermark'];

        $sourceFile = $arFile['tmp_name'];
        $destinationFile = CTempFile::GetFileName(basename($sourceFile));

        CheckDirPath($destinationFile);

        if (CFile::ResizeImageFile($sourceFile, $destinationFile, $origImgSizes, $origImgMethod, array(), false, $origImgWatermark)) {
            $arFile["tmp_name"] = $destinationFile;
            $arImageSize = CFile::GetImageSize($destinationFile);
            $arFile["type"] = $arImageSize["mime"];
            $arFile["size"] = filesize($arFile["tmp_name"]);
        }
    }

    /**
     * Наложить водяной знак на уже загруженные файлы в Медиабиблиотеку,
     * если на них нет водяного знака.
     * Не запускать несколько раз!
     * @return string Описание результата операции.
     */
    public static function convertMediaLibraryImages() {
        global $rusantiWatermark;

        set_time_limit(0);
        ignore_user_abort(1);

        clearstatcache();

        $progressFile = $_SERVER['DOCUMENT_ROOT'] . '/watermark_in-progress.log';

        if (file_exists($progressFile)) {
            return 'watermark generation already in progress';
        }

        file_put_contents($progressFile, 'in progress');

        if (empty($rusantiWatermark['orig'])) {
            return 'no watermark settings';
        }

        // Settings for watermark
        $origImgSizes = $rusantiWatermark['orig']['sizes'];
        $origImgMethod = $rusantiWatermark['orig']['method'];
        $origImgWatermark = $rusantiWatermark['orig']['watermark'];

        $uploadDirName = COption::GetOptionString("main", "upload_dir", "upload");
        $io = CBXVirtualIo::GetInstance();

        // Processing
        global $DB;

        // Получить все файлы Медиабиблиотеки
        $strSql = 'SELECT mi.ID AS media_id, mi.SOURCE_ID, f.ID as file_id, f.SUBDIR, f.FILE_NAME
			FROM b_medialib_item mi INNER JOIN b_file f ON mi.SOURCE_ID = f.ID
			ORDER BY mi.ID ASC';
        $res = $DB->Query($strSql, false, "FILE: ".__FILE__."<br> LINE: ".__LINE__);

        while($arRes = $res->Fetch()) {
            clearstatcache();

            if (!file_exists($progressFile)) {
                return 'generation stopped by removing in in-progress file';
            }

            $media_id = (int) $arRes['media_id'];
            $file_id = (int) $arRes['file_id'];
            $file_subdir = $arRes['SUBDIR'];
            $file_name = $arRes['FILE_NAME'];

            // Skip not images
            if (!CFile::IsImage($file_name)) {
                continue;
            }

            // Add watermark
            $sourceFile = $_SERVER['DOCUMENT_ROOT'] . '/' . $uploadDirName . '/' . $file_subdir . '/' . $file_name;
            $destinationFile = CTempFile::GetFileName(basename($sourceFile));

            CheckDirPath($destinationFile);

            if (!CFile::ResizeImageFile($sourceFile, $destinationFile, $origImgSizes, $origImgMethod, array(), false, $origImgWatermark)) {
                continue;
            }

            $file_width = 0;
            $file_height = 0;
            $imgArray = CFile::GetImageSize($destinationFile);

            if(is_array($imgArray)) {
                $file_width = $imgArray[0];
                $file_height = $imgArray[1];
            }

            // Update file metadata
            $file_size = filesize($destinationFile);

            if (!$io->Copy($destinationFile, $sourceFile)) {
                return 'Cannot copy resized file';
            }

            $DB->Query(
                "UPDATE b_file SET 
				WIDTH = ".$file_width.", 
				HEIGHT = ".$file_height.",
				FILE_SIZE = " . $file_size . "
			WHERE ID=".$file_id
            );

            file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/watermark_last_media_id.log', $media_id);
        }

        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/watermark_finish.log', 'finish');
        return 'watermark generation finished';
    }
}
