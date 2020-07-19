<!----Навигация по категориям---->

<div class="row">
    <div class="filters col-md-12 col-xs-12">
        <ul id="filters" class="clearfix">
            <li><span class="filter" data-filter="all" 
              <?php if (!isset($_GET['cat_id'])) { 
                echo "style=\"background-color: #ff98007d\"";} ?> > <a href="/products.php">Все</a></span></li>
              <?php

                include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';  //подключаем БД
                $sql = "SELECT * FROM category"; //делаем запрос в БД на вывод всех категорий
                $result = $conn->query($sql); //записываем результат запроса в переменную $result

                //выводим список категорий
                while ($row = mysqli_fetch_assoc($result)) {

                  //если существует выбранная и выбранная=той, что выводим
                  if (isset($_GET['cat_id']) && $_GET['cat_id'] == $row['cat_id']) {
                    //выводим активную ссылку на эту категорию ?>
                    <li ><span class="filter" data-filter=".ginger" style="background-color: #ff98007d"> <a href="/cat.php?cat_id=<?php echo $row['cat_id']?>"> <?php echo $row['cat_title']?> </a> </span></li>
                   <?php
                  } else { 
                    //выводим неактивную ссылку на эту категорию ?>
                    <li ><span class="filter" data-filter=".ginger"> <a href="/cat.php?cat_id=<?php echo $row['cat_id'] ?>"> <?php echo $row['cat_title']?> </a></span></li>
                  <?php
                  }
                }
              ?>
        </ul>
    </div>
</div>