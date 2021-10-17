<?php
    require_once './src/db/loai.php';
    $categories = getAllTypes();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FAVICON -->
    <link rel="apple-touch-icon" sizes="180x180" href="./asset/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="./assets/favicon/site.webmanifest">
    <!-- css -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="./assets/css/cart.css">
    
    <!-- icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
    <title><?php echo $title; ?></title>
</head>
<body>
    <header class="header header__product" id="header">
        <nav class="nav container">
            <a href="./index.php" class="nav__logo">XSHOP<i class="ri-time-line"></i></a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="#" class="nav__link">giới thiệu</a></li>
                    <?php if (count($categories)>0) { ?>
                        <?php for($i = 0; $i < 4; $i++) { ?>
                            <li class="nav__item"><a href="./products_by_type.php?ten_loai=<?php echo $categories[$i]['ten_loai']; ?>" class="nav__link"><?php echo $categories[$i]['ten_loai']; ?></a></li>
    
                        <?php } ?>    
                    <?php }?>
                    <li class="nav__item"><a href="#" class="nav__link">tin tức</a></li>
                    <li class="nav__item"><a href="#" class="nav__link">liên hệ</a></li>
                </ul>
            </div>

            <div class="nav__social">
                <ul class="nav__social-icon">
                    <li class="social__item search__container">
                        <span  class="social__icon search-icon"><i class="ri-search-line" title="Tìm kiếm"></i></span>
                        <div class="form__container" >
                            <form action="./search_page.php" method="post" >
                                <input type="text" class="form__input-search" name="search" placeholder="Tìm kiếm" autocomplete="off" required>
                                <button type="submit" name="search-btn" class="search-submit" ><i class="ri-search-line"></i>  </button>
                            </form>

                            <span class="close-search--form"><i class="ri-close-circle-fill"></i></span>
                        </div>
                    </li>
                    <li class="social__item"><a href="./cart.php" class="social__icon"><i class="ri-shopping-bag-line"></i></a></li>
                    <?php 
                        if(isset($_SESSION['khach_hang'])) {    
                    ?>
                           <li class="social__item"><a style="text-transform: none" href="./profile.php" class="social__icon " id="admin" title="Tài khoản"><i class="ri-user-line"></i>
                            <?php echo $_SESSION['khach_hang']['ten'];  ?>
                            </a></li>
                    <?php  }else { ?>
                        <li class="social__item"><a style="text-transform: none" href="./src/admin/auth/login_form.php" class="social__icon " id="admin" title="Tài khoản"><i class="ri-user-line"></i>
                            Đăng nhập
                            </a></li>

                    <?php } ?>
                    
                    <?php 
                        if(isset($_SESSION['khach_hang'])) {    
                    ?>
                        <li class="social__item"><a style="text-transform: none" href="./src/admin/auth/logout.php" class="social__icon"><i class="ri-logout-box-line" title="Đăng xuất"></i>Đăng xuất</a></li>
                    <?php  } ?>

                    <?php 
                        if(!isset($_SESSION['khach_hang'])) {    
                    ?>
                        <li class="social__item"><a style="text-transform: none" href="./src/admin/auth/register_form.php" class="social__icon"><i class="ri-user-add-line" title="Đăng ký"></i>Đăng ký</a></li>
                    <?php  } ?>

                    <?php 
                        if(isset($_SESSION['khach_hang']) && $_SESSION['khach_hang']['vai_tro'] ==1) {    
                    ?>
                           <li class="social__item" id="dash"><a href="./src/admin/dashboard/dash.php" title="Quản trị"  class="social__icon" ><i class="ri-settings-2-line" ></i></a></li>
                           
                    <?php  } ?>
                </ul>
            </div>
        </nav>
    </header>

    