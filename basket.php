<?php
// podklyucit configs/db.php
include 'configs/db.php';
// podklyucit parts/header.php
include 'parts/header.php';



      if (isset($_COOKIE["user_id"])) {
        $sql_user = "SELECT * FROM users WHERE id = ".$_COOKIE["user_id"]." ";
        $result = $conn->query($sql_user);
        $user_user = mysqli_fetch_assoc($result);
      } 


?>

<div id="heading">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-content">
                    <h2>Корзина</h2>
                    <span><a href="/">Главная</a> / Корзина</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div>
  <br>
  <br>
</div>

<div class="col-10 mx-auto ">  
  <table class="table table-striped table-warning">
    <thead class="thead-light">
      <tr>
        <th scope="col" class = "zagolovok">#</th>
        <th scope="col" class = "zagolovok">Нименование</th>
        <th scope="col" class = "zagolovok">Вес/Объём</th>
         <th scope="col" class = "zagolovok">Цена,грн</th>
        <th scope="col" class = "zagolovok">Количество</th>
        <th scope="col" class = "zagolovok">Стоимость,грн</th>
        <th scope="col" class = "zagolovok">Опции</th>
      </tr>
    </thead>
    <tbody>
    <?php
      //если существует кука $_COOKIE['basket']) 
      if (isset($_COOKIE['basket'])) {
            //декодируем куку в формат json и записываем в переменную $basket
            $basket = json_decode($_COOKIE['basket'], true);


            //пока i от 0 до количества элементов в массиве $basket
            for ($i=0; $i< count($basket['basket']); $i++) {

                  //делаем запрос на выборку из БД всех продуктов с id= id товара в корзине
                  $sql = "SELECT * FROM items WHERE item_id=".$basket['basket'][$i]['product_id'];
                  //выполняем запрос и результат записываем в переменную $product
                  $result = $conn->query($sql);
                  $product = mysqli_fetch_assoc($result);
                  ?>

                  <tr>
                        <th scope="row"><?php echo $product['item_id']?></th>
                        <td><?php echo $product['item_title']?></td>
                        <td><?php echo $product['ves']?></td>
                        <td><?php echo $product['cost']?></td>
                        <td><input type = "text" name = "count" value = "<?php echo $basket['basket'][$i]['count'];?>" oninput = "changeCountProduct(this.value, <?php echo $product['item_id'] ?>)" class = "count_input"></td>
                         <td id = "cost_<?php echo $product['item_id'] ?>">

                          <?php 
                          //если один товар в корзине, то стоимость берем из БД - колонка cost

                          //if ($basket['basket'][$i]['count'] == 1) {
                            //echo $product['cost'];
                         // } else {
                            //иначе подсчитываем стоимость исходя из введённого количества и стоимости единицы товара
                            echo ($basket['basket'][$i]['count']*$product['cost']);
                         // }
                          

                          ?> </td>
                        <td><button onclick = "deleteProductBasket(this, <?php echo $product['item_id'] ?>)" class = "btn btn-danger">Delete</button></td>
                  </tr>

                  <?php
                }
                $n = 0;
                for ($i=0; $i< count($basket['basket']); $i++) { 
                  $n = $n + $basket['basket'][$i]['count']*$product['cost'];
                }
          }
    ?>
    </thead>    
   </tbody>
  </table>
  <div id = "total_cost_div"> 
    <label>Общая стоимость заказа:&nbsp; &nbsp;</label>
    <span id = "total_cost"><?php echo $n?></span>
    <label>&nbsp;грн</label>
  </div>
</div>

<?php 
if (isset($_COOKIE['basket'])) { 

  if (isset($_COOKIE["user_id"])) {
        $sql_user = "SELECT * FROM users WHERE id = ".$_COOKIE["user_id"]." ";
        $result = $conn->query($sql_user);
        $user_user = mysqli_fetch_assoc($result);
      } 
?>

<form method="POST" class="send-message" action = "modules/basket/order.php">
  <div class="heading-section1">
        <h2>ОФОРМЛЕНИЕ ЗАКАЗА</h2>
        <img src="images/under-heading.png" alt="" />
  </div>
  <div class="form-group">
    <label >Введите имя</label>
    <input type="text" name="first_name" class = "inputs" value = "<?php if (isset($_COOKIE["user_id"])) { echo $user_user['first_name'];} ?>">
  </div>
  <div class="form-group">
    <label >Введите фамилию</label>
    <input type="text" name="last_name" class = "inputs" value = "<?php if (isset($_COOKIE["user_id"])) { echo $user_user['last_name'];} ?>">
  </div>
  <div class="form-group">
    <label >Введите Ваш e-mail</label>
    <input type="text" name="email" class = "inputs" value = "<?php if (isset($_COOKIE["user_id"])) { echo $user_user['e-mail'];} ?>">
  </div>
  <div class="form-group">
    <label >Введите Ваш телефон</label>
    <input type="text" name="phone" class = "inputs" value = "<?php if (isset($_COOKIE["user_id"])) { echo $user_user['phone'];} ?>">
  </div>
  <div class="form-group">
    <label>Введите Ваш адрес</label>
    <input text="text" name="adress" class ="inputs" value = "<?php if (isset($_COOKIE["user_id"])) { echo $user_user['adress'];} ?>">
  </div>
  <div >
    <label>Комментарии к заказу</label>
    <textarea text="text" name="comments" class ="form-control"></textarea>
  </div>
  
  <div class = "send">
  <button type="submit" name="submit" class="mybtn" >Оформить заказ</button>
  <br/>

  <?php
      if (isset($_COOKIE["user_id"])) {
      } else {
        ?>
        <a href="login.php" id = "enterbtn"> Войти в аккаунт </a>
        <?php
      }
        ?>
  </div>
   
</form>

  <?php  }

?>


<?php
// podklyucit parts/footer.php
include 'parts/footer.php';
?>

