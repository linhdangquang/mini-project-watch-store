<?php
if(!isset($_SERVER['HTTP_REFERER'])){
   
    echo " access permission";
    exit;
  }
    session_start();
    require_once './../../db/khach_hang.php';
    $users = getAllUsers();

?>

    <?php 
        $page_title = "Users";
        include("../dashboard/dash_header.php"); 
    ?>

    <!-- dashboard contents -->
    <div class="container-fluid">
        <div class="row mt-3">
           <div class="col-lg-3 col-md-3">
               <div class="list-group small shadow-sm">
                   <div class="list-group-item active">
                        Dữ liệu khách hàng
                   </div>
                   <a href="" class="list-group-item link-primary " data-bs-toggle="modal" data-bs-target="#add_job">Thêm khách hàng</a>
                   <a href="#" class="list-group-item link-danger fw-bold "><span>Số khách hàng : <?php echo count($users); ?> </span> </a>
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
                        <th>Mã khách hàng</th>
                        <th>Tên</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Giới tính</th>
                        <th>Email</th>
                        <th>Mật khẩu</th>
                        <th>Vai trò</th>
                        <th colspan="2" >Công cụ</th>
                    </tr>

                    <?php

                    for ($i=0; $i < count($users); $i++) {

                    ?>

                    <tr class="text-left">
                        <td><?php echo $users[$i]['ma_kh'];  ?></td>
                        <td><?php echo $users[$i]['ten'];  ?></td>
                        <td><?php echo $users[$i]['sdt'];  ?></td>
                        <td><?php echo $users[$i]['dia_chi'];  ?></td>
                        <td><?php if ($users[$i]['gioi_tinh'] == 1) {
                            echo 'Nam';
                            } else echo 'Nữ';
                          ?>
                        </td>
                        <td><?php echo $users[$i]['email'];  ?></td>
                        <td><?php echo $users[$i]['mat_khau'];  ?></td>
                        <td><?php if ($users[$i]['vai_tro'] == 0) {
                            echo 'Khách hàng';
                            } else echo 'Quản trị viên';
                          ?>
                        </td>
                        <td ><a href="./edit_user.php?id=<?php echo $users[$i]['id']; ?>"  class="btn btn-sm w-100 btn-warning text-white">Sửa</a></td>
                        <td >
                            <a href="./delete_user.php?id=<?php echo $users[$i]['id']; ?>" class="btn btn-sm w-100 btn-danger text-white" onclick="return confirm('Are you sure want to delete?')">
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

   
  
    <!-- Add Job Modal -->
    <div class="modal fade" id="add_job" tabindex="-1" aria-labelledby="add_job" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thêm khách hàng</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="./create_user.php" method="post" >
                    <div class="mb-3">
                        <input type="text" name="ma_kh" class="form-control form-control-sm" placeholder="Mã khách hàng" autocomplete="off" >
                    </div>
                    <div class="mb-3">
                        <input type="text" name="ten" class="form-control form-control-sm" placeholder="Tên khách hàng" autocomplete="off" >
                    </div>
                    <div class="mb-3">
                        <input type="text" name="sdt" class="form-control form-control-sm" placeholder="Số điện thoại" autocomplete="off" >
                    </div>
                    <div class="mb-3">
                        <input type="text" name="dia_chi" class="form-control form-control-sm" placeholder="Địa chỉ" autocomplete="off" >
                    </div>
                    <div class="mb-3">
                        <label for="">Giới tính</label>
                        <select name="gioi_tinh" class="form-control form-control-sm">
                            <option value="0">Nữ</option>
                            <option value="1">Nam</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control form-control-sm" placeholder="Email" autocomplete="off" >
                    </div>
                    <div class="mb-3">
                        <input type="password" name="mat_khau" id="password" class="form-control form-control-sm" placeholder="Mật khẩu" autocomplete="off" >
                        <div class="text-gray small pt-1 ms-1">
                            <input type="checkbox" class="me-1"  onclick="showPassw()">Hiển thị mật khẩu

                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="">Vai trò</label>
                        <select name="vai_tro" class="form-control form-control-sm">
                            <option value="0">Khách hàng</option>
                            <option value="1">Quản trị </option>
                        </select>
                    </div>
                    
                    <div class="mb-3 d-grid">
                        <button type="submit" class="btn btn-sm btn-success">Thêm mới</button>
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