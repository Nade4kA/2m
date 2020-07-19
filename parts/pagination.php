<!---------------Блок постраничной навигации----- -->

<div class="pagination">
    <div class="row">   
        <div class="col-md-12">
            <ul>

             <?php 
                //определяем номер страницы (выбранная или 1-я)
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {$page=1;}

                $limit = 6;//переменная с максимальным количеством товаров на странице

                //определеяем количество продуктов в базе  - переменная $n_c
                $sql = "SELECT * FROM items";
                $result_c = $conn->query($sql);
                $n_c = mysqli_num_rows($result_c);

                //определяем количество страниц, необходимых для выведения товаров - переменная $n_pages
                $n_pages = ceil($n_c/$limit);

                if ($page!=1) { ?>

                <li>
                    <a href="<?php if ($page!="1") {echo "page.php?page=";echo ($page-1);}?>" 
            tabindex="-1" aria-disabled="<?php if ($page==1) {echo "true";} else {echo "false";}?>">&laquo;</a>
                </li>

        <?php  }  ?>

            <?php 
            $i=1;
            while ($i<=$n_pages) {
            ?>
                <li >
                    <a <?php if ($i==$page) {echo "style=\"background-color: #f78e21\"";} ?> href="/page.php?page=<?php echo $i ?>"><?php echo $i ?></a>
                </li>
            <?php
                $i=$i+1;
                }

                if ($page!=$n_pages) { ?>

                <li >
                    <a href="<?php if ($page!=$n_pages) {echo "page.php?page=";echo ($page+1);}?>" aria-disabled="<?php if ($page==$n_pages) {echo "true";} else {echo "false";}?>">&raquo;</a>
                </li>
                <?php
            }
            ?>                         
            </ul>
        </div>
    </div>
</div> 