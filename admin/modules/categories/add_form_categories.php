<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
$page = "categories";
// $sql = "DELETE FROM products WHERE products.id = '".$_GET["id"]."'";
// $result = $conn->query($sql);
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';

if(isset($_POST['img'])){
  // $sql = "UPDATE categories SET title = '".$_POST['title']."' WHERE categories.id = '".$_POST['id']."'";
  
  $sql = " INSERT INTO category (cat_title, cat_img) VALUES ('".$_POST['title']."', '".$_POST['img']."') ";
  if($conn->query($sql)) {
    header("Location: /admin/categories.php");
  } 
}

?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/admin/categories.php">Categories</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Categories</li>
        </ol>
    </nav>
    <div class="main-panel">
      <div class="content">
        
          <div class="col-lg-12 col-md-12">
                <form id="form"  method="POST">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Path Image</label>
                        <input type="text" name="img" class="form-control" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" >
                      </div>
                    </div>
                  </div>
                  
                  <div id="card2" class="card-footer">
                    <button type="submit" value="1" class="btn btn-fill btn-success" >Add</button>
                  </div>

                  <!-- <button type="submit" class="btn btn-info btn-fill pull-right" name="add_product">Add</button> -->
                </form>

            
            <a href="../../categories.php"> To Categories </a>
                            
                            
          </div>
          
        </div>
      </div>
      <?php 
  include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
  ?>