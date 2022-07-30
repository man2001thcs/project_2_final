<?php
require_once '../../../lib/config/const.php';
require_once '../../../lib/config/database.php';
require_once '../../../lib/controller/Helper.php';
require_once '../../../lib/model/User.php';

if (!isset($user)) {
	$user = new User();
}

if (!$user->isLoggedIn()) {
	Helper::redirect_err();
}

$id = $user->welcomeID();

if (empty($id)) {
	//Helper::redirect('index.php');
}


$user_info = $user->findById($id);
$user->findById($id);

    if (isset($_POST['Save'])){
		$data = $_POST['data'];	
		$dataS = array(
			'User' => array(
				'id' => $id,		
				'address' => $data['User']['address'],
				'fullname' => $data['User']['fullname'],
                'phone_number' => $data['User']['phone_number']
			)
		);
		
	    if ($user->save($dataS)) {
			echo '<script type="text/javascript">
				 alert("Thay đổi thành công!!");
		</script>';
	    }
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


        <div class="heading"><i class="fa fa-address-card" aria-hidden="true"></i> Chỉnh sửa thông tin</div>
        <form action="" class="form" method="post">
            <?php echo $user->form->input('id'); ?>
            <section>
                <dl>
                    <dt>
                        Tên
                    </dt>
                    <dd>
                        <?php echo $user->form->input('fullname'); ?>
                        <?php echo $user->form->error('fullname'); ?>
                    </dd>
                </dl>
            </section>
            <section>
                <dl>
                    <dt>
                        Địa chỉ
                    </dt>
                    <dd>
                        <?php echo $user->form->input('address'); ?>
                        <?php echo $user->form->error('address'); ?>
                    </dd>
                </dl>
            </section>
            <section>
                <dl>
                    <dt>
                        Số điện thoại
                    </dt>
                    <dd>
                        <?php echo $user->form->input('phone_number'); ?>
                        <?php echo $user->form->error('phone_number'); ?>
                    </dd>
                </dl>
            </section>
            <section>
                <dl>
                    <dd>
                        <input type="submit" name="Save" value="Save" class="btn btn-green">
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