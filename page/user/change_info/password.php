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
	Helper::redirect('page/main_page/main/list.php');
}


$user_info = $user->findById($id);
$user->findById($id);

if (isset($_POST['Change'])){
	$data = $_POST['data'];
	if ($data['User']['passwordNew'] != $data['User']['re_passwordNew']){
		echo '<script type="text/javascript">
			alert("Mật khẩu mới không khớp!!");
		</script>';
	}

	if (Helper::hash($data['User']['password']) != $user_info['User']['password']){
		echo '<script type="text/javascript">
				 alert("Mật khẩu cũ sai!!");
		</script>';	 
	}

	if ((Helper::hash($data['User']['password']) == $user_info['User']['password']) &&
		    (Helper::hash($data['User']['password']) == $user_info['User']['password'])){
		$dataS = array(
		'User' => array(		
			'id' => $id,	
			'password' => Helper::hash($data['User']['passwordNew'])
		)
	);
	    if ($user->save($dataS)) {
			echo '<script type="text/javascript">
				 alert("Thay đổi thành công!!");
		</script>';
	    }
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
        <div class="heading"><i class="fa fa-key" aria-hidden="true"></i> Đổi mật khẩu</div>
        <form action="" class="form" method="post">
            <?php echo $user->form->input('id'); ?>
            <section>
                <dl>
                    <dt>
                        Mật khẩu mới
                    </dt>
                    <dd>
                        <?php echo $user->form->input('passwordNew'); ?>
                        <?php echo $user->form->error('passwordNew'); ?>
                    </dd>
                </dl>
            </section>
            <section>
                <dl>
                    <dt>
                        Nhập lại mật khẩu
                    </dt>
                    <dd>
                        <?php echo $user->form->input('re_passwordNew'); ?>
                        <?php echo $user->form->error('re_passwordNew'); ?>
                    </dd>
                </dl>
            </section>
            <section>
                <dl>
                    <dt style=": 200px;">
                        Xác nhận mật khẩu cũ
                    </dt>
                    <dd>
                        <?php echo $user->form->input('password'); ?>
                        <?php echo $user->form->error('password'); ?>
                    </dd>
                </dl>
            </section>
            <section>
                <dl>
                    <dd>
                        <input type="submit" name="Change" value="Change" class="btn btn-green">
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