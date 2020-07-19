<?php
include 'configs/db.php';
include 'parts/header.php';
?>

<div id="heading">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-content">
                    <h2>Контакты</h2>
                    <span><a href="/">Главная</a> / Контакты</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="heading-section">
                <h2>Как с нами связаться</h2>
                <img src="images/under-heading.png" alt="" >
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12 ">
            <p class = "about_us_p">  <b>VoiLa&#x301</b> предоставляет услуги кейтеринга по Украине. Наши блюда удивят Вас вкусом и ароматом. Связаться с нами можно по телефону или оставить заявку на сайте. </p>
            
        </div>                    
    </div>

    <div class="container">   
        <div class="main-footer">
            <div class="row"> 

                <div class="col">
                    <div class="more-info">
                        <h4 class="footer-title">Контактные данные</h4>
                        <ul>
                            <li><i class="fa fa-phone"></i>+38066 0880888</li>
                            <li><i class="fa fa-globe"></i>г. Винница, ул. Пирогова, 24Б</li>
                            <li><i class="fa fa-envelope"></i><a href="#">info@voila.com</a></li>
                            <li>Режим работы: ежедневно с 10:00 до 22:00</li>
                        </ul>
                    </div>
                </div>

                <div class="col-6">
                    <h4 class = "footer-title">ОСТАВИТЬ ЗАЯВКУ</h4>
                    <form action="modules/telegram/callme.php" method="POST" name="leave-comment">
                        <div class="row">
                            <div class="name col-md-5">
                                <input type="text" name="name" id="name" placeholder="Имя" />
                            </div>
                            <div class="email col-md-5">
                                <input type="text" name="phone" id="email" placeholder="Телефон" />
                            </div>
                        </div>                             
                        <div class="send">
                            <button name = "submit" type="submit" class = "mybtn">Перезвонить мне</button>
                        </div>
                    </form>
                </div>  



            </div>
        </div> 
    </div>       
        
    
<div>
