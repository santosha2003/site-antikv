<?php
//Подключаем файл с функциями
require_once ($_SERVER["DOCUMENT_ROOT"]. "/bitrix/php_interface/watermark1.php");
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
?>
