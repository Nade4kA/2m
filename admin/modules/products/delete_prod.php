<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
$page = "products";

echo "<h2>Product ID:".$_GET["id"]." Deleted!</h2>";

$sql = "DELETE FROM items WHERE items.item_id = '".$_GET["id"]."'";
$result = $conn->query($sql);

header("Location: ../../products.php");
//include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';
?>
<!--
    <div class="main-panel">
      <div class="content">
        
          <div class="col-lg-12 col-md-12"> -->
            <!-- вставка ссылки для возврата на страницу продукты-->
           <!--   <a href="../../products.php"> To Products </a>
          </div>
        </div>
      </div>-->
      <?php 
 //include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
  ?>