<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
// переменная для идентификации страницы
$page = "products";
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';
?>
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/admin/products.php">Products</a></li>
            <!-- <li class="breadcrumb-item active" aria-current="page">gggggghjkk</li> -->
        </ol>
    </nav>

    <div class="main-panel">
      <div class="content">
        
          <div class="col-lg-12 col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title"> Products </h4>
                <div><a href="modules/products/add_form.php"> Add product</a> </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                      <tr>
                        <th >  id </th>
                        <th > Item</th>
                        <th > Discription </th>
                        <th class="text-center"> Category </th>
                        <th class="text-center"> Ves </th>
                        <th class="text-center"> Cost </th>

                        <th> Options </th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    //делаем запрос на получение всех продуктов
                      $sql = "SELECT * FROM items";
                      $result = $conn->query($sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                        // var_dump($row);  
                        ?>
                      <tr>
                        <td> <?php echo $row['item_id']?></td>
                        <td> <?php echo $row['item_title']?></td>
                        <td> <?php echo $row['description']?></td>
                        <td class="text-center"> <?php echo $row['category_id']?></td>
                        <td class="text-center"> <?php echo $row['ves']?></td>
                        <td class="text-center"> <?php echo $row['cost']?></td>

                        <td>
                          <a href="modules/products/edit_form_prod.php?id=<?php echo $row['item_id']?>" type="button" class="btn btn-primary btn-sm">Edit</a>
                          <a href="modules/products/delete_prod.php?id=<?php echo $row['item_id']?>"type="button" class="btn btn-secondary btn-sm">Delete</a>
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