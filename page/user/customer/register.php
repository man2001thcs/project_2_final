<?php
require_once '../../../lib/config/const.php';
require_once '../../../lib/config/database.php';
require_once '../../../lib/model/User.php';
require_once '../../../lib/model/Temp_user.php';

$user = new User();
$temp_user = new Temp_user();

if ($_POST) {

	$data['User']['email'] = $_POST['email'];
	$data['User']['password'] = $_POST['password'];
	$data['User']['fullname'] = $_POST['fullname'];
	$data['User']['address'] = $_POST['address'];
	$data['User']['phone_number'] = $_POST['sdt'];
	$data['User']['created'] = date('Y-m-d H:i:s');

	$dataS = array(
		'TempUser' => array(
			'email' => $_POST['email'],
			'password' => $_POST['password'],
			'fullname' => $_POST['fullname'],
			'address' => $_POST['address'],
			'phone_number' => $_POST['sdt'],
			'created' => date('Y-m-d H:i:s')
		)
	);

	if ($user->checkUser($data)){
		echo ("<script>alert('Tai khoan da ton tai');</script>");
		
	} else{
		if ($_POST['password'] != $_POST['re-password']){
			echo ("<script>alert('Mật khẩu không khớp!');</script>");
		} else{
			if ($temp_user->saveTemp($dataS)) {
				Helper::redirect("page/user/log/login_register.php");
			} echo "fail";
		}		
	}	
}

?>


<!DOCTYPE html>

<head>
    <title>Register</title>

    <link rel="stylesheet" href="../../../css/fontawesome-free-6.1.1-web/fontawesome-free-6.1.1-web/css/all.css">
    <link rel="stylesheet" href="../../../css/user/register/register.css">

    <?php include "../../templates/css/css.php"; ?>
    <?php include "../../templates/js/js.php"; ?>
</head>

<body>
    <div>
        <?php include '../../templates/header/head.php'; ?>
    </div>

    <div class="bodycontain_login">
        <div class="heading"><i class="fa fa-font-awesome" aria-hidden="true"></i> Đăng kí</div>
        <div class="row">
            <div class="column_img">
                <img src="../../../lib/images/login_img.png" style="width:100%">
            </div>
            <div class="column_log">
                <div class="login">
                    <div class="form">
                        <form action="" method="post">
                            <h2>Đăng kí</h2>
                            <?php echo $user->form->error('email'); ?>
                            <input name="email" type="email" placeholder="Tài khoản">
                            <input name="password" type="password" placeholder="Mật khẩu">
                            <input name="re-password" type="password" placeholder="Nhập lại mật khẩu">
                            <input name="fullname" type="text" placeholder="Họ và tên">
                            <input name="address" type="text" placeholder="Địa chỉ">
                            <input name="sdt" type="text" placeholder="Số điện thoại">
                            <input type="submit" value="Sign Up" class="login">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<footer>
    <?php include '../../templates/footer/footer.php'; ?>
</footer>

</html>