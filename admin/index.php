<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
$page = "home";
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';
?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        </ol>
    </nav>
    <div class="main-panel">
      <div class="content">
        
          <div class="col-lg-12 col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title"> Your admin panel </h4>
              </div>
              
            </div>
          </div>
        </div>
      </div>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
?>