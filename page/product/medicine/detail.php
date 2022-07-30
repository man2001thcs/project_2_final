<?php
require_once '../../../lib/config/const.php';
require_once '../../../lib/config/database.php';
require_once '../../../lib/controller/Helper.php';
require_once '../../../lib/model/Medicine.php';
require_once '../../../lib/model/Buy_log.php';
require_once '../../../lib/model/User.php';
require_once '../../../lib/model/User.php';

if (!isset($user)) {
	$user = new User();
}

if (!$user->isLoggedIn()) {
	Helper::redirect('page/user/log/login.php');
}

$user = new User();
$medicine = new Medicine_M();
$buy_log = new Buy_log();

$id = isset($_GET['id']) ? intval($_GET['id']) : null;

if (empty($id)) {
	Helper::redirect('page/product/medicine');
}

/*$detail = $medicine->find(array(
	'conditions' => array('Medicine.id' => $id),
	'joins' => array(
		'medicine_category' => array(
			'type' => 'INNER',
			'main_key' => 'category_id',
			'join_key' => 'id'
		)
	)
), 'first');
*/

$number = isset($_GET['numberIn']) ? intval($_GET['numberIn']) : null;
$detail = $medicine->findById($id);
$code = $buy_log->verifyCode();

//echo json_encode($user->getCart());



if ($_POST) {
  $total_price = intval($_POST['price']) * intval($_POST['quantity']);
	$dataSub = array(
		'WpBuyLog' => array(
			'user_id' => $user->welcomeID(),
			'number' => $_POST['quantity'],
			'medicine_id' => $_POST['id'],
			'tool_id' => 0,
			'price' => $_POST['price'],
			'total_price' => $total_price
      )
		);
	//echo json_encode($dataSub);
    if (intval($detail['WpMedicine']['remain_number']) >= intval($dataSub['WpBuyLog']['number'])){
        if ($user->addCart($dataSub)){
            Helper::redirect('page/product/medicine/list.php');
        }
    }
}


?>

<!DOCTYPE html>
<title>Thông tin chi tiết</title>

<head>
    <?php include "../../templates/css/css.php"; ?>
    <?php include "../../templates/js/js.php"; ?>

</head>

<body>

    <div>
        <?php include '../../templates/header/head.php'; ?>
    </div>


    <script type="text/javascript">
    function confirm_B() {
        if (confirm("Are you sure to do this??") === true) {
            return true;
        } else {
            return false;
        }
    }

    function getText() {
        var model = $('#house_model').val();
        alert(model);
    }
    </script>

    <div class="bodycontain">

        <?php if (!empty($detail)) :?>
        <?php $item_this = $detail['WpMedicine']; 
        $_SESSION['price'] = $item_this['price'];



        $id = isset($item_this["manufacturer_id"]) ? intval($item_this["manufacturer_id"]) : null;
        $manufacturer = new Manufacturer();
        $data1 = $manufacturer->findById($id);
        $data1 = $data1["WpManufacturer"] ?? NULL;

        $id = isset($item_this["type"]) ? intval($item_this["type"]) : null;
        $medicine_type_s = new Medicine_type_s();
        $data2 = $medicine_type_s->findById($id);
        $data2 = $data2["WpMedicineTypeS"] ?? NULL;
        //echo json_encode($user->getCart());
        ?>

        <link href="../../../css/product/card_detail.css" rel="stylesheet" type="text/css" media="all">
        <link href="../../../css/product/quantity_button.css" rel="stylesheet" type="text/css" media="all">
        <link href="../../../css/product/product_card.css" rel="stylesheet" type="text/css" media="all">
        <script src="../../../lib/script/quantity.js"></script>

        <!-- detail the product  -->

        <div class="card">
            <div class="row_card">
                <div class="column_f">
                    <div class="card__body">

                        <div class="half">
                            <div class="featured_text">
                                <br>
                                <h2>Hãng: <span><?php echo $data1['name']; ?></span></h2>
                                <h3>Loại thuốc: <span><?php echo $data2['name']; ?></span></h3>
                            </div>
                            <div class="image">
                                <img src=<?php echo Helper::return_img_M($item_this['id']);?> alt="">
                            </div>
                        </div>

                        <div class="half">
                            <div class="description">
                                <br>
                                <br>
                                <br>
                                <h2>Tên thuốc</h2>
                                <p style="font-weight: bold"><?php echo $item_this['name']; ?></p>
                            </div>
                            <div class="description">
                                <h2>Loại thuốc</h2>
                                <p><?php echo $data2['name']; ?></p>
                            </div>
                            <div class="description">
                                <h2>Hỗ trợ chức năng</h2>
                                <p><?php echo $data2['support']; ?></p>
                            </div>
                            <div class="description">
                                <h2>Công dụng</h2>
                                <p><?php echo nl2br($item_this['described']); ?></p>
                            </div>
                            <div class="description">
                                <h2>Giá đơn thuốc</h2>
                                <p><?php echo number_format($item_this['price'],0,",","."); ?> Đồng</p>
                            </div>
                            <div class="description">
                                <h2>Hạn sử dụng</h2>
                                <p><?php echo $item_this['HSD']; ?> tháng kể từ ngày sản xuất</p>
                            </div>
                            <div class="description">
                                <h2>Tình trạng</h2>
                                <p><?php 
                                        if ($item_this['remain_number'] > 0)
                                           {
                                            echo $item_this['remain_number'] ." hộp (Còn hàng)";
                                           } else echo "Hết hàng";?>
                                </p>
                            </div>

                             <!-- <div class="description">
                                <h2>Thành phần</h2>
                                <p><?php 
                                        if ($item_this['remain_number'] > 0)
                                           {
                                            echo $item_this['description'] ;
                                           } else echo "Hết hàng";?>
                                </p>
                            </div>  -->
                        </div>
                    </div>

                    <div class="card__footer">
                        <div class="recommend">
                            <p>Khuyên dùng</p>
                        </div>
                        <div class="action">
                            <form action="" method="post" onsubmit="alert('Thêm thành công!')">
                                <div class="quantity buttons_added">
                                    <input type="button" value="-" class="minus"><input type="number" step="1" min="1"
                                        max="" name="quantity" value="1" title="Qty" class="input-text qty text"
                                        size="4" pattern="" inputmode=""><input type="button" value="+" class="plus">
                                </div>
                                <input type="hidden" name="id" value=<?php echo $item_this['id'];?>>
                                <input type="hidden" name="price" value=<?php echo $item_this['price'];?>>
                                <input type="hidden" name="id" value=<?php echo $item_this['id'];?>>
                                <button type="submit" class="active" name="buy_button" id="buy_button">Thêm vào giỏ
                                    hàng</button>
                                <?php 
                                    if ($item_this['remain_number'] <= 0)
                                        echo("<script> 
                                            $('#buy_button').attr('class', 'non_active');
                                        </script>");
                                 ?>
                                <button type="button" class="active" style="background-color: red; border-color:red;"
                                    href="page/main_page/main/list.php">Quay về</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="column_s">
                    <h3 class="header_s">Sản phẩm tương tự</h3>
                    <div class="suggest">
                        <div class="row">
                            <?php 
		                  //$medicine->number_All();
		                   $resultM = $medicine->getDataSameType($item_this["type"], 5, 1);
		                   //echo json_encode( $result);
		                    $dataM = $resultM->data; 
		                   if (!empty($dataM)) :?>
                            <?php foreach ($dataM as $index => $_item) : $item = $_item['WpMedicine']; 
			                      $id = isset($item["manufacturer_id"]) ? intval($item["manufacturer_id"]) : null;
			                      $manufacturer = new Manufacturer();
			                      $data1 = $manufacturer->findById($id);
			                      $data1 = $data1["WpManufacturer"] ?? NULL;

			                      $id = isset($item["type"]) ? intval($item["type"]) : null;
			                      $medicine_type_s = new Medicine_type_s();
			                      $data2 = $medicine_type_s->findById($id);
			                      $data2 = $data2["WpMedicineTypeS"] ?? NULL;
			                   ?>
                            <div class="column">
                                <div class="outer">
                                    <div class="content">
                                        <div class="img_card">
                                            <a href="../medicine/detail.php?id=<?php echo $item['id']; ?>">
                                                <img src=<?php echo Helper::return_img_M($item['id']);?> width="60%">
                                            </a>
                                        </div>
                                        <span class="bg animated fadeInDown">Thuốc y tế</span>
                                        <span class="type animated fadeInDown"><?php echo $data2['name']; ?></span>
                                        <h2>Tên thuốc: <?php echo $item['name']; ?></h2>
                                        <h3>NSX: <?php echo $data1['name']; ?></h3>
                                        <div class="button">
                                            <a href="#"><?php echo number_format($item['price'],0,",","."); ?> đồng</a>
                                            <a class="cart-btn"
                                                href="../medicine/detail.php?id=<?php echo $item['id']; ?>"><i
                                                    class="cart-icon ion-bag">
                                                </i>Chi tiết
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <?php else: ?>
                            Chưa có dữ liệu.
                            <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row_card">
                <div class="column_f">
                    <?php
                    include '../../templates/product/description.php';  
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

<footer>
    <?php include '../../templates/footer/footer.php'; ?>
</footer>

</html>