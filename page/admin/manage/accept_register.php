<?php
require_once '../../../lib/config/const.php';
require_once '../../../lib/config/database.php';
require_once '../../../lib/model/User.php';
require_once '../../../lib/model/Temp_user.php';

if (!isset($user)) {
	$user = new User();
}

if (!$user->isLoggedIn() || !$user->isAdmin()) {
	Helper::redirect_err();
}

$temp_user = new Temp_user();


$data = $temp_user->findAll();

if (isset($_POST['accept'])) {
	
    $data1 = $_POST['data'];
    $is_admin = $data1['TempUser']['type'];

    $temp = $temp_user->findById($_POST['id_user']);
	$data2 = $temp['TempUser'];

    //echo json_encode($data2);
	$dataS = array(
		'User' => array(
			'email' => $data2['email'],
			'password' => $data2['password'],
			'fullname' => $data2['fullname'],
			'address' => $data2['address'],
			'phone_number' => $data2['phone_number'],
			'is_admin' => ($is_admin),
            'created' => date('Y-m-d H:i:s'),
            //'created' => $data2['created'],
			'modified' => date('Y-m-d H:i:s')
		)
	);
	
	if ($user->save($dataS)) {
        if($temp_user->deleteById($_POST['id_user'])){
            Helper::redirect('page/admin/manage/index.php');         
        }	 	
    }
}

?>
<!DOCTYPE html>
<title>Đăng kí người dùng</title>

<head>
    <?php include "../../templates/css/css.php"; ?>
    <?php include "../../templates/js/js.php"; ?>

</head>

<body>
    <div>
        <?php include '../../templates/header/head.php'; ?>
    </div>
    <div class="bodycontain">
        <div class="heading">Đăng kí người dùng</div>
        <div class="box_table">
            <table>
                <colgroup>
                    <col width="auto">
                    <col width="auto">
                    <col width="auto">
                    <col width="auto">
                    <col width="auto">
                    <col width="auto">
                    <col width="auto">
                    <col width="auto">
                </colgroup>
                <thead>
                    <tr>
                        <th>Ngày tạo</th>
                        <th>Email</th>
                        <th>Tên</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Vai trò</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($data)) : ?>
                    <?php foreach ($data as $item) : 
				    $item = $item['TempUser'];
					 ?>
                    <tr>
                        <td class="center">
                            <?php echo date('Y/m/d H:i:s', strtotime($item['created'])); ?>
                        </td>
                        <td>
                            <?php echo $item['email']; ?>
                        </td>
                        <td>
                            <?php echo $item['fullname']; ?>
                        </td>
                        <td>
                            <?php echo $item['address']; ?>
                        </td>
                        <td>
                            <?php echo $item['phone_number']; ?>
                        </td>
                        <form action="" class="form" method="post">
                            <input type="hidden" id="id_user" name="id_user" value=<?php echo $item['id'];?>>
                            <td>
                                <?php echo $temp_user->form->input("type"); ?>
                                <?php echo $temp_user->form->error("type"); ?>
                            </td>
                            <td class="center">
                                <button type="submit" name="accept" id="accept" class="popup active" style="background-color:blue;">Xác nhận</button>
                            </td>
                        </form>

                        <td class="center">
                            <form method="POST" action="delete.php?id=<?php echo $item['id']; ?>">
                                <button type="submit" class="popup active">Xóa</button>
                            </form>
                        </td>


                    </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <h2 style="font-weight: bold;">Không có dữ liệu.</h2>
                    <?php endif; ?>

                </tbody>
            </table>
        </div>
    </div>
</body>

<footer>
    <?php include '../../templates/footer/footer.php'; ?>
</footer>

</html>