<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
$page = "products";
// $sql = "DELETE FROM products WHERE products.id = '".$_GET["id"]."'";
// $result = $conn->query($sql);
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';
?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/admin/products.php">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Products</li>
        </ol>
    </nav>
    <div class="main-panel">
      <div class="content">
        
          <div class="col-lg-12 col-md-12">
                <form id="form" action="http://voila.local/admin/modules/products/add_product.php" method="GET">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" >
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control" >
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category_id" >
                          <option value="0"> Не вибрано </option>
                            <?php
                              $sql = "SELECT * FROM category";
                              $result = $conn->query($sql);
                              while ($row = mysqli_fetch_assoc($result)) {
                                echo"<option value='".$row['cat_id']."'>".$row[cat_title]."</option>";
                              }
                            
                            ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Weight</label>
                        <input type="text" name="ves" class="form-control" >
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Cost</label>
                        <input type="text" name="cost" class="form-control" >
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Image</label>
                        <input type="text" name="item_img" class="form-control" >
                      </div>
                    </div>
                  </div>

                  <div id="card2" class="card-footer">
                    <button type="submit" value="1" class="btn btn-fill btn-success" >Add</button>
                  </div>

                  <!-- <button type="submit" class="btn btn-info btn-fill pull-right" name="add_product">Add</button> -->
                </form>

            
            <a href="../../products.php"> To Products </a>
                            
                            
          </div>
          
        </div>
      </div>
      <?php 
  include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
  ?>