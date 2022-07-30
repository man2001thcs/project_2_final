<?php
require_once '../../../lib/config/const.php';
require_once '../../../lib/config/database.php';
require_once '../../../lib/controller/Helper.php';
require_once '../../../lib/model/User.php';
require_once '../../../lib/model/Temp_user.php';

if (!isset($user)) {
	$user = new User();
}

if (!$user->isLoggedIn() || !$user->isAdmin()) {
	Helper::redirect_err();
}

$temp_user = Temp_user();

$id = isset($_GET['id']) ? intval($_GET['id']) : null;

$temp = $temp_user->findById($id);

if ($_POST['submit']) {
	
	$data = $temp['TempUser'];
	$dataS = array(
		'User' => array(
			'email' => $data['email'],
			'password' => $data['password'],
			'fullname' => $data['fullname'],
			'address' => $data['address'],
			'phone_number' => $data['sdt'],
			'isAdmin' => $data['sdt'],
			'created' => date('Y-m-d H:i:s')
		)
	);
	
	
	if ($medicine->save($data)) {
		Helper::redirect('index.php');   	
    }
}

if (empty($id)) {
	Helper::redirect('page/admin/manage/accept_register.php');
}
if ($_POST){
	$temp_bill->deleteById($id);
	Helper::redirect('page/admin/manage/accept_register.php');

}


?>

<!DOCTYPE html>

<head>
    <title>Chỉnh sửa thông tin</title>
    <?php include "../../templates/css/css.php"; ?>
    <?php include "../../templates/js/js.php"; ?>

</head>

<body>
    <div>
        <?php include '../../templates/header/head.php'; ?>
    </div>
    <div class="bodycontain">


        <div class="heading"><i class="fa fa-medkit" aria-hidden="true"></i> Đồng ý đăng kí</div>
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