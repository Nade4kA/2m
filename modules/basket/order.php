
<?php

/*---------Действия при оформлении заказа ---------*/

include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';  //подключаем БД
include $_SERVER['DOCUMENT_ROOT'].'/configs/configs.php';
include $_SERVER['DOCUMENT_ROOT'].'/modules/telegram/send_message.php';

//если нажата кнопка "Оформить заказ", заполнены все поля и есть товары в корзине, то
if (isset($_POST["submit"]) && isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["adress"]) && $_POST["first_name"]!="" && $_POST["last_name"]!="" && $_POST["email"]!="" && $_POST["phone"]!="" && $_POST["adress"]!=""  && isset($_COOKIE['basket'])) 
    {
         $user_id = 0;
        if (isset($_COOKIE['user_id'])) {
           $user_id = $_COOKIE['user_id']; 
        } else {
            $sql = "SELECT * FROM `users` WHERE `e-mail` = '".$_POST['email']."' ";
           
            $result = $conn->query($sql);

            $n = mysqli_num_rows($result);
            if ($result->num_rows > 0) {
                $user = mysqli_fetch_assoc($result);
                
                $user_id = $user['id'];
            } else {
                $sql = "INSERT INTO users (first_name, last_name, `e-mail`, phone, adress) VALUES ('".$_POST['first_name']."', '".$_POST['last_name']."', '".$_POST['email']."', '".$_POST['phone']."', '".$_POST['adress']."')";
                if ($conn->query($sql)) {
                    echo "User added!";
                    $user_id = $conn->insert_id;
                }
            }
        }

        //формируем запрос на добавлениеп данных в таблицу orders базы данных
        $sql_p = "INSERT INTO orders (user_id, adress, phone, items, status_id, comment) VALUES ('".$user_id."', '".$_POST["adress"]."', '".$_POST["phone"]."', '".$_COOKIE['basket']."', '1', '".$_POST["comments"]."') ";
        if (mysqli_query($conn,$sql_p)) {  //если запрос выполнен

            message_to_telegram('Hi, VoiLa! You have a new order');
        	
            setcookie("basket", "", 0, "/");//удаляем куку, если что-то осталось у нас в памяти
            
            header ("Location: /");//перенаправляем браузер на главную страничку


            OrderBasket (); //обнуляем корзину
        } else {
            echo "<h2> Ошибка 1 </h2>";
        }
    } else {
            echo "<h2> Ошибка 2 </h2>";
        }

?>