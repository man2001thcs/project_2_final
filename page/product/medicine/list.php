<?php
require_once '../../../lib/config/const.php';
require_once '../../../lib/config/database.php';
require_once '../../../lib/model/Medicine.php';
require_once '../../../lib/controller/Session.php';
require_once '../../../lib/model/User.php';


$links = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;
$limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 6;
$page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;

if (!isset($user)) {
	$user = new User();
}


$medicine = new Medicine_M();

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
//$data = $medicine->findAll();
?>
<!DOCTYPE html>

<head>
    <title>Danh sách thuốc</title>
    <?php include "../../templates/css/css.php"; ?>
    <?php include "../../templates/js/js.php"; ?>
</head>

<body>

    <div>
        <?php include '../../templates/header/head.php'; ?>
    </div>
    <div class="bodycontain">
        <?php include '../../templates/product/search_bar.php'; ?>
        <div class="heading"><i class="fa fa-medkit" aria-hidden="true"></i>
            Danh sách thuốc
        </div>

        <div class="box_list">
            <ul class="con_medi">
                <?php 
		    $medicine->number_All();
			$result = $medicine->getData( $limit, $page);
			//echo json_encode( $result);
			$data = $result->data; 
		    if (!empty($data)) :
			//$country = unserialize(M_COUNTRY);
		?>
                <?php foreach ($data as $index => $_item) : $item = $_item['WpMedicine']; 
			$id = isset($item["manufacturer_id"]) ? intval($item["manufacturer_id"]) : null;
			$manufacturer = new Manufacturer();
			$data1 = $manufacturer->findById($id);
			$data1 = $data1["WpManufacturer"] ?? NULL;

			$id = isset($item["type"]) ? intval($item["type"]) : null;
			$medicine_type_s = new Medicine_type_s();
			$data2 = $medicine_type_s->findById($id);
			$data2 = $data2["WpMedicineTypeS"] ?? NULL;
			?>
                <li class="box_medi" <?php echo $index % 2 == 1 ? 'odd' : ''; ?>>
                    <div class="detail_l">
                        <p>
                            <a href="detail.php?id=<?php echo $item['id']; ?>">
                                <img width="150px" height="170px" alt="" src=<?php echo Helper::return_img_M($item['id']);?>>
                            </a>

                        </p>
                    </div>
                    <div class="detail_r">
                        <p class="title"><a
                                href="detail.php?id=<?php echo $item['id']; ?>"><?php echo $item['name']; ?></a></p>
                        <div class="txt">
                            <p class="info"><span>Tên thuốc:</span> <?php echo $item['name']; ?></p>
                            <p class="info"><span>Giá:</span> <?php echo number_format($item['price'],0,",","."); ?>
                                Đồng</p>
                            <p class="info"><span>Nhà sản xuất:</span> <?php echo $data1['name'] ?? "NULL"; ?></p>
                            <p class="info"><span>Loại thuốc:</span> <?php echo $data2['name'] ?? "NULL"; ?></p>
                        </div>
                    </div>
                </li>
                <?php endforeach; ?>
                <?php else: ?>
                <h2 style="font-weight: bold;">Không có dữ liệu. <a href="create.php">Nhập mới</a> ngay!</h2>
                <?php endif; ?>
            </ul>
        </div>
        <?php echo $medicine->createLinks( $links, 'pagination'); ?>
    </div>

</body>
<footer>
    <?php include '../../templates/footer/footer.php'; ?>
</footer>

</html>