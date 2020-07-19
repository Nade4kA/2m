<?php

include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
// include 'parts/header.php';


if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {

    $sql = "SELECT * FROM users WHERE `e-mail`='".$_POST['email']."'";       
    // $sql = "SELECT * FROM users WHERE email='qwerty@gmail.com'";
    $result = $conn->query($sql);
    $user = mysqli_fetch_assoc($result);
     
       
    $u_code = $user['confirm_mail'];
    $link = "voila.local/register.php?u_code=".$u_code."";
    mail($_POST['email'], 'Register',$link);
    
   
}


    
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width" />

    
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/font-awesome.css" />
    <link rel="stylesheet" href="css/templatemo_style.css" />
    <link rel="stylesheet" href="css/templatemo_misc.css" />
   
</head>
<body>
  
  

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
  <div class="row">
    
        <p id = "ver_title">Вы не подтвердили e-mail! Проверьте почту!</p>
        
    </div>
  </div>
 
  <br/>
    <br/>

  <a href="login.php">Войти</a>
</form>




</div>

   <?php

include 'parts/footer.php';
?>