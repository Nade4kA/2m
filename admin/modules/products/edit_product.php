<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
// include '../../configs/db.php';
$page = "products";

// var_dump($_GET);
// die();

echo "<h2> Product ID: ".$_GET["id"]." Edited! </h2>";
// $sql = "UPDATE `items` SET `item_title` = 'вареник55', `description` = 'С сиром55', `ves` = '12355', `cost` = '1255', `item_img` = 'ррр.jpg55' WHERE `items`.`item_id` = 156;"
$sql = "UPDATE items SET item_title = '".$_GET["title"]."', description = '".$_GET["description"]."',  category_id = '".$_GET["category_id"]."', ves = '".$_GET["ves"]."', cost = '".$_GET["cost"]."', item_img = '".$_GET["img"]."' WHERE items.item_id = '".$_GET["id"]."'";
// $sql = "INSERT INTO products (title, description, content, category_id) VALUES ('".$_GET["title"]."', '".$_GET["description"]."', '".$_GET["content"]."', '".$_GET["category_id"]."')";
// $sql = "DELETE FROM products WHERE products.id = '".$_GET["id"]."'";
$result = $conn->query($sql);

// $sql = "SELECT * FROM items WHERE id = '".$_GET["id"]."'";
// $result = $conn->query($sql);
// $edit_product = mysqli_fetch_assoc($result);

header("Location: ../../products.php");
//include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';
?>

    <!-- <div class="main-panel">
      <div class="content">
        
          <div class="col-lg-12 col-md-12">-->
            <!-- вставка ссылки для возврата на страницу продукты-->
                 
           <!--  <a href="../../products.php"> To Products </a>

          </div>
        </div>
      </div>-->
      <?php 
// include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
  ?>