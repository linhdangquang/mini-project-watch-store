<?php

    session_start();
    if (isset($_SESSION['khach_hang'])){
        echo "Bạn đang đăng nhập!";
        die();
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./../css/bootstrap.min.css">
    <link rel="stylesheet" href="./../css/style.css">
    <title>Đăng ký</title>
  </head>
  <body class="overflow-hidden">

    <div class="container-fluid" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.jpg');" >
        <div class="row justify-content-center pt-2 gradient-custom-3 ">
            <div class="col-lg-4 col-md-6">
                <div class="card bx">
                   <div class="card-body">
                    <div class="card-title">
                        <h4>Đăng ký</h4>
                        <p class="card-text small text-muted">Vui lòng điền thông tin hợp lệ</p>
                        <form action="./register.php" method="post">
                            <div class="row">
                                <div class="mb-2 col">
                                    <label for="" class="form-label">Họ và tên</label>
                                    <input type="text" name="ten" class="form-control form-control-sm" placeholder="Tên..." autocomplete="off" required >
                                </div>
                                <div class="mb-2 col">
                                    <label for="" class="form-label">Tên đăng nhập</label>
                                    <input type="text" name="ma_kh" class="form-control form-control-sm" placeholder="Tên đăng nhập..." autocomplete="off" required >
                                </div>

                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Email</label>
                                <input type="email" name="email" required class="form-control form-control-sm" placeholder="Email..." autocomplete="off" >
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">SDT</label>
                                <input type="tel" name="sdt" pattern="[0-9]{9,11}" class="form-control form-control-sm" placeholder="Số điện thoại" autocomplete="off" title="Số điện thoại không hợp lệ" required >
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Địa chỉ</label>
                                <input type="text" name="dia_chi" required class="form-control form-control-sm" placeholder="Địa chỉ .." autocomplete="off" >
                            </div>
                            <div class="mb-3">
                                <label for="">Giới tính</label>
                                <select name="gioi_tinh" class="form-control form-control-sm" required>
                                    <option value="" selected disabled>Giới tính</option>
                                    <option value="0">Nữ</option>
                                    <option value="1">Nam</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="mb-2 col">
                                    <label for="">Mật khẩu</label>
                                    <input type="password" name="mat_khau" class="form-control form-control-sm" placeholder="Mật khẩu" autocomplete="off" required >
                                </div>
                                <div class="mb-2 col">
                                    <label for="">Nhập lại mật khẩu</label>
                                    <input type="password" name="re-mat_khau" class="form-control form-control-sm" placeholder="Nhập lại" autocomplete="off" required >
                                </div>

                            </div>
                            <input type="number" name="vai_tro" value="0" hidden >
                            <div class="g-recaptcha brochure__form__captcha mb-3" data-sitekey="6LeHGo0cAAAAAGxI8kZ4X7f-WFCS18jpn9Zepxjt"></div>
                            <div class="mb-3 fw-bold text-danger text-center">
                                <?php
                                    if (isset($_SESSION['error']) ) {
                                        echo $_SESSION['error'];
                                        unset($_SESSION['error']);
                                    }
                                ?>
                            </div>
                            <div class="d-grid">
                                <input type="submit" name="register" class="btn btn-sm btn-success btn-grad border-0 py-2 text-uppercase fw-bold" value="Đăng ký">
                            </div>
                            <p class="text-center text-muted mt-2 mb-1">Bạn đã có tài khoản? <a href="./login_form.php" class="fw-bold text-body"><u>Đăng nhập</u></a></p>
                            <div class="d-grid">
                                <a href="./../../../index.php" class="btn btn-sm btn-secondary">Quay lại</a>
                            </div>
                        </form>
                    </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
  </body>

</html>