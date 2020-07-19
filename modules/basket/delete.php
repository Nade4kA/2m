<?php
/*
1. Добавить кнопку для удаления товаров
2. Пройти по всему массиву товаров
3. Проверить id товара и удалить товар
*/

if (isset($_POST) AND $_SERVER["REQUEST_METHOD"]=="POST") {
	if (isset($_COOKIE['basket'])) {
		$basket = json_decode($_COOKIE['basket'],true);

		for($i=0; $i<count($basket['basket']); $i++) {
			if ($basket['basket'][$i]['product_id']==$_POST['id']) {
				unset($basket['basket'][$i]);
				sort($basket['basket']);
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