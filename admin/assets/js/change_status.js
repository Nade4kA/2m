var siteURL = "http://voila.local/"; //создаём переменную с адресом нашего сайта, его главной страницы

function changeStatus(val, id) {
	console.dir ('Status changed!');
	console.dir (val);
	console.dir(id);
	
	//создаём ajax - запрос на добавление в корзину продукта
	var ajax = new XMLHttpRequest();

	//формируем данные для отправки в ajax запрос
	var dannie = "id=" + id +
					"&value=" + val;

	console.dir(dannie);
		
	ajax.open("POST", "http://voila.local/admin/modules/orders/change_status_order.php",false);
	ajax.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	ajax.send(dannie); //при отправлении ajax - запроса передаём id выбранного пользователем товара
	console.dir(ajax.response);
}