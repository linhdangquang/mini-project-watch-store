<?php
  session_start();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/checkout.css">
    
    <!-- icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
    <title>Home</title>
    <style>
      .header__product{
        margin-top: -5rem;
      }
    </style>
</head>
<body>
    <header class=" header__product" >
        <nav class="nav container">
            <a href="./index.php" class="nav__logo">LINHDQ<i class="ri-time-line"></i></a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="#" class="nav__link">giới thiệu</a></li>
                    <li class="nav__item"><a href="#" class="nav__link nav__link-active">đồng hồ nam</a></li>
                    <li class="nav__item"><a href="#" class="nav__link">đồng hồ nữ</a></li>
                    <li class="nav__item"><a href="#" class="nav__link">đồng hồ đôi</a></li>
                    <li class="nav__item"><a href="#" class="nav__link">phụ kiện</a></li>
                    <li class="nav__item"><a href="#" class="nav__link">tin tức</a></li>
                    <li class="nav__item"><a href="#" class="nav__link">liên hệ</a></li>
                </ul>
            </div>

            <div class="nav__social">
                <ul class="nav__social-icon">
                    <li class="social__item"><a href="#" class="social__icon"><i class="ri-search-line"></i></a></li>
                    <?php 
                        if(isset($_SESSION['khach_hang'])) {    
                    ?>
                           <li class="social__item"><a style="text-transform: none" href="#" class="social__icon " id="admin" title="Tài khoản"><i class="ri-user-line"></i>
                            <?php echo $_SESSION['khach_hang']['ten'];  ?>
                            </a></li>

                    <?php  }else { ?>
                        <li class="social__item"><a style="text-transform: none" href="./src/admin/auth/login_form.php" class="social__icon " id="admin" title="Tài khoản"><i class="ri-user-line"></i>
                            Đăng nhập
                            </a></li>

                    <?php } ?>
                    <li class="social__item"><a href="./cart.php" class="social__icon"><i class="ri-shopping-bag-line" title="Giỏ hàng"></i></a></li>
                    <?php 
                        if(isset($_SESSION['khach_hang'])) {    
                    ?>
                        <li class="social__item"><a style="text-transform: none" href="./src/admin/auth/logout.php" class="social__icon"><i class="ri-logout-box-line" title="Đăng xuất"></i>Đăng xuất</a></li>
                    <?php  } ?>

                    <?php 
                        if(isset($_SESSION['khach_hang']) && $_SESSION['khach_hang']['vai_tro'] ==1) {    
                    ?>
                           <li class="social__item" id="dash"><a href="./src/admin/dash.php" title="Quản trị"  class="social__icon" ><i class="ri-settings-2-line" ></i></a></li>
                           
                    <?php  } ?>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="title">
            <h2>Product Order Form</h2>
        </div>
      <div class="d-flex">
        <form action="" method="">
          <label>
            <span class="fname">First Name <span class="required">*</span></span>
            <input type="text" name="fname">
          </label>
          <label>
            <span class="lname">Last Name <span class="required">*</span></span>
            <input type="text" name="lname">
          </label>
          <label>
            <span>Company Name (Optional)</span>
            <input type="text" name="cn">
          </label>
          <label>
            <span>Street Address <span class="required">*</span></span>
            <input type="text" name="houseadd" placeholder="House number and street name" required>
          </label>
          <label>
            <span>&nbsp;</span>
            <input type="text" name="apartment" placeholder="Apartment, suite, unit etc. (optional)">
          </label>
          <label>
            <span>Town / City <span class="required">*</span></span>
            <input type="text" name="city"> 
          </label>
          <label>
            <span>State / County <span class="required">*</span></span>
            <input type="text" name="city"> 
          </label>
          <label>
            <span>Postcode / ZIP <span class="required">*</span></span>
            <input type="text" name="city"> 
          </label>
          <label>
            <span>Phone <span class="required">*</span></span>
            <input type="tel" name="city"> 
          </label>
          <label>
            <span>Email Address <span class="required">*</span></span>
            <input type="email" name="city"> 
          </label>
        </form>
        <div class="Yorder">
          <table>
            <tr>
              <th colspan="2">Your order</th>
            </tr>
            <tr>
              <td>Product Name x 2(Qty)</td>
              <td>$88.00</td>
            </tr>
            <tr>
              <td>Subtotal</td>
              <td>$88.00</td>
            </tr>
            <tr>
              <td>Shipping</td>
              <td>Free shipping</td>
            </tr>
          </table><br>
          <div>
            <input type="radio" name="dbt" value="dbt" checked> Direct Bank Transfer
          </div>
          <p>
              Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
          </p>
          <div>
            <input type="radio" name="dbt" value="cd"> Cash on Delivery
          </div>
          <div>
            <input type="radio" name="dbt" value="cd"> Paypal <span>
            <img src="https://www.logolynx.com/images/logolynx/c3/c36093ca9fb6c250f74d319550acac4d.jpeg" alt="" width="50">
            </span>
          </div>
          <button type="button">Place Order</button>
        </div><!-- Yorder -->
       </div>
      </div>

<?php include './footer.php' ?>

