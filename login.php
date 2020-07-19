<?php

include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php'; //поключаем БД к странице


//если существует POST-запрос и метод запроса - POST
if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){

      if (isset($_POST) AND ($_POST["email"] == "" || $_POST["password"] == "")) {
        ?>
        <!--Проверяем заполнены ли все поля-->
        <script type="text/javascript">  alert("Заполните все поля!" ); </script>
        <?php
      } else {
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM users WHERE password = '".$password."' AND  `e-mail` = '".$_POST['email']."' ";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
          echo "User is detected!";
          $user = mysqli_fetch_assoc($result);
          
          if ($user['verified'] != "0") {
            echo "User is verified! LogIn";
            header ("Location: /");
            setcookie('user_id', $user['id'], time() + 60*60, "/");

          } else {
            
            header ("Location: sendemail.php");
          }

        } else {
          ?>
          <script type="text/javascript">  alert("Пользователя с такими данными не найдено. Введите Ваши данные еще раз или зарегистрируйтесь." ); </script>
          <?php
        }
    }
}
/*     Форма регистрации пользователя
1. Сделать форму регистрации
2. Сделать отправку формы
3. Сделат отправку письма со ссылкой на подтверждение регистрации
4. Сделать страницу с подтверждением регистрации
*/

?>
 

<?php
include 'parts/header.php';
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="heading-section1">
        <h2>Введите данные для авторизации</h2>
        <img src="images/under-heading.png" alt="" />
      </div>
    </div>
  </div>
<form method="POST" class="send-message">
  <div class="form-group">
    <label for="exampleInputEmail1">Введите свой e-mail</label>
    <input type="text" name="email" class = "inputs">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Введите свой пароль</label>
    <input type="password" name="password" class = "inputs">
  </div>
  
  <div class = "send">
  <button type="submit">Войти</button>
 </div>
    <br>

  <a href="register.php">Зарегистрироваться</a>
</form>




</div>

   <?php

include 'parts/footer.php';
?>