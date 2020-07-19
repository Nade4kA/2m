<!DOCTYPE html>
<html class="no-js"> 
<head>
    <meta charset="utf-8">
    <title>Voila</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

     <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/templatemo_style.css">
    <link rel="stylesheet" href="css/templatemo_misc.css">
    <link rel="shortcut icon" type="image/png" href="images/voila.png"/>
   
</head>

<body>
    
    <header>  
        <div id="top-header">

            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        
                    </div>
                    
                    <div class="col-md-6">
                        <div class="home-account">
                            <?php
                                if (isset($_COOKIE["user_id"])) {
                                    $sql_id = "SELECT * FROM users WHERE id = ".$_COOKIE["user_id"]."";
                                    $result_id = mysqli_query($conn,$sql_id);
                                    $user = mysqli_fetch_assoc ($result_id);
                                    if($user["admin"] == 1 ) {
                                    ?>
                                    <span>Admin: &nbsp;<?php echo $user["first_name"]?>&nbsp; &nbsp;</span> 
                                     
                                    <a href="http://voila.local/admin/index.php"><span> <img src="images/admin.png"></span> Админ-панель&nbsp;</a>
                                    <a href="exit.php"><span> <img src="images/enterexit1.png"></span> Выйти</a>
                                    <?php
                                    } else {
                                    ?>
                                    <span>Рады Вам, &nbsp;<?php echo $user["first_name"]?>, готовы принять Ваш заказ! &nbsp; &nbsp;</span> 
                                     
                                    <a href="exit.php"><span> <img src="images/enterexit1.png"></span> Выйти</a>
                                    <?php 
                                    }
                                    ?>
                                    <?php
                                } else {
                                    ?>

                                    <a href="login.php"><span> <img src="images/man1.png"> &nbsp;</span>Войти</a>
                                    <?php
                                }
                                    ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>  

        <div id="main-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="#"><img id = "logo" src="images/voila.png" title="" alt="" ></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="main-menu">
                            <ul>
                                <li><a href="index.php">Главная</a></li>
                                <li><a href="about-us.php">О нас</a></li>
                                <li><a href="products.php">Меню</a></li>
                                <li><a href="contact-us.php">Контакты</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="search-box">  
                            <form method="post" action="products.php">                        
                                <input id="search" name="search" type="text" />
                                <input type="submit" id="search-button" />
                            </form>
                        </div>
                    </div>
                    <a href = "/basket.php"> 
                        <span id = "num_basket">
                                <?php
                            //если существует $_COOKIE['basket']), то
                            if (isset($_COOKIE['basket'])) {
                             //выводим количество элементов в куке
                              $basket = json_decode($_COOKIE['basket'], true);
                              echo count($basket['basket']);
                            } else {
                                //иначе выводим "0"
                                echo " 0";
                            } ?>
                            
                        </span>
                      <img id = "basket_img" src="images/cart.png">
                    </a> 
                </div>
            </div>
        </div>
    </header>