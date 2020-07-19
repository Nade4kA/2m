<?php 
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
include $_SERVER['DOCUMENT_ROOT'].'/parts/header.php';

$limit = 6; //обозначаем переменную $limit, максимальное кол-во товаров на главной странице
//определеяем количество продуктов в базе  - переменная $n_c
$sql = "SELECT * FROM items"; //прописываем запрос SQL на выборку всех продутов из БД
$result_c = $conn->query($sql); //выполняем запрос SQL
$n_c = mysqli_num_rows($result_c); //подсчитываем количество строк в результате запроса
//определяем количество страниц, необходимых для выведения товаров - переменная $n_pages
$n_pages = ceil($n_c/$limit);

?>

<!-- Блок с названием страницы и хлебными крошками -->
<div id="heading">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-content">
                    <h2>НАШЕ МЕНЮ</h2>
                    <span> <a href="/">Главная</a> / МЕНЮ</span>
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
                    //поиск продукта 
                    if (isset($_POST['search']) && $_POST['search'] != '') {                                
                        $sql = "SELECT * FROM  items WHERE item_title LIKE '%" . $_POST["search"] . "%' ";
                        $result = $conn->query($sql);
    
                    } else {

                        $sql = "SELECT * FROM items LIMIT $limit"; //запрос на первые 6 товаров из БД
                        $result = $conn->query($sql);
                    }

                    while($row = mysqli_fetch_assoc($result)) { //вывод на странице первых 6 товаров
                        
                    include 'parts/product_card.php';
                    }
                ?>   
            </div>
        </div>

        <?php            
        if ( !isset($_POST['search']) ) {
            include 'parts/pagination.php'; //подключаем файл с блоком постраничного доступа к товарам
        }
        ?>
    </div>
</div>


<?php

include 'parts/footer.php';
?>