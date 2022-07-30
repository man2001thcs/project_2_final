<?php
require_once '../../../lib/config/const.php';
require_once '../../../lib/config/database.php';
require_once '../../../lib/controller/Helper.php';
require_once '../../../lib/model/Tool.php';
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
$tool = new Tool();
$buy_log = new Buy_log();

$id = isset($_GET['id']) ? intval($_GET['id']) : null;

if (empty($id)) {
	Helper::redirect('page/product/tool');
}

/*$detail = $tool->find(array(
	'conditions' => array('Tool.id' => $id),
	'joins' => array(
		'tool_category' => array(
			'type' => 'INNER',
			'main_key' => 'category_id',
			'join_key' => 'id'
		)
	)
), 'first');
*/

$number = isset($_GET['numberIn']) ? intval($_GET['numberIn']) : null;
$detail = $tool->findById($id);
$code = $buy_log->verifyCode();

//echo json_encode($user->getCart());



if ($_POST) {
  $total_price = intval($_POST['price']) * intval($_POST['quantity']);
	$dataSub = array(
		'WpBuyLog' => array(
			'user_id' => $user->welcomeID(),
			'number' => $_POST['quantity'],
			'tool_id' => $_POST['id'],
			'medicine_id' => 0,
			'price' => $_POST['price'],
			'total_price' => $total_price
      )
		);
	//echo json_encode($dataSub);
	$user->addCart($dataSub);
  Helper::redirect('page/product/tool/list.php');
	

}


?>

<!DOCTYPE html>

<head>
    <title>Thông tin chi tiết</title>
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
        <?php $item_this = $detail['WpTool']; 
        $_SESSION['price'] = $item_this['price'];



        $id = isset($item_this["manufacturer_id"]) ? intval($item_this["manufacturer_id"]) : null;
        $manufacturer = new Manufacturer();
        $data1 = $manufacturer->findById($id);
        $data1 = $data1["WpManufacturer"] ?? NULL;

        //echo json_encode($user->getCart());
?>

        <link href="../../../css/product/card_detail.css" rel="stylesheet" type="text/css" media="all">
        <link href="../../../css/product/quantity_button.css" rel="stylesheet" type="text/css" media="all">
        <link href="../../../css/product/product_card.css" rel="stylesheet" type="text/css" media="all">
        <script src="../../../lib/script/quantity.js"></script>

        <div class="card">
            <div class="row_card">
                <div class="column_f">
                    <div class="card__body">

                        <div class="half">
                            <div class="featured_text">
                                <br>
                                <h2>Hãng: <span><?php echo $data1['name']; ?></span></h2>
                            </div>
                            <div class="image">
                                <img src=<?php echo Helper::return_img_T($item_this['id']);?> alt="">
                            </div>
                        </div>

                        <div class="half">
                            <div class="description">
                                <br>
                                <br>
                                <br>
                                <h2>Tên sản phẩm</h2>
                                <p style="font-weight: bold"><?php echo $item_this['name']; ?></p>
                            </div>
                            <div class="description">
                                <h2>Giá đơn sản phẩm</h2>
                                <p><?php echo number_format($item_this['price'],0,",","."); ?> Đồng</p>
                            </div>
                            <div class="description">
                                <h2>Công dụng</h2>
                                <p><?php echo nl2br($item_this['described']); ?></p>
                            </div>
                            <div class="description">
                                <h2>Tình trạng</h2>
                                <p><?php 
                                        if ($item_this['remain_number'] > 0)
                                           {
                                            echo $item_this['remain_number'] ." sản phẩm (Còn hàng)";
                                           } else {
                                            echo "Hết hàng";
                                           }?></p>
                            </div>

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
                                <button type="submit" class="active" name="buy_button" id="buy_button">Thêm vào giỏ
                                    hàng</button>
                                <?php 
                                    if ($item_this['remain_number'] <= 0)
                                        echo("<script> 
                                            $('#buy_button').attr('class', 'non_active');
                                        </script>");
                                 ?>
                                <button type="button" class="active" style="background-color: red;  border-color:red;"
                                    href="list.php">Quay về</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="column_s">
                    <h3 class="header_s">Sản phẩm đáng quan tâm</h3>
                    <div class="suggest">
                        <div class="row">
                            <?php 
		                  //$tool->number_All();
		                   $resultM = $tool->getDataRank( 5, 1);
		                   //echo json_encode( $result);
		                    $dataM = $resultM->data; 
		                   if (!empty($dataM)) :?>
                            <?php foreach ($dataM as $index => $_item) : $item = $_item['WpTool']; 
			                      $id = isset($item["manufacturer_id"]) ? intval($item["manufacturer_id"]) : null;
			                      $manufacturer = new Manufacturer();
			                      $data1 = $manufacturer->findById($id);
			                      $data1 = $data1["WpManufacturer"] ?? NULL;

			                   ?>
                            <div class="column">
                                <div class="outer">
                                    <div class="content">
                                        <div class="img_card">
                                            <a href="../tool/detail.php?id=<?php echo $item['id']; ?>">
                                                <img src=<?php echo Helper::return_img_T($item['id']);?> width="60%">
                                            </a>
                                        </div>
                                        <span class="bg animated fadeInDown">Dụng cụ y tế</span>
                                        <h2>Tên sản phẩm: <?php echo $item['name']; ?></h2>
                                        <h3>NSX: <?php echo $data1['name']; ?></h3>
                                        <div class="button">
                                            <a href="#"><?php echo number_format($item['price'],0,",","."); ?> đồng</a>
                                            <a class="cart-btn"
                                                href="../tool/detail.php?id=<?php echo $item['id']; ?>"><i
                                                    class="cart-icon ion-bag">
                                                </i>Chi tiết
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <?php else: ?>
                                <h2>Không có sản phẩm tương tự</h2>
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