<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

$sql = "SELECT * FROM items WHERE item_id = '".$_GET["id"]."'";
$result = $conn->query($sql);
$edit_product = mysqli_fetch_assoc($result);
// var_dump($edit_product);
$page = "products";
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php'; 
?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/admin/products.php">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Products</li>
        </ol>
    </nav>
    <div class="main-panel">
      <div class="content">
        
          <div class="col-lg-12 col-md-12">
            <!-- вставка формы для редактирования продуктов-->
                        
            <form id="form" action="http://voila.local/admin/modules/products/edit_product.php" method="GET">
                  <input type="hidden" name="id" value="<?php echo $_GET["id"];?>" >
                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="<?php echo$edit_product["item_title"];?>" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control" value="<?php echo$edit_product["description"];?>">
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category_id" >
                          <option value="<?php echo$edit_product["category_id"];?>"> Не менять </option>
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
                    <div class="col-md-8">
                      <div class="form-group">
                        <label>Ves</label>
                        <textarea rows="4" cols="80" name="ves" class="form-control" ><?php echo$edit_product["ves"];?></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label>Content</label>
                        <textarea rows="4" cols="80" name="cost" class="form-control" ><?php echo$edit_product["cost"];?></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label>Content</label>
                        <textarea rows="4" cols="80" name="img" class="form-control" ><?php echo$edit_product["item_img"];?></textarea>
                      </div>
                    </div>
                  </div>

                  <div id="card2" class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary" >Edit</button>
                  </div>

                  <!-- <button type="submit" class="btn btn-info btn-fill pull-right" name="add_product">Add</button> -->
                </form>    


            <div><a href="../../products.php">To Products</a> </div>
            

          </div>
        </div>
      </div>
      <?php 
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
  ?>