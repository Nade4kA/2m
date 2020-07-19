<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
$page = "categories";

$sql = "DELETE FROM category WHERE category.cat_id = '".$_GET["id"]."'";

if ($conn->query($sql)) {
  header("Location: /admin/categories.php");
}
