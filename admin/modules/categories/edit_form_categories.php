<?php
include $_SERVER['DOCUMENT_ROOT'] .'/configs/db.php';

$sql = "SELECT * FROM category WHERE cat_id = '".$_GET["id"]."'";
$result = $conn->query($sql);
$edit_category = mysqli_fetch_assoc($result);

$page = "categories";

include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php'; 

if(isset($_POST['id'])){
  $sql = "UPDATE category SET cat_title = '".$_POST['title']."', cat_img = '".$_POST['img']."' WHERE category.cat_id = '".$_POST['id']."'";
  // $sql = " INSERT INTO categories (id, title) VALUES ('".$POST['id']."', '".$POST['title']."') ";
  if($conn->query($sql)) {
    header("Location: /admin/categories.php");
  } 
}

?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/admin/categories.php">Categories</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
        </ol>
    </nav>
    <div class="main-panel">
      <div class="content">
        
          <div class="col-lg-12 col-md-12">
            <!-- вставка формы для редактирования категорий-->
                        
            <form id="form" method="POST">
                  
                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Id</label>
                        <input type="text" name="id" class="form-control" value="<?php echo $_GET["id"];?>" >
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="<?php echo$edit_category["cat_title"];?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="img" class="form-control" value="<?php echo$edit_category["cat_img"];?>">
                      </div>
                    </div>
                  </div>
                  
                  <div id="card2" class="card-footer">
                    <button type="submit" value="1" class="btn btn-fill btn-primary" >Save</button>
                  </div>

                  <!-- <button type="submit" class="btn btn-info btn-fill pull-right" name="add_product">Add</button> -->
                </form>    


            <div><a href="../../categories.php">To Categories</a> </div>
            

          </div>
        </div>
      </div>
      <?php 
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
  ?>