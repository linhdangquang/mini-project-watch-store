<?php
    session_start();
    require_once './src/db/hang_hoa.php';
    if(isset($_POST['id']) )
    {
       
        if(isset($_SESSION['id_them_vao_gio']))
        {
            $so=count($_SESSION['id_them_vao_gio']);
            $trung_lap="khong";
            for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++)
            {
                if($_SESSION['id_them_vao_gio'][$i]==$_POST['id'])
                {
                    $trung_lap="co";
                    $vi_tri_trung_lap=$i;
                    break;
                }
            }
            if($trung_lap=="khong")
            {
                $_SESSION['id_them_vao_gio'][$so]=$_POST['id'];
                $_SESSION['sl_them_vao_gio'][$so]=$_POST['so_luong_mua'];
            }
            if($trung_lap=="co")
            {
                $_SESSION['sl_them_vao_gio'][$vi_tri_trung_lap]=$_SESSION['sl_them_vao_gio'][$vi_tri_trung_lap]+$_POST['so_luong_mua'];
            }
        }
        else
        {
            $_SESSION['id_them_vao_gio'][0]=$_POST['id'];
            $_SESSION['sl_them_vao_gio'][0]=$_POST['so_luong_mua'];
        }
    }


    
?>





<?php $title="Giỏ hàng"; include 'header_product.php'; ?>

<main class="main">
    <section class="section cart">
        <h1 style="margin-bottom: 1rem;">Giỏ hàng</h1>
        
        <div class="shopping-cart">
            <?php if(empty($_SESSION['id_them_vao_gio']) !==true){
                echo "<button class=\"remove-product remove-all\">
                        <a style=\"color: white;\" href=\"./src/cart/cart_delete_all.php\">Xóa giỏ hàng</a>
                    </button>";
            } ?>

            <div class="column-labels">
                <label class="product-image">Image</label>
                <label class="product-details">Product</label>
                <label class="product-price">Giá</label>
                <label class="product-quantity">Số lượng</label>
                <label class="product-removal">Remove</label>
                <label class="product-line-price">Tổng</label>
            </div>

            

            <?php
                
                if (!isset($_SESSION['id_them_vao_gio'])) {
                    echo "Bạn chưa thêm sản phẩm vào giỏ hàng";
                    die();

                }
        
                $total_quantity = 0;
                $total_price = 0;
                for ($i=0; $i < count($_SESSION['id_them_vao_gio']); $i++) { 
                    
                    $product = findProductById(intval($_SESSION['id_them_vao_gio'][$i]));
                    $price = $product['gia']*$_SESSION['sl_them_vao_gio'][$i];
                    
            
            ?>

            <div class="product">
                <div class="product-image">
                <img src="<?php echo $product['img']; ?>">
                </div>
                <div class="product-details">
                <div class="product-title"><?php echo $product['ten_sp']; ?></div>
                <p class="product-description"><?php echo $product['ma_sp']; ?></p>
                </div>
                <div class="product-price"><?php echo number_format($product['gia']); ?></div>
                <div class="product-quantity">
                    <?php echo $_SESSION['sl_them_vao_gio'][$i]; ?>
                </div>
                <div class="product-removal">
                <button class="remove-product">
                    <a style="color: white;" href="./src/cart/cart_item_delete.php?id=<?php echo $product['id']; ?>">Xoá</a>
                </button>
                </div>
                <div class="product-line-price"><?php echo number_format($price) ?></div>
            </div>

            <?php
                $total_quantity += $_SESSION['sl_them_vao_gio'][$i];
                $total_price += ($product['gia']*$_SESSION['sl_them_vao_gio'][$i]);
        
            } ?>

        

        

            <div class="totals">
                <div class="totals-item">
                <label>Ước tính</label>
                <div class="totals-value" id="cart-subtotal"><?php echo number_format($total_price);  ?></div>
                </div>
                <div class="totals-item">
                <label>Thuế (0%)</label>
                <div class="totals-value" id="cart-tax">0</div>
                </div>
                <div class="totals-item">
                <label>Shipping</label>
                <div style="text-align: right;" id="cart-shipping">Miễn phí</div>
                </div>
                <div class="totals-item totals-item-total">
                <label>Tổng cộng</label>
                <div class="totals-value" id="cart-total"><?php echo number_format($total_price);  ?></div>
                <?php if(!isset($_SESSION['khach_hang'])) { ?>
                    <a  href="./src/admin/auth/login_form.php" class="checkout">Đăng nhập để thanh toán</a>
                <?php  }else {

                    echo "<a  href=\"./checkout.php\" class=\"checkout\">Thanh toán</a>";
                } ?>
                <a  href="./index.php" class="back-checkout checkout">Quay lại</a>
                    
            </div>
        </div> 
    </section>
</main>



<?php 
   

include 'footer.php';    ?>
