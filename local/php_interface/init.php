<?php
function debugLog($ar, $file_name = 'debug.txt'){
	$info = debug_backtrace();
	$file=$info[0]['file'];
	$line=$info[0]['line'];
	if(isset($info[1]['function'])):
		//Отображение функции с которой был вызов
		$function = "FUNC: ".$info[1]['function']."()";
	endif;

	if (!empty($file) && !empty($line)):
		$f=fopen($_SERVER['DOCUMENT_ROOT']."/debug/".$file_name,"a");
		//if($utf_8!==false) fwrite($f,'<meta http-equiv="Content-Type" content="text/html; charset='.$utf_8.'" />\n');
		fwrite($f,date("d.m.Y H:i:s")."\n");
		fwrite($f,"FILE: ".$file."\n");
		fwrite($f,"LINE: ".$line."\n");
		fwrite($f,$function."\n");
		if(is_bool($ar) === true):
			fwrite($f,"bool(".var_export($ar,true).")\n\n");
		else:
			fwrite($f,print_r($ar,true)."\n\n");
		endif;
		fclose($f);
	else:
		die("debug: не указан файл или строка");
	endif;
}


//Подключаем файл с функциями
require_once ($_SERVER["DOCUMENT_ROOT"]. "/local/php_interface/watermark1.php");

//Создание элемента
AddEventHandler("iblock", "OnBeforeIBlockElementAdd",array("CWatermark", "ImageAdd"));
//Изменение элемента
AddEventHandler("iblock", "OnBeforeIBlockElementUpdate",array("CWatermark", "ImageUpdate"));



// обработчик события регистрации
AddEventHandler("main", "OnBeforeUserRegister", "OnBeforeUserRegisterHandler");
// обработчик события обновления данных пользователем
AddEventHandler("main", "OnBeforeUserUpdate", "OnBeforeUserRegisterHandler");

    function mp($arr){
        echo "<pre>";
            print_r($arr);
        echo "</pre>";
    }

function custom_mail($to,$subject,$body,$headers) {
$f4=fopen($_SERVER["DOCUMENT_ROOT"]."/log-mail.txt","a+");
//    fwrite($f3, print_r($imgprop,true));//печатаем в файл результирующий массив для проверки
fwrite($f4, print_r(array(‘TO’ => $to, ‘SUBJECT’ => $subject, ‘BODY’ => $body, ‘HEADERS’ => $headers),1)."n========n");
fclose($f4);
return mail($to,$subject,$body,$headers);
}


function OnBeforeUserRegisterHandler($args) {
	if(isset($_POST['c']) && $_POST['c'] != $_POST['s']) {
		$GLOBALS['APPLICATION']->ThrowException('Произошла внутренняя ошибка, попробуйте еще раз');
		return false;
	}

   	if (!preg_match("/^[а-яА-Я]+$/ui", $args['NAME'])) {
   		if(empty($args['NAME'])) {
	   		$GLOBALS['APPLICATION']->ThrowException('Имя обязательное поле');
	   		return false;
   		}else{
	   		$GLOBALS['APPLICATION']->ThrowException('Имя может состоять только из русских букв');
	   		return false;
                      //return true;
   		}
    }

    if (!preg_match("/^[а-яА-Я]+$/ui", $args['LAST_NAME'])) {
    	if(empty($args['LAST_NAME'])) {
	   		$GLOBALS['APPLICATION']->ThrowException('Фамилия обязательное поле');
	   		return false;
   		}else{
	   		//$GLOBALS['APPLICATION']->ThrowException('Фамилия может состоять только из русских букв');
	   		//return false;
   		}
 
    }

    return true;
}



// Catalog: Generate transparent watermark on iblock update
//require_once 'watermark-rusanti.php';
require_once dirname(__FILE__) . '/watermark-rusanti.php';

?>
