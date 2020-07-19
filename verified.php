<?php

include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
include 'parts/header.php';?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="heading-section1">
        <h2>Верификация</h2>
        <img src="images/under-heading.png" alt="" />
      </div>
    </div>
  </div>

<?php

if(isset($_GET['u_code'])) {
    $sql = "SELECT * FROM users WHERE confirm_mail='". $_GET['u_code'] ."' ";
    $result = $conn->query($sql);
    
    if($result->num_rows > 0) {
        $user = mysqli_fetch_assoc($result);
      
        $sql = "UPDATE users SET confirm_mail = '', verified  = '1' WHERE id = ". $user['id'];
        if($conn->query($sql)) {
    ?>

        <h2 class = "centertext">Ваша електронная почта успешно подтвержена!</h2>
        <h4 class = "centertext">Переходите к <a href="login.php">АВТОРИЗАЦИИ</a></h4>

<?php
        }else { ?>

            <h2 class = "centertext">Вам необходимо подтвердить электронную почту!</h2>
     <?php   }
    }
}
 
?>

<br> <br> <br> <br>
<?php 
    include 'parts/footer.php';
?>