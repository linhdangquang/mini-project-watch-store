<?php

require_once './src/db/hang_hoa.php';
require_once './src/db/slide_conn.php';
session_start();
if (isset($_SESSION['expire'])) {
    $now = time();
    // var_dump($_SESSION['expire']); die();
    if ($now > $_SESSION['expire']) {
        session_destroy();
    }

}
$products = getAllProducts();
$productsSpecial = getProductsSpecial();
$sliders = getAllSliders();
?>
    <?php $title = "ĐỒNG HỒ THỜI TRANG 2021";  include 'header.php'; ?>

    <div class="main">
        <section class="header__banner">
            <div class="swiper-container mySwiper" id="slider">
                <div class="swiper-wrapper">
                  <?php foreach($sliders as $id=>$slider): ?>
                    <div class="swiper-slide"><img src="<?= $slider['slide_src']; ?>" alt="" class="banner__img"></div>
                  <?php endforeach; ?>
                </div>
                <div class="swiper-pagination"></div>
              </div>
        </section>

        <section class="section products">
            <h2 class="section__title">SẢN PHẨM ĐẶC BIỆT</h2>

            <div class="product__container container" data-aos="fade-up" data-aos-duration="2000">
                
                <?php foreach($productsSpecial as $product): ?>
                    <div class="product__card">
                            <div class="product__img">
                                <a href="./product_page.php?id=<?php echo $product['id'];?>">
                                    <img src="<?php echo $product['img']; ?>" >
                                </a>
                            </div>
                            <div class="product__category"><?php echo $product['ten_loai']; ?></div>
                            <div class="product__title" title="<?php echo $product['ten_sp'];?>">
                                <a href="./product_page.php?id=<?php echo $product['id'];?>" >
                                <?php echo $product['ten_sp']; ?>
                                </a>
                            </div>
                            <div class="product__price ">
                                <?php echo  number_format($product['gia']); ?> &#8363                        
                            </div>
                            <?php if($product['so_luong']==0){
                                echo "<div class=\"sold_out\">Hết hàng</div>";
        
                            } ?>
                            
                        </div>

                <?php endforeach; ?>

            </div>
        </section>

        <section class="section products">
            <h2 class="section__title">ĐỒNG HỒ NAM</h2>

            <div class="product__container container" data-aos="fade-up" data-aos-duration="2000">

               <?php
                    for ($i=0; $i < count($products) ; $i++) { 
                            if ($products[$i]['ten_loai'] == "Đồng hồ nam") {
                        ?> 
                        
                        <div class="product__card">
                            <div class="product__img">
                                <a href="./product_page.php?id=<?php echo $products[$i]['id'];?>">
                                    <img src="<?php echo $products[$i]['img']; ?>" >
                                </a>
                            </div>
                            <div class="product__category"><?php echo $products[$i]['ten_loai']; ?></div>
                            <div class="product__title" title="<?php echo $products[$i]['ten_sp'];?>">
                                <a href="./product_page.php?id=<?php echo $products[$i]['id'];?>" >
                                <?php echo $products[$i]['ten_sp']; ?>
                                </a>
                            </div>
                            <div class="product__price ">
                                <?php echo  number_format($products[$i]['gia']); ?> &#8363                        
                            </div>
                            <?php if($products[$i]['so_luong']==0){
                                echo "<div class=\"sold_out\">Hết hàng</div>";
        
                            } ?>
                            
                        </div>
                          
                    <?php } ?>
                <?php } ?>

            </div>
        </section>

        <section class="section products">
            <h2 class="section__title">ĐỒNG HỒ NỮ</h2>

            <div class="product__container container" data-aos="fade-up-right" data-aos-duration="2000">

               <?php
                    for ($i=0; $i < count($products) ; $i++) { 
                            if ($products[$i]['ten_loai'] == "Đồng hồ nữ") {
                        ?> 
                        
                        <div class="product__card">
                            <div class="product__img">
                                <a href="./product_page.php?id=<?php echo $products[$i]['id'];?>">
                                    <img src="<?php echo $products[$i]['img']; ?>" loading="lazy" >
                                </a>
                            </div>
                            <div class="product__category"><?php echo $products[$i]['ten_loai']; ?></div>
                            <div class="product__title">
                                <a href="./product_page.php?id=<?php echo $products[$i]['id'];?>" >
                                <?php echo $products[$i]['ten_sp']; ?>
                                </a>
                            </div>
                            <div class="product__price ">
                                <?php echo  number_format($products[$i]['gia']); ?> &#8363                        
                            </div>
                            <?php if($products[$i]['so_luong']==0){
                                echo "<div class=\"sold_out\">Hết hàng</div>";
        
                            } ?>
                            
                        </div>
                          
                    <?php } ?>
                <?php } ?>

            </div>
        </section>

        <section class="section news" >
            <h2 class="section__title">THÔNG TIN HỮU ÍCH</h2>

            <div class="news__container container" data-aos="fade-up-left" data-aos-duration="1000">
                <div class="news__content">
                    <div class="news__content-img">
                        <img src="./assets/img/slide1.jpg" class="news__img" alt="">
                    </div>
                    <a href="" class="news__title">Những mẫu đồng hồ dành cho công sở ...</a>
                    <span class="news__description">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto eius ...</span>
                </div>
                <div class="news__content">
                    <div class="news__content-img">
                        <img src="./assets/img/slide2.jpg" class="news__img" alt="">
                    </div>
                    <a href="" class="news__title">Bộ sưu tập hoàng gia ...</a>
                    <span class="news__description">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto eius ...</span>
                </div>
                <div class="news__content">
                    <div class="news__content-img">
                        <img src="./assets/img/slide3.jpg" class="news__img" alt="">
                    </div>
                    <a href="" class="news__title">Thiết kế hướng dến sự thanh lịch ...</a>
                    <span class="news__description">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto eius ...</span>
                </div>
            </div>
        </section>
       
    </div>
    
    <?php include 'footer.php'; ?>
   

