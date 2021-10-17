<?php

    session_start();
    require_once './../../db/hang_hoa.php';
    require_once './../../db/loai.php';
    $category = getAllTypes();
    $id = intval($_GET['id']);
    $data = findProductById($id);

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="./../css/bootstrap.min.css">
    <link rel="stylesheet" href="./../css/style.css">
    <title>Edit products</title>
  </head>
  <body>

    

    <div class="container">

        <div class="row">

            <form action="./update_products.php" class="col-8 p-3 offset-2 border border-3 border-secondary rounded bg-light" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id"  value="<?php echo $id?>">
                <div class="mb-3">
                    <label for="" class="form-label">Mã sản phẩm</label>                                                             
                    <input type="text" autocomplete="off" name="ma_sp" class="form-control text-uppercase" value="<?php echo $data['ma_sp'];?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Tên sản phẩm</label>
                    <input type="text" autocomplete="off" name="ten_sp" class="form-control text-uppercase" value="<?php echo $data['ten_sp'];?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Số lượng</label>
                    <input type="number" min="0" max="1000" autocomplete="off" name="so_luong" class="form-control" value="<?php echo $data['so_luong'];?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Giá</label>
                    <input type="number" autocomplete="off" name="gia" class="form-control" value="<?php echo $data['gia'];?>">
                </div>
                <div class="mb-3">
                        <label for="" class="form-label">Đơn vị</label>

                        <select name="don_vi" class="form-select ">
                            <option value="chiếc" <?php echo $data['don_vi'] =='chiếc' ? 'selected' : ''    ?> >Chiếc</option>
                            <option value="cặp" <?php echo $data['don_vi'] =='cặp' ? 'selected' : ''    ?> >Cặp</option>
                        </select>
                </div>
                <div class="mb-3 d-flex ">
                        Đặc biệt
                        <div class="mx-2">
                            <input type="radio" name="dac_biet" value="0" <?php
                            if ($data['dac_biet'] == 0) {
                                echo "checked";
                            }
                        ?>>
                            <label class="profile__group-label">Không</label>

                        </div>
                        <div>
                            <input type="radio" name="dac_biet" value="1" <?php
                            if ($data['dac_biet'] == 1) {
                                echo "checked";
                            }
                        ?>>
                            <label>Có</label>

                        </div>
                    </div>
                <div class="mb-3">
                    <label for="" class="form-label">Mô tả</label>
                    <textarea name="mo_ta" id="" cols="90%" rows="10"><?php echo $data['mo_ta'];?></textarea>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Hình ảnh</label>
                    <img src="../../../<?php echo $data['img'];?>" alt="" width="100px">
                    <!-- <input type="file" name="img" class="form-control" value=""  > -->
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Loại hàng</label>
                    <select name="ten_loai" class="form-select">
                        <option value="" selected disabled >Loại hàng</option>
                        <?php foreach($category as $id=>$type): ?>
                            <option value="<?= $type['ten_loai'];?>" <?php if($type['ten_loai'] == $data['ten_loai']) { echo " selected";}?>  ><?= $type['ten_loai']; ?></option>
                            
                        <?php endforeach; ?>
                    </select>
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
                    <a href="./products.php" class="btn btn-secondary"> Cancel</a>
                </div>
            </form>
        </div>
    </div>
    <!-- dashboard contents -->
    

    
<!-- footer -->
<?php 
        include("../dashboard/dash_footer.php"); 
    ?>