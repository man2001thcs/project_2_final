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

$id = isset($_GET['id']) ? intval($_GET['id']) : null;

if (empty($id)) {
	Helper::redirect('medicine_type_s');
}

$medicine_type_s = new Medicine_type_s();
$data = $medicine_type_s->findById($id);
$success = false;

if ($_POST) {
	$data = $_POST['data'];
	$data['WpMedicineTypeS']['created'] = date('Y-m-d H:i:s');
	$data['WpMedicineTypeS']['modified'] = date('Y-m-d H:i:s');
	
	if ($medicine_type_s->save($data)) {
		header('Location: index.php');
	}
}
?>
<!DOCTYPE html>

<head>
    <title>Sửa thông tin loại thuốc</title>
    <?php include "../../templates/css/css.php"; ?>
    <?php include "../../templates/js/js.php"; ?>

</head>

<body>
    <div>
        <?php include '../../templates/header/head.php'; ?>
    </div>
    <div class="bodycontain">

        <div class="heading"><i class="fa fa-font-awesome" aria-hidden="true"></i> Sửa thông tin loại thuốc</div>
        <form action="" class="form" method="post">
            <?php echo $medicine_type_s->form->input('id'); ?>
            <section>
                <dl>
                    <dt>
                        Tên loại thuốc
                    </dt>
                    <dd>
                        <?php echo $medicine_type_s->form->input('name'); ?>
                        <?php echo $medicine_type_s->form->error('name'); ?>
                    </dd>
                </dl>
            </section>
            <section>
                <dl>
                    <dt>
                        Hỗ trợ chức năng
                    </dt>
                    <dd>
                        <?php echo $medicine_type_s->form->input('support'); ?>
                        <?php echo $medicine_type_s->form->error('support'); ?>
                    </dd>
                </dl>
            </section>
            <section>
                <dl>
                    <dd>
                        <input type="submit" name="submit" value="Save" class="btn btn-green">
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