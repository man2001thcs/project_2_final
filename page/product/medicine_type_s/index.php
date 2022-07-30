<?php
require_once '../../../lib/config/const.php';
require_once '../../../lib/config/database.php';
require_once '../../../lib/model/Medicine_type_s.php';
require_once '../../../lib/model/User.php';

$links = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;
$limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 6;
$page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;

if (!isset($user)) {
	$user = new User();
}

if (!$user->isLoggedIn() || !$user->isAdmin()) {
	Helper::redirect('page/404/404.php');
}

$medicine_type_s = new Medicine_type_s();
$data = array();
//$data = $medicine_type_s->findAll();
?>
<!DOCTYPE html>

<head>
    <title>Quản lý loại thuốc</title>
    <?php include "../../templates/css/css.php"; ?>
    <?php include "../../templates/js/js.php"; ?>

</head>

<body>
    <div>
        <?php include '../../templates/header/head.php'; ?>
    </div>
    <div class="bodycontain">


        <div class="heading"><i class="fa fa-font-awesome" aria-hidden="true"></i> Quản lý loại thuốc</div>
        <div class="box_table">
            <table>
                <colgroup>
                    <col width="10%">
                    <col width="70%">
                    <col width="20%">
                </colgroup>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên loại</th>
                        <th>Hỗ trợ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
			$medicine_type_s->number_All();
			 $result = $medicine_type_s->getData( $limit, $page);
			 //echo json_encode( $result);
			 $data = $result->data; 
			if (!empty($data)) : ?>
                    <?php foreach($data as $item):;?>
                    <?php //$item = $item["Medicine_type_s"] ?? NULL; ?>
                    <?php $item = $item["WpMedicineTypeS"];?>
                    <tr>
                        <td class="center">
                            <?php echo $item["id"] ?? ""; ?>
                        </td>
                        <td>
                            <?php echo $item["name"] ?? ""; ?>
                        </td>
                        <td>
                            <?php echo $item["support"] ?? ""; ?>
                        </td>
                        <td class="center">
                            <a href="edit.php?id=<?php echo $item["id"] ?? ""; ?>" class="popup active">Edit</a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php echo $medicine_type_s->createLinks( $links, 'pagination'); ?>
    </div>
</body>
<footer>
    <?php include '../../templates/footer/footer.php'; ?>
</footer>

</html>