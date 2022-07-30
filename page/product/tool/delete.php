<?php
require_once '../../../lib/config/const.php';
require_once '../../../lib/config/database.php';
require_once '../../../lib/controller/Helper.php';
require_once '../../../lib/model/Medicine.php';
require_once '../../../lib/model/User.php';

if (!isset($user)) {
	$user = new User();
}

if (!$user->isLoggedIn() || !$user->isAdmin()) {
	Helper::redirect_err();
}

$tool = new Tool();

$id = isset($_GET['id']) ? intval($_GET['id']) : null;

if (empty($id)) {
	Helper::redirect('page/product/tool');
}
if ($_POST){
	$tool->deleteById($id);
	Helper::redirect('page/product/tool');

}


?>

<!DOCTYPE html>

<head>
    <title>Xóa</title>
    <?php include "../../templates/css/css.php"; ?>
    <?php include "../../templates/js/js.php"; ?>

</head>

<body>
    <div>
        <?php include '../../templates/header/head.php'; ?>

    </div>
    <div class="bodycontain">


        <div class="heading"><i class="fa fa-stethoscope" aria-hidden="true"></i> Xóa dụng cụ y tế</div>
        <div>Bạn có chắc không?</div>
        <form action="" class="form" method="post" onSubmit="alert('Đã xóa!!')" ;>
            <section>
                <dl>
                    <dd>
                        <input type="submit" name="Delete" value="Xóa" class="btn btn-green">
                        <a href="index.php" class="btn btn-green" style="background-color:red"><span>Quay lại</span></a>
                    </dd>
                </dl>
            </section>
        </form>
    </div>
</body>
<footer style="margin-top:10%">
    <?php include '../../templates/footer/footer.php'; ?>
</footer>