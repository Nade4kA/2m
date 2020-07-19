<?php

/*---------Действия при нажатии кнопки Перезвонить мне ---------*/

include $_SERVER['DOCUMENT_ROOT'].'/configs/configs.php';
include $_SERVER['DOCUMENT_ROOT'].'/modules/telegram/send_message.php';

//если нажата кнопка "ОформПерезвонить мне", заполнены все поля, то
if (isset($_POST["submit"]) && isset($_POST["name"]) && isset($_POST["phone"]) && $_POST["name"]!="" && $_POST["phone"]!="") 
    {
    	 message_to_telegram('Hi, VoiLa! Call me, please: '. $_POST["name"].', '.$_POST["phone"].' ');
    }
header ("Location: /");//перенаправляем браузер на главную страничку
?>