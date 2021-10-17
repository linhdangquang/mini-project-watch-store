<?php

    session_start();
    require_once './../../db/khach_hang.php';
    $id = intval($_GET['id']);
    $data = findUserById($id);



?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="./../css/bootstrap.min.css">
    <link rel="stylesheet" href="./../css/style.css">
    <title>EditUser</title>
    
  </head>
  <body>

    

    <div class="container">

        <div class="row">

            <form action="./update_user.php" class="col-8 p-3 offset-2 border border-3 border-secondary rounded bg-light" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id"  value="<?php echo $id?>">
                <div class="mb-3">
                    <label for="" class="form-label">Mã khách hàng</label>                                                             
                    <input type="text" autocomplete="off" name="ma_kh" class="form-control" value="<?php echo $data['ma_kh'];?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Tên khách hàng</label>
                    <input type="text" autocomplete="off" name="ten_kh" class="form-control" value="<?php echo $data['ten'];?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">SDT</label>
                    <input type="text" autocomplete="off" name="sdt" class="form-control" value="<?php echo $data['sdt'];?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Địa chỉ</label>
                    <input type="text" autocomplete="off" name="dia_chi" class="form-control" value="<?php echo $data['dia_chi'];?>">
                </div>
                <div class="mb-3 d-flex ">
                    Giới tính
                    <div class="mx-2">
                        <input type="radio" name="gioi_tinh" value="1" <?php
                            if ($data['gioi_tinh'] == 1) {
                                echo "checked";
                            }
                        ?> >
                        <label class="profile__group-label">Nam</label>

                    </div>
                    <div>
                        <input type="radio" name="gioi_tinh" value="0" <?php
                            if ($data['gioi_tinh'] == 0) {
                                echo "checked";
                            }
                        ?>>
                        <label>Nữ</label>

                    </div>
                </div>
                <div class="mb-3">
                        <label for="">Vai trò</label>
                        <select name="vai_tro" class="form-control form-control-sm">
                            <option value="0">Khách hàng</option>
                            <option value="1" <?php 
                                if ($data['vai_tro'] ==1) {
                                    echo "selected";
                                }
                            ?>>Quản trị</option>
                        </select>
                </div>
                <div class="mb-3">
                        <label for="">Email</label>

                        <input type="email" name="email" class="form-control form-control-sm" value="<?php echo $data['email'];?>" autocomplete="off" >
                </div>
                <div class="mb-3">
                        <label for="">Mật khẩu</label>

                        <input type="password" name="mat_khau" id="password" class="form-control form-control-sm" value="<?php echo $data['mat_khau'];?>" autocomplete="off" >
                        <div class="text-gray small pt-1 ms-1">
                                    <input type="checkbox" class="me-1"  onclick="showPassw()">Hiển thị mật khẩu

                        </div>
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
                    <a href="./users.php" class="btn btn-secondary"> Cancel</a>
                </div>
            </form>
        </div>
    </div>
    <!-- dashboard contents -->
    

    


<!-- footer -->
<?php 
    include("../dashboard/dash_footer.php"); 
?>