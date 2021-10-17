<?php
if(!isset($_SERVER['HTTP_REFERER'])){
  // redirect them to your desired location
  // header('location: ./auth/login_form.php');
  echo " access permission";
  exit;
}
require_once './../../db/hang_hoa.php';
require_once './../../db/khach_hang.php';
require_once './../../db/slide_conn.php';
require_once './../../db/loai.php';
require_once './../../db/binh_luan.php';
session_start();
$products = getAllProducts();
$users = getAllUsers();
$sliders = getAllSliders();
$types = getAllTypes();
$comments = getAllComments();
$productsQuantity = count($products);
$usersQuantity = count($users);
$slidersQuantity = count($sliders);
$typesQuantity = count($types);
$commentsQuantity = count($comments);


?>

    <?php 
        $page_title = "Dashboard";
        include 'dash_header.php'; 
    ?>

    <!-- dashboard contents -->
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-lg-3 col-md-3 mb-4">
                <div class="card card-border">
                    <div class="card-body">
                        <h4 class="card-title"> <?php echo $productsQuantity;   ?> <small class="text-muted">Sản phẩm</small></h4>
                    </div>
                    <div class="list-group list-group-flush">
                        <a href="./../products/products.php" class="list-group-item list-group-item-primary">Xem tất cả</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="card card-border">
                    <div class="card-body">
                        <h4 class="card-title"> <?php echo $typesQuantity;   ?> <small class="text-muted">Loại hàng</small></h4>
                    </div>
                    <div class="list-group list-group-flush">
                        <a href="./../category/category_page.php" class="list-group-item list-group-item-primary">Xem tất cả</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="card card-border">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $usersQuantity;   ?> <small class="text-muted">Khách hàng</small></h4>
                    </div>
                    <div class="list-group list-group-flush">
                        <a href="./../users/users.php" class="list-group-item list-group-item-primary">Xem tất cả</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="card card-border">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $commentsQuantity;   ?> <small class="text-muted">Bình luận</small></h4>
                    </div>
                    <div class="list-group list-group-flush">
                        <a href="./../comments/comments_page.php" class="list-group-item list-group-item-primary">Xem tất cả</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="card card-border">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $slidersQuantity;   ?> <small class="text-muted">Sliders</small></h4>
                    </div>
                    <div class="list-group list-group-flush">
                        <a href="./../slides/slider.php" class="list-group-item list-group-item-primary">Xem tất cả</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- dashboard contents -->
    
    <!-- footer -->
    <?php 
        include 'dash_footer.php'; 
    ?>