<?php
	include 'configs/db.php'; //подключаем БД
	include 'parts/header.php'; //подключаем файл с шапкой сайта

	$sql = "SELECT * FROM category WHERE cat_id = ".$_GET['cat_id']; //выбираем из БД категорию, выбранную в меню
	$category = mysqli_fetch_assoc( $conn->query($sql) ); //записываем результат запроса в переменную $category

?>
<!-- Блок с названием страницы и хлебными крошками -->
<div id="heading">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-content">
                    <h2>НАШЕ МЕНЮ</h2>
                    <span><a href="/"> Главная </a> / <a href="/products.php">МЕНЮ</a> / <?php echo $category['cat_title']?></span>
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
        <?php include 'parts/cat_nav.php';?>

        <!-- Блок со всеми товарами  -->
        <div class="row" id="Container">
            <div class="row">
                <?php
                    $sql = "SELECT * FROM items WHERE category_id = ".$_GET['cat_id']; //запрос на выборку товаров заданной категории
                    $result = $conn->query($sql);
                    while($row = mysqli_fetch_assoc($result)) { //вывод на странице первых 6 товаров
                        
                    include 'parts/product_card.php';
                    }
                ?>
            </div>
        </div>
    </div>
</div>


<?php

include 'parts/footer.php';
?>



