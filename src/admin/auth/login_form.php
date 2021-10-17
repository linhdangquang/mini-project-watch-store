<?php

    session_start();
    if (isset($_SESSION['khach_hang'])){
        echo "Bạn đã đăng nhập!";
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
    <title>Login</title>
  </head>
  <body>

    <div class="container-fluid vh-100" style="background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);" >
        <div class="row justify-content-center pt-5">
            <div class="col-lg-4 col-md-4">
                <div class="card bx">
                   <div class="card-body">
                    <div class="card-title">
                        <h4>Đăng nhập</h4>
                        <p class="card-text small text-muted">Đăng nhập bằng tài khoản và mật khẩu</p>
                        <form action="./login.php" method="post">
                            <div class="mb-3">
                                <input type="text" name="ma_kh" class="form-control form-control-sm" placeholder="Tên đăng nhập..." autocomplete="off" >
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" id="password" class="form-control form-control-sm" placeholder="Mật khẩu" autocomplete="off" >
                                <div class="text-gray small pt-1 ms-1">
                                    <input type="checkbox" class="me-1"  onclick="showPassw()">Hiển thị mật khẩu

                                </div>
                            </div>
                            <div class="g-recaptcha brochure__form__captcha mb-3" data-sitekey="6LeHGo0cAAAAAGxI8kZ4X7f-WFCS18jpn9Zepxjt"></div>
                            <div class="mb-3 fw-bold text-danger text-center">
                                <?php
                                    if (isset($_SESSION['error']) ) {
                                        echo $_SESSION['error'];
                                        unset($_SESSION['error']);
                                    }
                                ?>
                            </div>
                            <div class="mb-3 fw-bold text-primary text-center">
                                <?php
                                    if (isset($_SESSION['alert']) ) {
                                        echo $_SESSION['alert'];
                                        unset($_SESSION['alert']);
                                    }
                                ?>
                            </div>
                            <div class=" d-grid">
                                <input type="submit" class="btn btn-sm btn-success  btn-grad py-2 border-0" value="Đăng nhập">
                            </div>
                           
                            <div class="mb-2 mt-2 d-flex flex-row justify-content-between ">
                                <a href="./forgot_password.php" class="text-decoration-none link-secondary">Quên mật khẩu?</a>
                                <a href="./register_form.php" class="text-decoration-none link-secondary">Đăng ký?</a>
                            </div>
                            <div class="d-grid">
                                <a href="./../../../index.php" class="btn btn-sm btn-secondary ">Quay lại</a>
                            </div>
                        </form>
                    </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
   
    <script>
        function showPassw() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
  </body>

</html>