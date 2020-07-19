<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
$page = "categories";

$sql = "DELETE FROM users WHERE users.id = '".$_GET["id"]."'";

if ($conn->query($sql)) {
  header("Location: /admin/users.php");
}
