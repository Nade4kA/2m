<?php
/*-------------Страница продукта--------------*/
	include 'configs/db.php'; //подключаем БД к странице
	include 'parts/header.php';//подключаем файл с верхушкой сайта
	
	//прописываем запрос SQL на выборку продукта в БД с id, равным выбранному пользователем
	$sql = "SELECT * FROM items WHERE item_id = ".$_GET['item_id'];
	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);//результат запроса заносим в переменную $row

	//выбираем категорию товара, выбранного пользователем
	$category_result = $conn->query( 'SELECT * FROM category WHERE cat_id = '.$row['category_id'] ); 
	$category = mysqli_fetch_assoc( $category_result );
?>

<!-- Блок с названием страницы и хлебными крошками -->
<div id="heading">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-content">
                    <h2>НАШЕ МЕНЮ</h2>
                    <span><a href="/"> Главная </a> / <a href="/products.php">МЕНЮ</a> / <a href="/cat.php?cat_id=<?php echo $category['cat_id'] ?>"> <?php echo $category['cat_title']?></a> </span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
	  <div class="heading-section1">
	    <h2><?php echo $row['item_title']?></h2>
	    <img src="images/under-heading.png" alt="" />
	  </div>
	</div>

	<div class = "item_about col-md-5">
		
	   	<div class="product-wrap">
		<div class="product-item">
	        <img src="<?php  echo $row['item_img'] ?>">
	        <div class="product-buttons">
	          	<a class="button" onclick = "AddToBasket(this)" data-id = "<?php echo $row["item_id"]?>">В корзину</a>
	        </div>
	    </div>
		</div>
		
		
		<p class = "item_description"> <?php echo $row['description']?> </p> <br>
		<p class = "item_ves"> Вес/объём: <?php echo $row['ves']?> </p><br>
		<span class="product-price">₴ <?php  echo $row['cost'] ?></span>
	</div>
	
</div>		
     

<?php
	include 'parts/footer.php'; //подключаем футер к странице
?>

