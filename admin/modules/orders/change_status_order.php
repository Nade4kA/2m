<?php

/*--------Модуль изменения статуса заказа (в админ-панели)--------*/

include "".$_SERVER['DOCUMENT_ROOT']."/configs/db.php"; //

var_dump($_POST['id']) ;
var_dump($_POST['value']);
if (isset($_POST['id']) && isset($_POST['value']) ) 
    {   
        $sql_or = "UPDATE orders SET status_id= '".$_POST["value"]."' WHERE order_id = ".$_POST["id"]." ";
        
        if (mysqli_query($conn,$sql_or)) {  //если запрос выполнен
           header ("Location: /admin/orders.php");//перенаправляем браузер на страничку products.php
        } else {
           echo "<h2> Ошибка </h2>";
        } 
    } else {echo "<h2> Ошибка </h2>";}

?>