<?php
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php'; //поключаем БД к странице
// Проверка заполнения формы

$first_nameErr = $last_nameErr = $phoneErr = $adressErr = $emailErr = $passwordErr = "";
$first_name = $last_name = $phone = $adress = $email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["first_name"])) {
    $first_nameErr = "Имя обязательно";
  } else {
    $first_name = test_input($_POST["first_name"]);
    // check if name only contains letters
    if (!preg_match("/^[a-zA-Zа-яА-Я]+$/iu",$first_name)) {
      $first_nameErr = "Только буквы";
    }
  }
  
  if (empty($_POST["last_name"])) {
    $last_nameErr = "Фамилия обязательна";
  } else {
    $last_name = test_input($_POST["last_name"]);
    // check if name only contains letters
    if (!preg_match("/^[a-zA-Zа-яА-Я]+$/iu",$last_name)) {
      $last_nameErr = "Только буквы";
    }
  }

  if (empty($_POST["phone"])) {
    $phoneErr = "Телефон обязателен";
  } else {
    $phone = test_input($_POST["phone"]);
    // check if name only contains letters
    if (!preg_match("/^[0-9]*$/",$phone)) {
      $phoneErr = "Только цифри";
    }
  }
    
  if (empty($_POST["adress"])) {
    $adressErr = "Адрес обязателен!";
  } else {
    $adress = test_input($_POST["adress"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Елек. почта обязателена";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Не верный формат електронной почты";
    }
  }

  if (empty($_POST["password"])) {
    $passwordErr = "Пароль обязателен";
  } else {
    $password = test_input($_POST["password"]);
    if (!preg_match("/^[a-zA-Z0-9]*$/",$password)) {
      $passwordErr = "Only letters allowed";
    }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// Проверка пройдена верификация

if (isset($_GET['u_code'])) {
  $sql = "SELECT * FROM users WHERE `confirm_mail` = '".$_GET['u_code']."' ";
  
  $result = $conn->query($sql);
  

  if ($result->num_rows > 0) {
    
    $user = mysqli_fetch_assoc($result);
    
    $sql_up = "UPDATE `users` SET `verified` = '1', `confirm_mail` = '' WHERE `id` = '".$user['id']."' ";

    if ($conn->query($sql_up)) {
      echo "User is verified!";
      header ("Location: login.php");
    }
  }
}
//если существует POST-запрос и метод запроса - POST

if ($first_nameErr == "" and $last_nameErr == "" and $phoneErr == "" and $adressErr == "" and $emailErr == "" and $passwordErr == "") {
 
if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST" ) {

  $password = md5($_POST['password']);

  $u_code = generateRandomString(20);

  //register
  $sql = "INSERT INTO users (`first_name`, `last_name`, `adress`, `password`, `e-mail`, `confirm_mail`, `phone`) VALUES ('".$_POST['first_name']."', '".$_POST['last_name']."', '".$_POST['adress']."','".$password."', '".$_POST['email']."', '$u_code', '".$_POST['phone']."')";

  if ($conn->query($sql)) {
    ?>
    <script type="text/javascript">  alert("Вы успешно зарегистрированы! Подтвердите свою електронную почту."); </script>
    
    <?php
    $link = "<a href='http://voila.local/verified.php?u_code=$u_code'>Confirm</a>";
    $header = "voila.local/register.php?u_code=".$u_code."";
    mail($_POST['email'],'Registration', $link, $header);
  }
  }
  
}
  function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


/*     Форма регистрации пользователя
1. Сделать форму регистрации
2. Сделать отправку формы
3. Сделат отправку письма со ссылкой на подтверждение регистрации
4. Сделать страницу с подтверждением регистрации
*/

?>


<!-- <!DOCTYPE html>
<html>
<head>
  <title>Registartion</title>
  <meta charset="utf-8" />
    
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width" />

    
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/font-awesome.css" />
    <link rel="stylesheet" href="css/templatemo_style.css" />
    <link rel="stylesheet" href="css/templatemo_misc.css" />
   

</head> -->
<body>
  
    
   <?php
include 'parts/header.php';
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="heading-section1">
        <h2>Введите данные для регистрации</h2>
        <img src="images/under-heading.png" alt="" />
      </div>
    </div>
  </div>
  
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="send-message">
  <div class="form-group">
    <label >Введите имя</label>
    <input type="text" name="first_name" class = "inputs" value="<?php echo $first_name;?>">
    <span class="error">* <?php echo $first_nameErr;?></span>
    <br><br>
  </div>
  <div class="form-group">
    <label >Введите фамилию</label>
    <input type="text" name="last_name" class = "inputs" value="<?php echo $last_name;?>" >
    <span class="error">* <?php echo $last_nameErr;?></span>
    <br><br>
  </div>
  <div class="form-group">
    <label >Введите Ваш adress</label>
    <input type="text" name="adress" class = "inputs" value="<?php echo $adress;?>">
    <span class="error">* <?php echo $adressErr;?></span>
    <br><br>
  </div>
  <div class="form-group">
    <label >Введите Ваш e-mail</label>
    <input type="text" name="email" class = "inputs" value="<?php echo $email;?>">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>
  </div>
  <div class="form-group">
    <label >Введите Ваш телефон</label>
    <input type="text" name="phone" class = "inputs" value="<?php echo $phone;?>">
    <span class="error">* <?php echo $phoneErr;?></span>
    <br><br>
  </div>
  <div class="form-group">
    <label>Введите свой пароль</label>
    <input type="password" name="password" class = "inputs" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" >
    <span class="error">* <?php echo $passwordErr;?></span>
    <label style = "text-align: center; font-style:italic; font-size:12px;">Пароль должен содержать хотя бы одну цифру, одну маленькую букву, одну большую букву и не менее 6 символов</label>
    
    <br><br>
  </div>
  
  <div class = "send">
  <button type="submit" class="mybtn">Зарегистрироваться </button>
  </div>
    <br/>

  <a href="login.php">Войти</a>
</form>
<br/>




</div>

   <?php

include 'parts/footer.php';
?>

