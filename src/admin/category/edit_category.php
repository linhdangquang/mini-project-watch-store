<?php

    session_start();
    require_once './../../db/loai.php';
    $id = intval($_GET['id']);
    $data = getTypeById($id);

?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="./../css/bootstrap.min.css">
    <link rel="stylesheet" href="./../css/style.css">
    <title>Edit Category</title>
  </head>
  <body>

    

    <div class="container">

        <div class="row">

            <form action="./update_category.php" class="col-8 p-3 offset-2 border border-3 border-secondary rounded bg-light" method="post">
                <input type="hidden" name="id"  value="<?php echo $id?>">
                <div class="mb-3">
                    <label for="" class="form-label">Mã loại </label>                                                             
                    <input type="text" autocomplete="off" disabled placeholder="autonumber">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Tên loại</label>
                    <input type="text" autocomplete="off" name="ten_loai" class="form-control" value="<?php echo $data['ten_loai'];?>">
                </div>
                
                
                <div class="d-grid gap-2 fw-bold text-center text-danger">
                    
                    <?php

                        if (isset($_SESSION['error']) ) {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }

                    ?>
                    <button type="submit" class="btn btn-primary ">Cập nhật</button>
                    <!-- Khi click không thêm mới và quay về trang danh sách -->
                    <a href="./category_page.php" class="btn btn-secondary"> Cancel</a>
                </div>
            </form>
        </div>
    </div>
    <!-- dashboard contents -->

<!-- footer -->
<?php 
        include("../dashboard/dash_footer.php"); 
    ?>