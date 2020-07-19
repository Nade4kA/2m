<?php
include $_SERVER['DOCUMENT_ROOT'] .'/configs/db.php';

$sql = "SELECT * FROM users WHERE id = '".$_GET["id"]."'";
$result = $conn->query($sql);
$edit_user = mysqli_fetch_assoc($result);

$page = "users";

include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php'; 

if(isset($_POST['id'])){
  $sql = "UPDATE users SET first_name = '".$_POST['first_name']."', last_name = '".$_POST['last_name']."', phone = '".$_POST['phone']."', adress = '".$_POST['adress']."', `e-mail` = '".$_POST['e-mail']."', verified = '".$_POST['verified']."', admin = '".$_POST['admin']."' WHERE users.id = '".$_POST['id']."'";
  // $sql = " INSERT INTO categories (id, title) VALUES ('".$POST['id']."', '".$POST['title']."') ";
  if($conn->query($sql)) {
    header("Location: /admin/users.php");
  } 
}

?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/admin/users.php">Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit User</li>
        </ol>
    </nav>
    <div class="main-panel">
      <div class="content">
        
          <div class="col-lg-12 col-md-12">
            <!-- вставка формы для редактирования категорий-->
                        
            <form id="form" method="POST">
                  
                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Id</label>
                        <input type="text" name="id" class="form-control" value="<?php echo $_GET["id"];?>" >
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Имя</label>
                        <input type="text" name="first_name" class="form-control" value="<?php echo$edit_user["first_name"];?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Фамилия</label>
                        <input type="text" name="last_name" class="form-control" value="<?php echo$edit_user["last_name"];?>">
                      </div>
                    </div>
                  </div>
                 
                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Телефон</label>
                        <input type="text" name="phone" class="form-control" value="<?php echo$edit_user["phone"];?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Адрес</label>
                        <input type="text" name="adress" class="form-control" value="<?php echo$edit_user["adress"];?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Почта</label>
                        <input type="text" name="e-mail" class="form-control" value="<?php echo$edit_user["e-mail"];?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Подтверждение почты</label>
                        <input type="text" name="verified" class="form-control" value="<?php echo$edit_user["verified"];?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Статус админ</label>
                        <input type="text" name="admin" class="form-control" value="<?php echo$edit_user["admin"];?>">
                      </div>
                    </div>
                  </div>
                  
                  <div id="card2" class="card-footer">
                    <button type="submit" value="1" class="btn btn-fill btn-primary" >Save</button>
                  </div>

                  <!-- <button type="submit" class="btn btn-info btn-fill pull-right" name="add_product">Add</button> -->
                </form>    


            <div><a href="../../users.php">To Users</a> </div>
            

          </div>
        </div>
      </div>
      <?php 
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
  ?>