<?php 
    session_start();
    require_once './src/db/khach_hang.php';
    $id = $_SESSION['khach_hang']['id'];
    $user = findUserById($id);

?>
<?php $title= "Hồ sơ ngưòi dùng"; include './header_product.php' ?>

<div class="main main_category">
    <nav class="breadcrumbs_category">
        <a href="./index.php">Trang chủ</a>
        <span class="divider_category">/</span>
        Hồ sơ 
    </nav>
    <?php 
        if(isset($_SESSION['khach_hang'])) { ?>
        <section class="">
            <h1>Hồ sơ <?php echo $user['ten']; ?></h1>
            <div class="profile__container">
                <div class="profile__avatar">
                    <h2><?php echo $user['ma_kh'] ?></h2>
                    <span class="small">username</span>
                </div>

                <div class="profile__form">
                <form method="post" action="./src/admin/users/update_user.php">
                    <input type="hidden" name="profile" value="true">
                    <input type="hidden" autocomplete="off" name="id"  value="<?php echo $user['id'];?>">
                    <input type="hidden" autocomplete="off" name="ma_kh"  value="<?php echo $user['ma_kh'];?>">
                    <div class="profile__group">
                        <label class="profile__group-label">Họ tên</label>
                        <input type="text"  name="ten_kh" value="<?php echo $user['ten'];?>" autocomplete="off">
                    </div>
                    <div class="profile__group">
                        <label class="profile__group-label">Số di động</label>
                        <input type="text" name="sdt" value="<?php echo $user['sdt'];?>" autocomplete="off">
                    </div>
                    <div class="profile__group">
                        <label class="profile__group-label">Địa chỉ</label>
                        <input type="text" name="dia_chi" value="<?php echo $user['dia_chi'];?>" autocomplete="off">
                    </div>
                    <div class="profile__group">
                        <label class="profile__group-label">Email</label>
                        <input type="email" name="email" value="<?php echo $user['email'];?>" autocomplete="off">
                    </div>
                    <div class="profile__group" style="display:flex">
                        <p>Giới tính</p>
                        <div class="profile__radio">
                        <input type="radio" name="gioi_tinh" value="1" <?php
                            if ($user['gioi_tinh'] == 1) {
                                echo "checked";
                            }
                        ?> >
                        <label class="profile__group-label">Nam</label>

                        </div>
                        <div class="profile__radio">
                            <input type="radio" name="gioi_tinh" value="0" <?php
                                if ($user['gioi_tinh'] == 0) {
                                    echo "checked";
                                }
                            ?>>
                            <label>Nữ</label>

                        </div>
                    </div>
                    <div class="profile__group" >
                        <p>Vai trò</p>
                        <div class="profile__radio">
                            <input type="radio" name="vai_tro" value="0" <?php
                            if ($user['vai_tro'] == 0) {
                                echo "checked";
                            }else {
                                echo "disabled";
                            }
                        ?>>
                            <label class="profile__group-label">Khách hàng</label>
                        </div>
                        <div title="Bạn không có quyền quản trị!" class="profile__radio">
                            <input type="radio" name="vai_tro" value="1" <?php
                                if ($user['vai_tro'] == 1) {
                                    echo "checked";
                                }else {
                                    echo "disabled";
                                }
                            ?>>
                            <label>Quản trị</label>

                        </div>
                    </div>
                    <div class="profile__group">
                        <label class="profile__group-label">Mật khẩu</label>
                        <input type="password" name="mat_khau" id="password" value="<?php echo $user['mat_khau'];?>" autocomplete="off">
                        
                    </div>
                    <div style="padding-left:17%;">
                            <input type="checkbox" class="me-1"  onclick="showPassw()">Hiển thị mật khẩu
                    </div>
                    <div class="profile__error">
                        <?php
                        if (isset($_SESSION['error']) ) {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                        ?>
                    </div>
                    <div class="profile__group profile__btn">
                        <button type="submit" class="profile__update-btn" onclick="return confirm('Cập nhật tài khoản?')">Cập nhật</button>
                    </div>
                </form>
                </div>
            </div>
        </section>
      <?php  } ?>
    
</div>



<?php include './footer.php' ?>