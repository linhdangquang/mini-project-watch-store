<?php
    if(!isset($_SERVER['HTTP_REFERER'])){
   
        echo " access permission";
        exit;
    }
    session_start();
    require_once './../../db/slide_conn.php';
    $sliders = getAllSliders();

?>

<?php 
        $page_title = "Sliders";
        include("../dashboard/dash_header.php"); 
?>

<!-- dashboard contents -->
<div class="container-fluid ">
        <div class="row  mt-3 ">
           <div class="col-lg-3 col-sm col-md-3 mb-1">
               <div class="list-group small shadow-sm">
                   <div class="list-group-item active ">
                        Dữ liệu sliders
                   </div>
                   <a href="" class="list-group-item link-primary " data-bs-toggle="modal" data-bs-target="#add_employee">Thêm slide</a>
                   <a href="#" class="list-group-item link-danger fw-bold "><span>Số slide : <?php echo count($sliders); ?> </span> </a>
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
           <div class="col-lg-9 col-md-9  ">
               <div class="table-responsive">
                <table class="table table-striped table-hover bg-light small shadow-sm table-info ">
                    
                    <tr class="table-dark text-left">
                        <th>ID</th>
                        <th>Tên </th>
                        <th>Hình ảnh</th>
                        <th colspan="2" >Công cụ</th>
                    </tr>

                    <?php

                        for ($i=0; $i < count($sliders); $i++) {
                    
                    ?>

                    <tr class="text-left">
                        <td> <?php echo $sliders[$i]['id'];  ?> </td>
                        <td> <?php echo $sliders[$i]['image_name'];  ?> </td>
                        <td> <img src="../../../<?php echo $sliders[$i]['slide_src'];  ?>" alt="" width="30%"></td>    
                        <td width="10%" >
                            <a href="./delete_slide.php?id=<?php echo $sliders[$i]['id'];    ?>" onclick="return confirm('Are you sure want to delete?')" class="btn btn-sm w-100 btn-danger text-white">Xóa</a>
                        </td>
                    </tr>
                    <?php } ?>
                   
                </table>
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
            <h5 class="modal-title" id="exampleModalLabel">Thêm slide</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="./create_slide.php" method="post" enctype="multipart/form-data" >

                    <div class="mb-3">
                        <label  class="form-label ps-1">Hình ảnh</label>
                        <input type="FILE" name="slide_src" class="form-control form-control-sm"  >
                    </div>
                   
                    <div class="mb-3 d-grid">
                        <button type="submit" class="btn btn-sm btn-success">
                            Thêm hình ảnh slide </button>
                    </div>

                </form>

            </div>
            
        </div>
        </div>
    </div>
     <!-- Copyright -->
    
    <!-- footer -->
    <?php 
        include("../dashboard/dash_footer.php"); 
    ?>