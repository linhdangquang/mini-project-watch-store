<?php
if(!isset($_SERVER['HTTP_REFERER'])){
   
    echo " access permission";
    exit;
  }
    session_start();
    require_once './../../db/binh_luan.php';
    $comments = getAllComments();

?>

<?php 
        $page_title = "Comments";
        include("../dashboard/dash_header.php"); 
?>

<!-- dashboard contents -->
<div class="container-fluid">
        <div class="row mt-3">
           <div class="col-lg-3 col-md-3">
               <div class="list-group small shadow-sm">
                   <div class="list-group-item active">
                        Dữ liệu bình luận
                   </div>
                   <a href="#" class="list-group-item link-danger fw-bold "><span>Số bình luận : <?php echo count($comments); ?> </span> </a>
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
           <div class="col-lg-9 col-md-9">
               <div class="table-responsive">
                <table class="table table-striped table-hover bg-light small shadow-sm">
                    <tr class="table-dark text-left">
                        <th>Mã bình luận</th>
                        <th>Nội dung</th>
                        <th>Mã sản phẩm</th>
                        <th>Mã khách hàng</th>
                        <th>Ngày bình luận</th>
                        <th colspan="2" >Công cụ</th>
                    </tr>

                    <?php

                    for ($i=0; $i < count($comments); $i++) {

                    ?>

                    <tr class="text-left">
                        <td><?php echo $comments[$i]['ma_bl'];  ?></td>
                        <td><?php echo $comments[$i]['noi_dung'];  ?></td>
                        <td><?php echo $comments[$i]['ma_sp'];  ?></td>
                        <td><?php echo $comments[$i]['ma_kh'];  ?></td>
                        <td><?php echo $comments[$i]['ngay_bl'];  ?></td>
                        <td >
                            <a href="./delete_cmt.php?id=<?php echo $comments[$i]['ma_bl']; ?>" class="btn btn-sm w-100 btn-danger text-white" onclick="return confirm('Are you sure want to delete?')">
                            Xóa
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                
                </table>
               </div>
           </div>
        </div>
    </div>
    <!-- dashboard contents -->
     
<!-- footer -->
<?php 
        include("../dashboard/dash_footer.php"); 
    ?>