<?php
require_once '../../../lib/config/const.php';
require_once '../../../lib/config/database.php';
require_once '../../../lib/model/Tool.php';
require_once '../../../lib/controller/Session.php';
require_once '../../../lib/model/Manufacturer.php';
require_once '../../../lib/model/User.php';


$links = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;
$limit = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 6;
$page  = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;

if (!isset($user)) {
	$user = new User();
}

if (!$user->isLoggedIn() || !$user->isAdmin()) {
	Helper::redirect_err();
}

$tool = new Tool();
$data = array();
/*$data = $tool->find(array(
	'joins' => array(
		"wp_tool_type_s" => array(
			'type' => 'INNER',
			'main_key' => 'type',
			'join_key' => 'id'
		)
	)
), 'all');
*/

//$data = $tool->findByAll_num(6, 12);
?>
<!DOCTYPE html>

<head>
    <title>Quản lý thuốc</title>
    <?php include "../../templates/css/css.php"; ?>
    <?php include "../../templates/js/js.php"; ?>

</head>

<body>
    <div>
        <?php include '../../templates/header/head.php'; ?>
    </div>
    <div class="bodycontain">
        <div class="heading"><i class="fa fa-stethoscope" aria-hidden="true"></i> Quản lý dụng cụ y tế</div>

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
                    <col width="auto">
                    <col width="auto">
                </colgroup>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Công ty sản xuất</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
			     //$Paginator  = new Paginator( "WpTool", "wp_tool", $tool->number_All());
				 $tool->number_All();
				 $result = $tool->getData( $limit, $page);
				 //echo json_encode( $result);
				 $data = $result->data; 	    
			    if (!empty($data)) :
				//$country = unserialize(M_COUNTRY);
			?>
                    <?php 
				foreach ($data as $item) : $item = $item["WpTool"];
				//echo json_encode($item); 
				$id1 = isset($item["manufacturer_id"]) ? intval($item["manufacturer_id"]) : null;
				//echo $id;

				$manufacturer = new Manufacturer();
				$data1 = $manufacturer->findById($id1);
				$data1 = $data1["WpManufacturer"] ?? NULL;

				?>
                    <tr>
                        <td class="center">
                            <?php echo $item['id'] ?? ""; ?>
                        </td>
                        <td>
                            <?php echo $item['name'] ?? ""; ?>
                        </td>
                        <td>
                            <?php echo number_format($item['price'],0,",","."); ?> Đồng
                        </td>
                        <td>
                            <?php echo $data1['name'] ?? ""; ?>
                        </td>
                        <td class="center">
                            <a href="edit.php?id=<?php echo $item['id']; ?>" class="popup active">Chỉnh sửa</a>
                        </td>
                        <td class="center">
                            <form method="POST" action="delete.php?id=<?php echo $item['id']; ?>">
                                <button type="submit" class="popup active">Xóa</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="9">
                            <h2 style="font-weight: bold;">Không có dữ liệu. <a href="create.php">Nhập mới</a> ngay!
                            </h2>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php echo $tool->createLinks( $links, 'pagination'); ?>

    </div>
    </div>




</body>
<footer>
    <?php include '../../templates/footer/footer.php'; ?>
</footer>


</html>