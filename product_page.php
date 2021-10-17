<?php 
    require_once './src/db/hang_hoa.php';
    require_once './src/db/binh_luan.php';
    session_start();
    $id = intval($_GET['id']);
    $comments = findCommentsByProductId($id);
    $product = findProductById($id);
    $category = $product['ten_loai'];
    $productSame = getProductsRelated($category, $id);

?>
    <?php $title = $product['ten_loai'];   include './header_product.php'; ?>  

    <div class="main" id="main">
        <section class="section product">
            
            <div class="product__container container product_page">
                <div class="product__content">
                    <img src="<?php echo $product['img']; ?>" alt="" class="product__img" width="100%">
                    <div class="product__info">
                        <nav class="breadcrumbs">
                            <a href="./index.php">Trang chủ</a>
                            <span class="divider">/</span>
                            <a href="./products_by_type.php?ten_loai=<?php echo $product['ten_loai']; ?>"><?php echo $product['ten_loai']; ?></a>
                        </nav>
                        <h2 class="product__name"><?php echo $product['ten_sp']; ?></h2>
                        <div class="is-divider"></div>
                        <h2 class="product__price product__price-page"><?php echo number_format($product['gia']); ?> &#8363</h2>
                        <p class="product__description"><?php echo $product['mo_ta']; ?></p>

                        <div class="add-to-cart__form">
                            <form action="/du_an_mau/cart.php" method="post">
                                <div class="quantity__input">
                                    <label >Số lượng:</label>
                                    <input  type="number" name="so_luong_mua" min="1" max="50" value="1">
                                    <input type="hidden" name="id" value="<?php echo ($id) ?>">
                                </div>
                                <div class="form__div">
                                    <button class="btn__add"type="submit"  <?php if ($product['so_luong']==0){
                                        echo "disabled";
                                    }?>>THÊM VÀO GIỎ</button>
                                </div>
                            </form>
                        </div>

                        <div class="product__span">
                            <span class=product__ma-sp> Mã: <?php echo $product['ma_sp']; ?></span> <br>
                            <span class="product__category"> Danh mục: <?php echo $product['ten_loai']; ?></span>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <!-- Comment Section -->
        <section class="section comment__container " id="comment__container">

            <div class="comment__content container">
                <h3 class="comment__content-title">Bình luận "<?php echo $product['ten_sp']; ?>" </h3>
                <div class="comment__form">
                    <?php if(isset($_SESSION['khach_hang'])){ ?>

                        <form action="./src/admin/comments/create_cmt.php" method="post">
                            <div class="comment__form-comment">
                                <label class="comment__form-label">Bình luận của bạn<span>*</span></label>
                                <textarea class="comment__form-textarea" name="noi_dung" cols="45" rows="8" maxlength="300" required></textarea>
                            </div>
                            <input type="hidden" name="ma_sp" value="<?php echo $product['id']; ?>">
                            <input type="hidden" name="ma_kh" value="<?php echo $_SESSION['khach_hang']['ma_kh']; ?>">
                            <p class="profile__error">
                                <?php
    
                                if (isset($_SESSION['error']) ) {
                                    echo $_SESSION['error'];
                                    unset($_SESSION['error']);
                                }
    
                                ?>  
                            </p>
                            <div class="comment__form-submit">
                                <input type="submit" class="comment__form-submit--btn"value="Gửi đi">
                            </div>
                        </form>
                  <?php  }else { ?>
                        <p class="profile__error">Bạn cần đăng nhập mới có thể bình luận.</p>
                    <?php } ?>
                </div>

                <div class="comment__users">
                    <?php if(empty($comments) === false) { 
                        foreach($comments as $cmtKey => $comment){ ?>

                            <div class="comment__user">
                                <div class="comment__user-name">
                                <?php echo $comment['ma_kh']; ?>
                                <!--== <?php if(isset($_SESSION['khach_hang']) && $comment['ma_kh'] == $_SESSION['khach_hang']['ma_kh']) { ?>
                                        <a href=""><i class="ri-chat-delete-line"></i></a>
                                <?php } ?> -->
                                <span class="comment__user-date"><?php echo $comment['ngay_bl']; ?></span>
                                </div>
                                <div class="comment__user-content">
                                    <?php echo $comment['noi_dung']; ?>
                                    
                                </div>
                                
                            </div>
                      <?php  } ?>
                   <?php }else { ?>
                        <div class="comment__user">
                            <div class="comment__user-content">
                                Hãy là người đầu tiên bình luận!
                            </div>
                        </div>

                    <?php } ?>
                       
                </div>
            </div>
        </section>
        <!-- Comment Section -->

        <section class="section related_product">
            <h2 class="section__title related_title">SẢN PHẨM TƯƠNG TỰ</h2>

            <div class="product__container container product__container-related" >

            <?php
                    for ($i=0; $i < count($productSame) ; $i++) {  
                        
                    ?>
                        <div class="product__card product__cart-related">
                            <div class="product__img">
                                <a href="./product_page.php?id=<?php echo $productSame[$i]['id'];?>">
                                    <img src="<?php echo $productSame[$i]['img']; ?>" loading="lazy" >
                                </a>
                            </div>
                            <div class="product__category"><?php echo $productSame[$i]['ten_loai']; ?></div>
                            <div class="product__title product__title-related">
                                <a href="./product_page.php?id=<?php echo $productSame[$i]['id'];?>" >
                                <?php echo $productSame[$i]['ten_sp']; ?>
                                </a>
                            </div>
                            <div class="product__price ">
                                <?php echo  number_format($productSame[$i]['gia']); ?> &#8363                        
                            </div>
                            <?php if($productSame[$i]['so_luong']==0){
                                echo "<div class=\"sold_out\">Hết hàng</div>";

                            } ?>
                            
                        </div>
                    
                <?php } ?>

            </div>
        </section>
    </div>

<?php include 'footer.php'; ?>
