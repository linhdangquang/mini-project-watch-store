<?php
    session_start();
    require_once './../../db/khach_hang.php';
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        // var_dump($email); die();
        $sql = "SELECT * FROM khach_hang WHERE email='$email'";
        $row = pdoExecuteFetchAll($sql);
        if (!empty($row)) {
            $userID= $row[0]['ma_kh'];
            $userEmail = $row[0]['email'];
            $userPassword = $row[0]['mat_khau'];
            if ($email == $userEmail) {
                $to = $userEmail;
                $subject = "Lấy lại mật khẩu từ LinhDQ";
                $txt = "Tên đăng nhập của bạn là : $userID \n Mật khẩu : $userPassword .";
                $headers = "From:Admin Web Shop Linh Đẹp trai";
                
                if (mail($to,$subject,$txt,$headers)) {
                    $_SESSION['error'] = "Vui lòng kiểm tra email $email để lấy lại mật khẩu";
                }
            
            }
        }else {
            $_SESSION['error'] =  "Email không tồn tại";
          
        }
            
    }   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/bootstrap.min.css">
    <link rel="stylesheet" href="./../css/style.css">
    <title>Forgot Password</title>
</head>
<body>
<div class="container-fluid vh-100" style="background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);" >
        <div class="row justify-content-center pt-5">
            <div class="col-lg-4 col-md-4">
                <div class="card bx">
                   <div class="card-body">
                    <div class="card-title">
                        <h4>Quên mật khẩu</h4>
                        <p class="card-text small text-muted">Lấy lại mật khẩu bằng email</p>
                        <form action="" method="post">
                            <div class="mb-3">
                                <input type="email" name="email" class="form-control form-control-sm" placeholder="Email..."  autocomplete="off" required >
                            </div>
                            <div class="mb-3 fw-bold text-danger text-center">
                                <?php
                                    if (isset($_SESSION['error']) ) {
                                        echo $_SESSION['error'];
                                        unset($_SESSION['error']);
                                    }
                                ?>
                            </div>
                           
                            <div class=" d-grid">
                                <input type="submit" name="submit" class="btn btn-sm btn-success mb-2 btn-grad py-1 border-0" value="Gửi">
                            </div>
                           
                           
                            <div class="d-grid">
                                <a href="./login_form.php" class="btn btn-sm btn-secondary ">Quay lại</a>
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
</body>
</html>