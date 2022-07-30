<?php
require_once '../../../lib/config/const.php';
require_once '../../../lib/config/database.php';
require_once '../../../lib/model/Buy_Log.php';
require_once '../../../lib/controller/Session.php';
require_once '../../../lib/model/User.php';
require_once '../../../lib/model/Medicine.php';

$links = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;
$limit = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 6;
$page  = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;

if (!isset($user)) {
	$user = new User();
}

if (!$user->isLoggedIn()) {
	Helper::redirect_err();
}

$buy_log = new Buy_Log();

/*$data = $medicine->find(array(
	'joins' => array(
		'movie_category' => array(
			'type' => 'INNER',
			'main_key' => 'category_id',
			'join_key' => 'id'
		)
	)
), 'all');
*/
//$data = $buy_log->findAll();
//Quản lý danh sách sản phẩm
?>
<!DOCTYPE html>
<title>Danh sách hóa đơn đặt hàng</title>
<?php include "../../templates/css/css.php"; ?>
<?php include "../../templates/js/js.php"; ?>

</head>

<body>
    <div>
        <?php include '../../templates/header/head.php'; ?>
    </div>
    <div class="bodycontain">

        <div class="heading">Danh sách hóa đơn đặt hàng</div>
        <div class="box_list">
            <ul class="con_medi">
                <?php 
			$buy_log->number_all_billM();
			$result = $buy_log->getDataWithConM( $limit, $page);
			//echo json_encode( $result);
			$data = $result->data; 
		if (!empty($data)) :
			//$country = unserialize(M_COUNTRY);
		?>
                <?php foreach ($data as $index => $_item) : 

			$item = $_item['WpBuyLog']; 
			if ($item['tool_id']!=0){continue;}

			$id = isset($item["medicine_id"]) ? intval($item["medicine_id"]) : null;
			$medicine = new Medicine_M();			
			$data1 = $medicine->findById($id);
			$data1 = $data1["WpMedicine"] ?? NULL;

			$userM = new User();
			$userM = $userM->findById_User($item['user_id']);
			$userM = $userM['User'];
			//echo json_encode($userM);
			
			?>
                <li class="box_medi" <?php echo $index % 2 == 1 ? 'odd' : ''; ?>>
                    <div class="detail_r">
                        <p class="title">Đơn id số: <?php echo $item['id'];?></p>
                        <div class="txt">
                            <p class="info"><span>ID hóa đơn:</span> <?php echo $item['id']; ?></p>
                            <p class="info"><span>Tài khoản người mua:</span> <?php echo $userM['email']; ?></p>
                            <p class="info"><span>Tên người mua:</span> <?php echo $userM['fullname']; ?></p>
                            <p class="info"><span>Tên thuốc:</span> <?php echo $data1['name'] ?? "NULL"; ?></p>
                            <p class="info"><span>Số lượng:</span> <?php echo $item['number']; ?></p>
                            <p class="info"><span>Giá đơn sản phẩm:</span>
                                <?php echo number_format($item['price'],0,",","."); ?> đồng</p>
                            <p class="info"><span>Tổng giá trị:</span>
                                <?php echo number_format($item['total_price'],0,",","."); ?> đồng</p>
                        </div>
                    </div>
                </li>
                <?php endforeach; ?>
                <?php else: ?>
                <h2>Không có sản phẩm tương tự</h2>
                <?php endif; ?>
            </ul>
        </div>
        <?php echo $buy_log->createLinks( $links, 'pagination'); ?>
    </div>

</body>
<footer>
    <?php include '../../templates/footer/footer.php'; ?>
</footer>

</html>