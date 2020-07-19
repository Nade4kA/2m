<?php
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php'; //поключаем БД к странице
//получаем при помощи sql запроса товар, по которому кликнул пользователь -переменная $product
	$sql = "SELECT * FROM items WHERE item_id = ".$_POST['id'];
	$result = $conn->query($sql);
	$product = mysqli_fetch_assoc($result);

if (isset($_POST) AND $_SERVER["REQUEST_METHOD"]=="POST") {
	if (isset($_COOKIE['basket'])) {
		$basket = json_decode($_COOKIE['basket'],true);

		for($i=0; $i<count($basket['basket']); $i++) {
			if ($basket['basket'][$i]['product_id']==$_POST['id']) {

				$basket['basket'][$i]['count'] = $_POST['value'];
				
				$product_cost = $basket['basket'][$i]['count']*$product['cost'];
			}
		}

	//преобразуем массив c выбранными товарами в формат JSON 
	//$jsonProduct = json_encode($basket);

	echo $product_cost;
	}
}
?>