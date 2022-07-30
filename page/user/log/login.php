<?php
require_once '../../../lib/config/const.php';
require_once '../../../lib/config/database.php';
require_once '../../../lib/model/User.php';

$user = new User();

if ($_POST) {
  $dataSub = array(
		'User' => array(
			'email' => $_POST['email'],
			'password' => $_POST['password']
			)
		);
	
	if ($user->login($dataSub)) {
		if ($user->isAdmin()) {
			header('Location: ../../../page/main_page/main/list.php');
		} else {
			header('Location: ../../../page/main_page/main/list.php');
		}
	} else {
		$login = false;
	}
}

?>
<!DOCTYPE html>

<head>
    <title>User Login</title>

    <link rel="stylesheet" href="../../../css/fontawesome-free-6.1.1-web/fontawesome-free-6.1.1-web/css/all.css">
    <link rel="stylesheet" href="../../../css/user/login/login.css">

    <?php include "../../templates/css/css.php"; ?>
    <?php include "../../templates/js/js.php"; ?>


</head>

<body>
    <div>
        <?php include '../../templates/header/head.php'; ?>

    </div>

    <div class="bodycontain_login">
        <div class="heading"><i class="fa fa-font-awesome" aria-hidden="true"></i> Đăng nhập</div>
        <div class="row_log">
            <div class="column_img">
                <img src="../../../lib/images/login_img.png">
            </div>
            <div class="column_log">
                <div class="login">
                    <div class="form">
                        <form action="" method="post">
                            <h2>Đăng nhập</h2>
                            <input name="email" type="email" placeholder="Tài khoản">
                            <input name="password" type="password" placeholder="Mật khẩu">
                            <input type="submit" value="Sign In" class="login">
                            <p style="color: white;">Chưa có tài khoản? <span>Đăng kí </span> <a
                                    href="../customer/register.php" style="color: white;">ngay!</a>
                            <p>
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