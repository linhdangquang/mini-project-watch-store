<?php   
    session_start();
    require_once './../../db/khach_hang.php';
    require_once './recaptcha.php';
    $data = [
        'ma_kh' => $_POST['ma_kh'],
        'ten_kh' => $_POST['ten'],
        'sdt' => $_POST['sdt'],
        'dia_chi' => $_POST['dia_chi'],
        'gioi_tinh' => intval($_POST['gioi_tinh']),
        'email' => $_POST['email'],
        'mat_khau' => $_POST['mat_khau'],
        'vai_tro' => intval($_POST['vai_tro']),
    ];
    if (
        empty($data['ma_kh']) == true || empty($data['ten_kh']) == true || empty($data['sdt']) == true || empty($data['dia_chi'])
        ||  empty($data['email']) == true ||  empty($data['mat_khau']) == true 
    ) {
        $error = "Không được để trống!";
        $_SESSION['error'] = $error;
        header("Location: ./register_form.php");
        die;
    }
    if ( strlen($data['mat_khau']) < 5) {
        $error = "Mật khẩu phải từ 5 ký tự!";
        $_SESSION['error'] = $error;
        header("Location: ./register_form.php");
        die;
    }
    if ($data['mat_khau'] != $_POST['re-mat_khau']) {
        $_SESSION['error'] = "Mật khẩu không trùng khớp!";
        header("Location: ./register_form.php");
        die;
    }
    $recaptcha = $_POST['g-recaptcha-response'];
    $res = reCaptcha($recaptcha);
    if(!$res['success']){
        $_SESSION['error'] = "Captcha Require!";
        header("Location: ./register_form.php");
        die;
    }
    if (isset($_POST['register'])) {
        $db = mysqli_connect('localhost', 'root', '', 'du_an_mau');
        $username = $data['ma_kh'];
        $tel = $data['sdt'];
        $email = $data['email'];
        $sql_u = "SELECT * FROM khach_hang WHERE ma_kh='$username'";
        $sql_tel = "SELECT * FROM khach_hang WHERE sdt='$tel'";
        $sql_e = "SELECT * FROM khach_hang WHERE email='$email'";
        $res_u = mysqli_query($db, $sql_u);
        $res_tel = mysqli_query($db, $sql_tel);
        $res_e = mysqli_query($db, $sql_e);

        if (mysqli_num_rows($res_u) > 0) {
            $_SESSION['error'] = "Xin lỗi... tên đăng nhập đã tồn tại";
            header("Location: ./register_form.php");
            die;
        }else if(mysqli_num_rows($res_e) > 0) {
            $_SESSION['error'] = "Xin lỗi... tên email đã tồn tại";
            header("Location: ./register_form.php");
            die;
        }else if(mysqli_num_rows($res_tel) > 0) {
            $_SESSION['error'] = "Xin lỗi... tên số điện thoại đã tồn tại";
            header("Location: ./register_form.php");
            die;
        }else {
            insertUser($data);
            $_SESSION['alert'] = "Tài khoản đã được tại thành công! Vui lòng đăng nhập";
            header("Location: ./login_form.php");
        }
    }
?>