<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
// переменная для идентификации страницы
$page = "categories";
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';
?>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/admin/categories.php">Categories</a></li>
        </ol>

    <div class="main-panel">
      <div class="content">
        
          <div class="col-lg-12 col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title"> Categories </h4>
                <div><a href="modules/categories/add_form_categories.php"> Add category</a> </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                      <tr>
                        <th>  Id </th>
                        <th> Title </th>
                        <th> Image </th>
                        <th> Option </th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    //делаем запрос на получение всех продуктов
                      $sql = "SELECT * FROM category";
                      $result = $conn->query($sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                        // var_dump($row);  
                        ?>
                      <tr>
                        <td> <?php echo $row['cat_id']?></td>
                        <td> <?php echo $row['cat_title']?></td>
                        <td> <?php echo $row['cat_img']?></td>
                        <td>
                          <a href="modules/categories/edit_form_categories.php?id=<?php echo $row['cat_id']?>" type="button" class="btn btn-primary btn-sm">Edit</a>
                          <a href="modules/categories/delete_categories.php?id=<?php echo $row['cat_id']?>"type="button" class="btn btn-secondary btn-sm">Delete</a>
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