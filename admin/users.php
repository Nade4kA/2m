<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
// переменная для идентификации страницы
$page = "categories";
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';
?>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/admin/categories.php">Users</a></li>
        </ol>

    <div class="main-panel">
      <div class="content">
        
          <div class="col-lg-12 col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title"> Users </h4>
                <div><a href="modules/users/add_form_user.php"> Add user</a> </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                      <tr>
                        <th>  Id </th>
                        <th> Имя </th>
                        <th> Фамилия </th>
                        <th> Телефон </th>
                        <th> Адрес </th>
                        <th> Почта </th>
                        <th> Подтвержден </th>
                        <th> Админ </th>
                        <th> Опции </th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    //делаем запрос на получение всех продуктов
                      $sql = "SELECT * FROM users";
                      $result = $conn->query($sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                        // var_dump($row);  
                        ?>
                      <tr>
                        <td> <?php echo $row['id']?></td>
                        <td> <?php echo $row['first_name']?></td>
                        <td> <?php echo $row['last_name']?></td>
                        <td> <?php echo $row['phone']?></td>
                        <td> <?php echo $row['adress']?></td>
                        <td> <?php echo $row['e-mail']?></td>
                        <td> <?php echo $row['verified']?></td>
                        <td> <?php echo $row['admin']?></td>
                        
                        <td>
                          <a href="modules/users/edit_form_user.php?id=<?php echo $row['id']?>" type="button" class="btn btn-primary btn-sm">Edit</a>
                          <a href="modules/users/delete_user.php?id=<?php echo $row['id']?>"type="button" class="btn btn-secondary btn-sm">Delete</a>
                        </td>
                      </tr>
                        <?php

                      }
                      
                    ?>
                     
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      
  <?php 
  include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
  ?>