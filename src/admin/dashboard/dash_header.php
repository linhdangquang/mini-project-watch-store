
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="./../css/bootstrap.min.css">
    <link rel="stylesheet" href="./../css/style.css">
    <title><?php echo $page_title; ?></title>
  </head>
  <body>

    <!-- nav -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-gradient">
        <div class="container-fluid">
          <a class="navbar-brand" href="../dashboard/dash.php">LinhDQ</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="./../products/products.php">Hàng hóa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="./../category/category_page.php">Loại hàng</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./../users/users.php">Khách hàng</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./../comments/comments_page.php">Bình luận</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./../slides/slider.php">Slider</a>
              </li>
            </ul>
            <form method="post" action="../products/search_products.php"class="d-flex">
                <div class="input-group">
                    <input type="search" name="search" class="form-control form-control-sm" placeholder="Tìm kiếm.." aria-label="Recipient's username" aria-describedby="button-addon2" autocomplete="off">
                    <button class="btn btn-success btn-sm" type="submit" name="search-btn" id="button-addon2"><i class="fa fa-search"></i></button>
                </div>
            </form>
            <a href="./../../../index.php" class=" ms-3 btn btn-sm btn-info text-white">Shop</a>
            <a href="./../auth/logout.php" class=" ms-3 btn btn-sm btn-warning text-gray">Đăng xuất</a>
          </div>
        </div>
      </nav>
    <!-- nav -->