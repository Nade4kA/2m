<!--Страница товаров при нажатии на кнопку постраничной навигации-->

<?php
	include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php'; //подключаем БД
	include $_SERVER['DOCUMENT_ROOT'].'/parts/header.php'; //подключаем файл с шапкой страницы

	//при сущестовании выбранной страницы, номер страницы=выбранной, иначе - номер страницы=1
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {$page=1;}

	$limit = 6; //переменная с максимальным количеством товаров на странице

	//определеяем количество продуктов в базе  - переменная $n_c
	$sql = "SELECT * FROM items";
	$result_c = $conn->query($sql);
	$n_c = mysqli_num_rows($result_c);

	//определяем количество страниц, необходимых для выведения товаров - переменная $n_pages
	$n_pages = ceil($n_c/$limit);

	$number = $page*$limit - $limit; //начальная строка, номер
?>

<!-- Блок с названием страницы и хлебными крошками -->
<div id="heading">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-content">
                    <h2>НАШЕ МЕНЮ</h2>
                    <span>Главная / <a href="about-us.html">МЕНЮ</a></span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Блок с товарами и постраничной навигацией -->
<div id="products-post">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div id="product-heading">
                    <h2>Выбирай</h2>
                    <img src="images/under-heading.png" alt="" >
                </div>
            </div>
        </div>

        <!-- Блок с меню по категориям -->
        <?php include 'parts/cat_nav.php'?>

        <!-- Блок со всеми товарами  -->
        <div class="row" id="Container">
            <div class="row">
                <?php
                    $sql = "SELECT * FROM items LIMIT $limit OFFSET ".$number; //выбираем из БД 9 товаров, начиная с начальной строки
                    $result = $conn->query($sql);
                    while($row = mysqli_fetch_assoc($result)) { //вывод на странице первых 6 товаров
                     include 'parts/product_card.php';
                    }
                ?>
            </div>
        </div>

                    
        <?php
           include 'parts/pagination.php'; //подключаем файл с блоком постраничного доступа к товарам
        ?>

               


    </div>
</div>


<?php

include 'parts/footer.php';
?>

     

  
