<?php
    if(!isset($_SERVER['HTTP_REFERER'])){
   
        echo " access permission";
        exit;
    }
    session_start();
    require_once './../../db/hang_hoa.php';
    if (isset($_REQUEST['search-btn'])) {
        $search = rtrim(addslashes($_POST['search']));
        if (empty($search)) {
            $_SESSION['error'] ="Yeu cau nhap du lieu vao o trong";
            header("Location: ./products.php");
            die;
        }else{
            $products = searchProducts($search);
        }
    }
?>
<?php 
        $page_title = "Products";
        include("../dashboard/dash_header.php"); 
?>

<!-- dashboard contents -->
<div class="container-fluid ">
        <div class="row  mt-3 ">
           <div class="col-lg-3 col-sm col-md-3 mb-1">
               <div class="list-group small shadow-sm">
                   <div class="list-group-item active ">
                        Dữ liệu sản phẩm 
                   </div>
                   <a href="#" class="list-group-item link-primary" >Từ khóa tìm kiếm : <?php echo $search; ?></a>
                   <a href="#" class="list-group-item link-danger fw-bold "><span>Số kết quả: <?php echo count($products); ?> </span> </a>
                   <a href="./products.php" class="list-group-item link-success fw-bold "><span>Quay lại </span> </a>
               </div>

               <div class="mb-3 fw-bold text-center text-danger">
                        <?php

                        if (isset($_SESSION['error']) ) {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }

                    ?>  
              </div>
           </div>
           <div class="col-lg-12 col-md-9  ">
               <div class="table-responsive">
                   <form action="./delete_products.php" method="post">
                    <table class="table table-striped table-hover bg-light small shadow-sm table-info ">
                    <p align="left"><button type="submit" onclick="return confirm('Xác nhận xóa?')" class="btn btn-success btn-fixed" name="multi_delete">Xóa</button></p>
                        <tr class="table-dark text-left">
                            <th><input type="checkbox" id="checkAl"> Select All</th>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Đơn vị</th>
                            <th >Mô tả</th>
                            <th>Hình ảnh</th>
                            <th>Loại hàng</th>
                            <th colspan="3" >Công cụ</th>
                        </tr>
    
                        <?php
    
                            for ($i=0; $i < count($products); $i++) {
                        
                        ?>
    
                        <tr class="text-left">
                            <td width="7%"><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $products[$i]['id']; ?>"></td>
                            <td> <?php echo $products[$i]['ma_sp']; ?></td>
                            <td class="text-uppercase" width="20%"> <?php echo $products[$i]['ten_sp'];  ?></td>
                            <td width="6%"> <?php echo $products[$i]['so_luong'];  ?></td>
                            <td> <?php echo number_format($products[$i]['gia']);  ?> đ</td>
                            <td width="5%"> <?php echo $products[$i]['don_vi'];  ?> </td>
                            <td width="21%"> <?php echo $products[$i]['mo_ta'];  ?> </td>
                            <td> <img class="product__img-admin" src="../../../<?php echo $products[$i]['img'];  ?>" alt="" width="70px"></td>
                            <td width="10%"> <?php echo $products[$i]['ten_loai'];  ?></td>
        
                            <td width="8%">
                                <a href="./edit_products.php?id=<?php echo $products[$i]['id'];    ?>" class="btn btn-sm w-100 btn-warning text-white">Cập nhật</a></td>
                            <td >
                                <a href="./delete_products.php?id=<?php echo $products[$i]['id'];    ?>" onclick="return confirm('Are you sure want to delete?')" class="btn btn-sm w-100 btn-danger text-white">Xóa</a>
                            </td>
                        </tr>
                        <?php } ?>
                        
                    </table>
                    
                </form>

                
               </div>
           </div>
        </div>
    </div>
    <!-- dashboard contents -->
<!-- footer -->
<?php 
        include("../dashboard/dash_footer.php"); 
    ?>