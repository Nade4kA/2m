<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
$page = "users";
// $sql = "DELETE FROM products WHERE products.id = '".$_GET["id"]."'";
// $result = $conn->query($sql);
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';

if(isset($_POST['first_name'])){
  // $sql = "UPDATE categories SET title = '".$_POST['title']."' WHERE categories.id = '".$_POST['id']."'";
  
  $sql = " INSERT INTO users (first_name, last_name, phone, adress, `e-mail`, verified, admin ) VALUES ('".$_POST['first_name']."', '".$_POST['last_name']."', '".$_POST['phone']."', '".$_POST['adress']."', '".$_POST['e-mail']."', '".$_POST['verified']."', '".$_POST['admin']."') ";
  // var_dump($sql);
  // die();
  if($conn->query($sql)) {
    header("Location: /admin/users.php");
  } 
}

?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/admin/users.php">Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add User</li>
        </ol>
    </nav>
    <div class="main-panel">
      <div class="content">
        
          <div class="col-lg-12 col-md-12">
                <form id="form"  method="POST">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Имя</label>
                        <input type="text" name="first_name" class="form-control" placeholder="Имя" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Фамилия</label>
                        <input type="text" name="last_name" class="form-control" placeholder="Фамилия" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Телефон</label>
                        <input type="text" name="phone" class="form-control" placeholder="Телефон" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Адрес</label>
                        <input type="text" name="adress" class="form-control" placeholder="Адрес" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Почта</label>
                        <input type="text" name="e-mail" class="form-control" placeholder="Почта" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Подтверждение почты</label>
                        <input type="text" name="verified" class="form-control" placeholder="0" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Админ</label>
                        <input type="text" name="admin" class="form-control" placeholder="0" >
                      </div>
                    </div>
                  </div>
                  
                  <div id="card2" class="card-footer">
                    <button type="submit" value="1" class="btn btn-fill btn-success" >Add</button>
                  </div>

                  <!-- <button type="submit" class="btn btn-info btn-fill pull-right" name="add_product">Add</button> -->
                </form>

            
            <a href="../../users.php"> To Users </a>
                            
                            
          </div>
          
        </div>
      </div>
      <?php 
  include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
  ?>