<!---------------Карточка товара----- --> 

 <div class="col-md-4">
    <div class="product-wrap">
      <div class="product-item">
        <img src="<?php  echo $row['item_img'] ?>">
        <div class="product-buttons">
          <a class="button" onclick = "AddToBasket(this)" data-id = "<?php echo $row["item_id"]?>">В корзину</a>
        </div>
      </div>
      <div class="product-title">
        <a href = "/item.php?item_id=<?php echo $row['item_id']; ?>"><?php  echo $row['item_title'] ?></a>
        <span class="product-price">₴ <?php  echo $row['cost'] ?></span>
      </div>
    </div>
</div>