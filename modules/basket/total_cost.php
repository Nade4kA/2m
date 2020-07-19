<?php
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php'; //поключаем БД к странице
//получаем при помощи sql запроса товар, по которому кликнул пользователь -переменная $product
	

//if (isset($_POST) AND $_SERVER["REQUEST_METHOD"]=="POST") {
	if (isset($_COOKIE['basket'])) {
		$basket = json_decode($_COOKIE['basket'],true);
		$total_cost = 0;
		for($i=0; $i<count($basket['basket']); $i++) {
			 //делаем запрос на выборку из БД всех продуктов с id= id товара в корзине
		      $sql = "SELECT * FROM items WHERE item_id=".$basket['basket'][$i]['product_id'];
		      //выполняем запрос и результат записываем в переменную $product
		      $result = $conn->query($sql);
		      $product = mysqli_fetch_assoc($result);
			$total_cost = $total_cost + $basket['basket'][$i]['count']*$product['cost']; 

			//if ($basket['basket'][$i]['product_id']==$_POST['id']) {

				//$basket['basket'][$i]['count'] = $_POST['value'];
				
				//$product_cost = $basket['basket'][$i]['count']*$product['cost'];
			}
		//}

	//преобразуем массив c выбранными товарами в формат JSON 
	//$jsonProduct = json_encode($basket);

	echo $total_cost;
	}
//}
?>