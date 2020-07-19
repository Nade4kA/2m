<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
$page = "products";

echo "<h2>Product Added!</h2>";
$sql = "INSERT INTO items (item_title, description, category_id, ves, cost, item_img) VALUES ('".$_GET["title"]."', '".$_GET["description"]."',  '".$_GET["category_id"]."', '".$_GET["ves"]."', '".$_GET["cost"]."', '".$_GET["item_img"]."')";
// $sql = "DELETE FROM products WHERE products.id = '".$_GET["id"]."'";
$result = $conn->query($sql);
header("Location: ../../products.php");
//include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';
?>

<!-- <form id="form" action="http://shop-master.local/option/products/add_product.php" method="GET">
								
    Title: <input name="title" >
    Description: <input name="description" > 
    Content: <textarea  name="content"></textarea>
    Category:  <input name="category_id" > 

    
    <button type="submit" name="add_product">Add</button>
</form>

<a href="../../admin/products.php"> <h2>To Products</h2> </a> -->

     <!-- <div class="main-panel">
      <div class="content">
        
          <div class="col-lg-12 col-md-12">-->
            <!-- вставка ссылки для возврата на страницу продукты-->
             
            <!--  <a href="../../products.php"> To Products </a>

          </div>
        </div>
      </div>-->
      <?php 
//include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php'; 
  ?>