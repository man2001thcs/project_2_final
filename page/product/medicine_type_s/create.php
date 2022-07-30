<?php
require_once '../../../lib/config/const.php';
require_once '../../../lib/config/database.php';
require_once '../../../lib/model/Medicine_type_s.php';
require_once '../../../lib/model/User.php';

if (!isset($user)) {
	$user = new User();
}

if (!$user->isLoggedIn() || !$user->isAdmin()) {
	Helper::redirect('page/404/404.php');
}

$medicine_type_s = new Medicine_type_s();
$success = false;

if ($_POST) {
	$data = $_POST['data'];
	$data['WpMedicineTypeS']["created"] = date('Y-m-d H:i:s');
	$data['WpMedicineTypeS']["modified"] = date('Y-m-d H:i:s');
	
	if ($medicine_type_s->save($data) != true) {
		header('Location: index.php');
	}
}
?>
<!DOCTYPE html>

<head>
    <title>Nhập loại thuốc</title>
    <?php include "../../templates/css/css.php"; ?>
    <?php include "../../templates/js/js.php"; ?>

</head>

<body>
    <div>
        <?php include '../../templates/header/head.php'; ?>
    </div>
    <div class="bodycontain">


        <div class="heading"><i class="fa fa-font-awesome" aria-hidden="true"></i> Nhập loại thuốc</div>
        <form action="" class="form" method="post">
            <section>
                <dl>
                    <dt>
                        Tên loại thuốc
                    </dt>
                    <dd>
                        <?php echo $medicine_type_s->form->input("name"); ?>
                        <?php echo $medicine_type_s->form->error("name"); ?>
                    </dd>
                </dl>
            </section>
            <section>
                <dl>
                    <dt>
                        Hỗ trợ chức năng
                    </dt>
                    <dd>
                        <?php echo $medicine_type_s->form->input("support"); ?>
                        <?php echo $medicine_type_s->form->error("support"); ?>
                    </dd>
                </dl>
            </section>
            <section>
                <dl>
                    <dd>
                        <input type="submit" name="submit" value="Create" class="btn btn-green">
                    </dd>
                </dl>
            </section>
        </form>
    </div>
</body>
<footer>
    <?php include '../../templates/footer/footer.php'; ?>
</footer>

</html>