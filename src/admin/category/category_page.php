<?php
    if(!isset($_SERVER['HTTP_REFERER'])){
   
        echo " access permission";
        die();
    }
    session_start();
    require_once './../../db/loai.php';
    $categories = getAllTypes();

?>

<?php $page_title = 'Category'; include("../dashboard/dash_header.php"); ?>

<!-- dashboard contents -->
<div class="container-fluid ">
        <div class="row  mt-3 ">
           <div class="col-lg-3 col-sm col-md-3 mb-1">
               <div class="list-group small shadow-sm">
                   <div class="list-group-item active ">
                        Dữ liệu loại hàng
                   </div>
                   <a href="" class="list-group-item link-primary " data-bs-toggle="modal" data-bs-target="#add_employee">Thêm loại hàng</a>
                   <a href="#" class="list-group-item link-danger fw-bold "><span>Số loại hàng : <?php echo count($categories); ?> </span> </a>
               </div>

               <div class="mb-3 fw-bold text-center text-danger">
                        <?php

                        if (isset($_SESSION['error']) ) {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }

                        if (isset($_SESSION['done_delete']) ) {
                            echo $_SESSION['done_delete'];
                            unset($_SESSION['done_delete']);
                        }

                    ?>  
              </div>
           </div>
           <div class="col-lg-7 col-md-7   ">
               <div class="table-responsive rounded">
                <form action="./delete_category.php" method="post">

                    <table class="table table-striped table-hover bg-light small shadow-sm table-info  ">
                        
                        <tr class="table-dark text-left">
                            <th><input type="checkbox" id="checkAl"> Select All</th>
                            <th>Mã loại</th>
                            <th>Tên loại </th>
                            <th colspan="2" >Công cụ</th>
                        </tr>
    
                        <?php
    
                            for ($i=0; $i < count($categories); $i++) {
                        
                        ?>
    
                        <tr class="text-left">
                            <td width="15%"><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $categories[$i]['ma_loai']; ?>"></td>
                            <td> <?php echo $categories[$i]['ma_loai'];  ?> </td>
                            <td> <?php echo $categories[$i]['ten_loai'];  ?> </td>
                            <td width="20%">
                                <a href="./edit_category.php?id=<?php echo $categories[$i]['ma_loai'];    ?>" class="btn btn-sm w-100 btn-warning text-white">Cập nhật</a></td>
                            <td width="10%" >
                                <a href="./delete_category.php?id=<?php echo $categories[$i]['ma_loai'];    ?>" onclick="return confirm('Xác nhận xóa?')" class="btn btn-sm w-100 btn-danger text-white">Xóa</a>
                            </td>
                        </tr>
                        <?php } ?>
                       
                    </table>
                    <p align="left"><button type="submit" onclick="return confirm('Xác nhận xóa?')" class="btn btn-success" name="multi_delete">Xóa</button></p>
                </form>
               </div>
           </div>
        </div>
    </div>
    <!-- dashboard contents -->

   
  
    <!-- Add products Modal -->
    <div class="modal fade" id="add_employee" tabindex="-1" aria-labelledby="add_employee" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thêm loại hàng</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="./create_category.php" method="post" >

                    <div class="mb-3">
                        <label  class="form-label ps-1">ID</label>
                        <input type="number" class="form-control form-control-sm" placeholder="autonumber" disabled  >
                    </div>

                    <div class="mb-3">
                        <label  class="form-label ps-1">Tên loại</label>
                        <input type="text" class="form-control form-control-sm" autocomplete="off" placeholder="Tên loại" name="ten_loai"  >
                    </div>
                   
                    <div class="mb-3 d-grid">
                        <button type="submit" class="btn btn-sm btn-success">
                            Thêm loại hàng </button>
                    </div>

                </form>

            </div>
            
        </div>
        </div>
    </div>
    <!-- footer -->
   
    <?php 
        include("../dashboard/dash_footer.php"); 
    ?>
     