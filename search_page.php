<?php
    session_start();
    require_once './src/db/loai.php';
    require_once './src/db/hang_hoa.php';
    $categories = getAllTypes();
    if (isset($_REQUEST['search-btn'])) {
        $search = rtrim(addslashes($_POST['search']));
        if (empty($search)) {
            $_SESSION['error'] ="<script>
            alert(\"Không được để trống!\");
           </script>";
            header("Location: ./index.php");
            die;
        }else{
            $products = searchProducts($search);
        }
    }

?>

<?php $title= "Tìm kiếm sản phẩm"; include('./header_product.php'); ?>
<div class="main main_category">
    <nav class="breadcrumbs_category">
        <a href="./index.php">Trang chủ</a>
        <span class="divider_category">/</span>
        Từ khóa : "<?php echo $search?>"
    </nav>
    <span class="total-product">Tất cả <?php
    echo count($products); ?> kết quả
     </span>
    <section class="section product_category">
        
        <div class="shop-sidebar-menu">
            <span class="sidebar-title">danh mục sản phẩm</span>
            <div class="is-divider small"></div>
            <div class="sidebar-menu__content">
                <ul>
                    <li><a href="./products_by_type.php?tat_ca=<?= true; ?>">Tất cả sản phẩm</a></li>
                    <?php foreach($categories as $category=>$value): ?>
                        <li><a href="./products_by_type.php?ten_loai=<?= $value['ten_loai']; ?>"><?= $value['ten_loai']; ?></a></li>

                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <?php if (isset($search)) { ?>
        <div class="products__container">
            <?php foreach($products as $productId=>$productData): ?>
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

        </section>
    </div>

<?php include 'footer.php'; ?>