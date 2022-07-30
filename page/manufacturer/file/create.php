<?php
require_once '../../../lib/config/const.php';
require_once '../../../lib/config/database.php';
require_once '../../../lib/model/Manufacturer.php';
require_once '../../../lib/model/User.php';

if (!isset($user)) {
	$user = new User();
}

if (!$user->isLoggedIn() || !$user->isAdmin()) {
	Helper::redirect('page/404/404.php');
}

$manufacturer = new Manufacturer();
$success = false;

if ($_POST) {
	$data = $_POST['data'];
	$data['WpManufacturer']["created"] = date('Y-m-d H:i:s');
	$data['WpManufacturer']["modified"] = date('Y-m-d H:i:s');
	
	if ($manufacturer->save($data) != true) {
		header('Location: index.php');
	}
}
?>
<!DOCTYPE html>

<head>
    <title>Nhập nhà sản xuất</title>
    <?php include "../../templates/css/css.php"; ?>
    <?php include "../../templates/js/js.php"; ?>

</head>

<body>
    <div>
        <?php include '../../templates/header/head.php'; ?>
    </div>
    <div class="bodycontain">

        <div class="heading">Nhập nhà sản xuất</div>
        <form action="" class="form" method="post">
            <section>
                <dl>
                    <dt>
                        Tên nhà sản xuất
                    </dt>
                    <dd>
                        <?php echo $manufacturer->form->input("name"); ?>
                        <?php echo $manufacturer->form->error("name"); ?>
                    </dd>
                </dl>
            </section>
            <section>
                <dl>
                    <dt>
                        Địa chỉ
                    </dt>
                    <dd>
                        <?php echo $manufacturer->form->input("address"); ?>
                        <?php echo $manufacturer->form->error("address"); ?>
                    </dd>
                </dl>
            </section>
            <section>
                <dl>
                    <dt>
                        Điện thoại
                    </dt>
                    <dd>
                        <?php echo $manufacturer->form->input("phone"); ?>
                        <?php echo $manufacturer->form->error("phone"); ?>
                    </dd>
                </dl>
            </section>
            <section>
                <dl>
                    <dt>
                        Chuyên ngành
                    </dt>
                    <dd>
                        <?php echo $manufacturer->form->input("specialization"); ?>
                        <?php echo $manufacturer->form->error("specialization"); ?>
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