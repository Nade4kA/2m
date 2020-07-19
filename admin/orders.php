<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
// переменная для идентификации страницы
$page = "orders";
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';
?>
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/admin/orders.php">Orders</a></li>
            <!-- <li class="breadcrumb-item active" aria-current="page">gggggghjkk</li> -->
        </ol>
    </nav>

    <div class="main-panel">
      <div class="content">
        
          <div class="col-lg-12 col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title"> Orders </h4>
                <div></div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                      <tr>
                        <th>  # </th>
                        <th> user Id  </th>
                        <th> Items </th>
                        <th> Time </th>
                        <th class="text-center"> Adress </th>
                        <th> Phone </th>
                        <th class="text-center"> Status </th>
                        <th class="text-center"> Comment </th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    //делаем запрос на получение всех продуктов
                      $sql = "SELECT * FROM orders";
                      $result = $conn->query($sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                        // var_dump($row);  
                        ?>
                      <tr>
                        <td> <?php echo $row['order_id']?></td>
                        <td> <?php echo $row['user_id']?></td>
                        <td class="text-center"> <?php
                        $products = json_decode($row['items'], true);
                        // $s = count($products['basket']);
                        // var_dump($s);
                        

                        for($i=0; $i<count($products['basket']); $i++){

                          $sql2 = "SELECT * FROM items WHERE item_id=".$products['basket'][$i]['product_id']."";
                          // var_dump($sql2);
                          // die();
                          $result2 = $conn->query($sql2);
                          $row2 = mysqli_fetch_assoc($result2);
                          // var_dump($row2["title"]);

                          echo "Product: ".$row2["item_title"]." ";
                          echo "- count: ".$products['basket'][$i]['count']." <br/>";
                        }
                        // echo  $products = json_decode($row['products'], true);
                         
                         ?></td>
                         
                        <td> <?php echo $row['time']?></td>
                        <td class="text-center"> <?php echo $row['adress']?></td>
                        
                        <td class="text-center"> <?php echo $row['phone']?></td>
                        <td class="text-center">
                          <select class = "form-control" name = "status" onchange="changeStatus(this.options[this.selectedIndex].value, <?php echo $row['status_id'] ?>)">
                                <?php 
                                    $sql_s = "SELECT * FROM status";
                                    $result_s = $conn->query($sql_s);
                                    
                                    while ($row_s = mysqli_fetch_assoc($result_s)) {
                                        if ($row['status_id'] == $row_s['status_id']) {
                                        echo "<option value = '".$row_s["status_id"]."' selected = \"selected\" > ".$row_s["status_title"]."</option>";
                                        } else {
                                           echo "<option value = '".$row_s["status_id"]."'> ".$row_s["status_title"]."</option>"; 
                                        }
                                    } 
                                ?>
                            </select>



                         <?php //echo $row['status_id']?></td>
                        <td class="text-center"> <?php echo $row['comment']?></td>
                        
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
      <div> <?php echo $_SERVER['DOCUMENT_ROOT']?></div>
      
  <?php 
  include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
  ?>