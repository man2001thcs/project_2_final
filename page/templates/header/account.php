<?php
if (!isset($user)) {
	$user = new User();
}
?>

<link href="../../../css/account_drop_menu.css" rel="stylesheet" type="text/css" media="all">
<?php
if ($user->isLoggedIn()) :
?>
<nav>
    <ul id="dropmenu_account">
        <li>
            <a href="<?php echo BASE_URL; ?>">Tài khoản</a>
            <ul>
                <li><a href="<?php echo BASE_URL; ?>page/user/temp_bill/listM.php">Giỏ hàng</a></li>
                <li><a href="<?php echo BASE_URL; ?>page/user/change_info/edit.php">Thông tin</a></li>
                <li><a href="<?php echo BASE_URL; ?>page/user/change_info/password.php">Đổi mật khẩu</a></li>
            </ul>
        </li>
        <li>
            <a href="<?php echo BASE_URL; ?>page/user/log/logout.php" style="background-color: red;">Đăng xuất
                <i class="fa fa-sign-out" aria-hidden="true" style="color: white;"></i></a>
        </li>
    </ul>
</nav>

<?php else: ?>

<nav>
    <ul id="dropmenu_account" style="float:right; margin-right: 10%;">
        <li>
            <a href="<?php echo BASE_URL; ?>page/user/log/login.php" style="background-color: blue;">Đăng nhập <i
                    class="fa fa-sign-in" aria-hidden="true" style="color: white;"></i></a>
        </li>
    </ul>
</nav>

<?php endif; ?>