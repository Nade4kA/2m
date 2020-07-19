<?php
//echo $_POST['value'];
//echo $_POST['id'];

if (isset($_POST) AND $_SERVER["REQUEST_METHOD"]=="POST") {
	if (isset($_COOKIE['basket'])) {
		$basket = json_decode($_COOKIE['basket'],true);

		for($i=0; $i<count($basket['basket']); $i++) {
			if ($basket['basket'][$i]['product_id']==$_POST['id']) {

				$basket['basket'][$i]['count'] = $_POST['value'];
				//$jsonProduct_number = json_encode($basket['basket'][$i]['count']);
			}
		}

	//преобразуем массив c выбранными товарами в формат JSON 
	$jsonProduct = json_encode($basket);

	setcookie("basket", "", 0, "/");//удаляем куку, если что-то осталось у нас в памяти

	//сохраняем втечение 1 часа куку "basket" хранение товара в корзине, "/" - кука будет доступна на всех страницах сайта
	setcookie("basket", $jsonProduct, time() + 60*60, "/");

	echo $jsonProduct;
	}
}
?>