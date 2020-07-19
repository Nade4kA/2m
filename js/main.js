var siteURL = "http://voila.local/"; //создаём переменную с адресом нашего сайта, его главной страницы

/*-------функция нажатия на кнопку "Добавить в корзину"---------*/
function AddToBasket(btn) {
	//console.dir(btn.dataset.id); //выведение в консоль id товара, который добавили в корзину

	/* НЕОБХОДИМО:
	1. Сделать аякс запрос на добавление в корзину продукта
	2. Получить данные об успешном добавлении продукта в корзину
	3. Обновить информацию в корзине - в шапке сайта
	*/

	//создаём ajax - запрос на добавление в корзину продукта
	var ajax = new XMLHttpRequest();
		
		ajax.open("POST", siteURL + "/modules/basket/add_basket.php",false);
		ajax.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		ajax.send("id=" + btn.dataset.id); //при отправлении ajax - запроса передаём id выбранного пользователем товара

	var response = JSON.parse(ajax.response); //в переменную response записываем пезультат ajax - запроса в формате JSON

	var btnGoBasket = document.querySelector("#num_basket"); //выбираем тег span в кнопке Корзины
		btnGoBasket.innerText = response['basket'].length; //меняем значение добавленных товаров в корзину
}

/*-------функция обнуления корзины ---------*/
function OrderBasket () {
	var btnGoBasket = document.querySelector("#num_basket"); //выбираем тег с id = num_basket
		btnGoBasket.innerText = "0"; //меняем значение количества добавленных товаров в корзину
}


/*-----------Функция удаление товара из корзины----------*/
function deleteProductBasket (obj, id) {

	//создаём ajax - запрос на удаление из корзины продукта
	var ajax = new XMLHttpRequest();
		
		ajax.open("POST", siteURL + "/modules/basket/delete.php",false);
		ajax.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		ajax.send("id=" + id); //при отправлении ajax - запроса передаём id выбранного пользователем товара

	alert('Product is deleted'); //выводим сообщение, что проудкт удалён
	
	//удалить строку с товаром
	obj.parentNode.parentNode.remove(); //удаление строки с выбранным на удаление товаром из таблицы  корзины
	var response = JSON.parse(ajax.response); //в переменную response записываем пезультат ajax - запроса в формате JSON
	

	var btnGoBasket = document.querySelector("#num_basket"); //выбираем тег с id = num_basket
		btnGoBasket.innerText = response['basket'].length; //меняем значение добавленных товаров в корзину

	//создаём ajax - запрос на изменение общей стоимости покупки
	var ajax1 = new XMLHttpRequest();
		
	ajax1.open("POST", siteURL + "/modules/basket/total_cost.php",false);
	ajax1.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	ajax1.send(); 
	
	//выбираем элемент с общей стоимостью покупки
	var total_cost = document.querySelector("#total_cost");
	//меняем значение ячейки на результат аякс1 запроса
	total_cost.innerText = ajax1.response; 

}

/*-----------Функция изменения количества и стоимости выбранного в корзину товара----------*/
function changeCountProduct(obj, id) {
	
	//создаём ajax - запрос на добавление в корзину продукта
	var ajax = new XMLHttpRequest();

	//формируем данные для отправки в ajax запрос
	var dannie = "id=" + id +
					"&value=" + obj;
		
	ajax.open("POST", siteURL + "/modules/basket/change_number.php",false);
	ajax.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	ajax.send(dannie); //при отправлении ajax - запроса передаём id выбранного пользователем товара

	var ajax1 = new XMLHttpRequest();

	//формируем данные для отправки в ajax1 запрос
	var dannie1 = "id=" + id +
					"&value=" + obj;
		
	ajax1.open("POST", siteURL + "/modules/basket/change_cost.php",false);
	ajax1.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	ajax1.send(dannie1); //при отправлении ajax - запроса передаём id выбранного пользователем товара

	//определяем айди ячейки со стоимостью товара
	var product_id = "#cost_"+id;
	//выбираем элемент с найденным айди
	var productCost = document.querySelector(product_id);
	//меняем значение ячейки на результат аякс1 запроса
	productCost.innerText = ajax1.response; 


	//создаём аякс-запрос на изменение общей стимости покупки
	var ajax2 = new XMLHttpRequest();
		
	ajax2.open("POST", siteURL + "/modules/basket/total_cost.php",false);
	ajax2.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	ajax2.send();
	
	console.dir(ajax2.response);
	//выбираем элемент с общей стоимостью покупки
	var total_cost = document.querySelector("#total_cost");
	//меняем значение ячейки на результат аякс2 запроса
	total_cost.innerText = ajax2.response; 
}