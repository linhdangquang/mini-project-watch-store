<?php
require_once './src/db/hang_hoa.php';
require_once './src/db/slide_conn.php';
require_once './src/db/loai.php';

$categories = getAllTypes();
session_start();
if (isset($_SESSION['expire'])) {
    $now = time();
    // var_dump($_SESSION['expire']); die();
    if ($now > $_SESSION['expire']) {
        session_destroy();
    }

}

if (isset($_GET['tat_ca'])) {
    $tat_ca = $_GET['tat_ca'];
    $allProducts = getAllProducts();
    $title = "Tất cả sản phẩm";
}else if (isset($_GET['dac_biet'])) {
    $productsSpecial = getProductsSpecial();
    $title = "Sản phẩm đặc biệt";
}
else {
    $ten_loai = $_GET['ten_loai'];
    $title = $ten_loai;
    $productsByCategory = getProductsByCategory($ten_loai);
}


?>


<?php  include('./header_product.php'); ?>
<div class="main main_category">
    <nav class="breadcrumbs_category">
        <a href="./index.php">Trang chủ</a>
        <span class="divider_category">/</span>
        <?php if (isset($ten_loai)) {
            echo $ten_loai;} elseif (isset($_GET['dac_biet'])) { echo "Đặc biệt";} else {echo "Cửa hàng";}?>
    </nav>
    <span class="total-product">Tất cả <?php
    if (isset($_GET['tat_ca'])) {
        echo count($allProducts);
    }else if (isset($_GET['dac_biet'])) {
        echo count($productsSpecial);
    }
    else {
        echo count($productsByCategory); ?> 
    <?php } ?> kết quả
     </span>
    <section class="section product_category">
        
        <div class="shop-sidebar-menu">
            <span class="sidebar-title">danh mục sản phẩm</span>
            <div class="is-divider small"></div>
            <div class="sidebar-menu__content">
                <ul>
                    <li><a href="./products_by_type.php?tat_ca=<?= true; ?>">Tất cả sản phẩm</a></li>
                    <li><a href="./products_by_type.php?dac_biet=<?= true; ?>">Đặc biệt</a></li>
                    <?php foreach($categories as $category=>$value): ?>
                        <li><a href="./products_by_type.php?ten_loai=<?= $value['ten_loai']; ?>"><?= $value['ten_loai']; ?></a></li>

                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <?php if (isset($ten_loai)) { ?>
        <div class="products__container">
            <?php foreach($productsByCategory as $productId=>$productData): ?>
                <div class="product__card products__container-content">
                    <div class="product__img">
                        <a href="./product_page.php?id=<?= $productData['id'];?>">
                            <img src="<?= $productData['img']; ?>" loading="lazy" >
                        </a>
                    </div>
                    <div class="product__category"><?= $productData['ten_loai']; ?></div>
                    <div class="product__title">
                        <a href="./product_page.php?id=<?= $productData['id'];?>" >
                        <?= $productData['ten_sp']; ?>
                        </a>
                    </div>
                    <div class="product__price ">
                        <?= number_format($productData['gia']); ?> &#8363                        
                    </div>
                    <?php if($productData['so_luong']==0){
                        echo "<div class=\"sold_out\">Hết hàng</div>";

                    } ?>
                    
                </div>
            <?php endforeach; ?>
        </div>
        <?php } ?>

        <?php if (isset($_GET['tat_ca'])) { ?>
            <div class="products__container">
            <?php foreach($allProducts as $productId=>$productData): ?>
                <div class="product__card products__container-content">
                    <div class="product__img">
                        <a href="./product_page.php?id=<?= $productData['id'];?>">
                            <img src="<?= $productData['img']; ?>" loading="lazy" >
                        </a>
                    </div>
                    <div class="product__category"><?= $productData['ten_loai']; ?></div>
                    <div class="product__title">
                        <a href="./product_page.php?id=<?= $productData['id'];?>" >
                        <?= $productData['ten_sp']; ?>
                        </a>
                    </div>
                    <div class="product__price ">
                        <?= number_format($productData['gia']); ?> &#8363                        
                    </div>
                    <?php if($productData['so_luong']==0){
                        echo "<div class=\"sold_out\">Hết hàng</div>";

                    } ?>
                    
                </div>
            <?php endforeach; ?>
        </div>

         <?php } ?>
         
         <?php if (isset($_GET['dac_biet'])) { ?>
            
            <div class="products__container">
            <?php foreach($productsSpecial as $product): ?>
                <div class="product__card products__container-content">
                    <div class="product__img">
                        <a href="./product_page.php?id=<?= $product['id'];?>">
                            <img src="<?= $product['img']; ?>" loading="lazy" >
                        </a>
                    </div>
                    <div class="product__category"><?= $product['ten_loai']; ?></div>
                    <div class="product__title">
                        <a href="./product_page.php?id=<?= $product['id'];?>" >
                        <?= $product['ten_sp']; ?>
                        </a>
                    </div>
                    <div class="product__price ">
                        <?= number_format($product['gia']); ?> &#8363                        
                    </div>
                    <?php if($product['so_luong']==0){
                        echo "<div class=\"sold_out\">Hết hàng</div>";

                    } ?>
                    
                </div>
            <?php endforeach; ?>
        </div>

         <?php } ?> 

        </section>
    </div>

<?php include 'footer.php'; ?>