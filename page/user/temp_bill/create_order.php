<?php
require_once '../../../lib/config/const.php';
require_once '../../../lib/config/database.php';
require_once '../../../lib/controller/Helper.php';
require_once '../../../lib/model/Medicine.php';
require_once '../../../lib/model/Tool.php';
require_once '../../../lib/model/Buy_log.php';
require_once '../../../lib/model/User.php';

if (!isset($user)) {
	$user = new User();
}

if (!$user->isLoggedIn()) {
	Helper::redirect_err();
}

$buy_log = new Buy_log();
//$calendar = new Calendar();
$medicine = new Medicine_M();
$tool = new Tool();
$transport = $_POST['delivery-collection'] ?? null;


//echo $total_price;

//$created = isset($_GET['created']) ? $_GET['created'] : null;

$code = isset($_POST['code']) ? $_POST['code'] : null;

if (empty($code) || empty($user->getCart())) {
	Helper::redirect('page/main_page/main/list.php');
}

$day = date('Y-m-d H:i:s');
$data = $user->getCart();

if ($_POST) {
	//if($buy_log->save($data));
}




?>

<!DOCTYPE html>

<head>
    <title>Thông tin thanh toán</title>
    <?php include "../../templates/css/css.php"; ?>
    <?php include "../../templates/js/js.php"; ?>

</head>

<body>
    <div>
        <?php include '../../templates/header/head.php'; ?>
    </div>
    <div class="bodycontain">

        <script type="text/javascript">
        function success() {
            alert("Đặt đơn thành công!! Code: <?php echo $code; ?>");
            document.getElementById("infos").style.display = "none";
        }
        </script>

        <div class="heading"><i class="fa fa-font-awesome" aria-hidden="true"></i> Thông tin hóa đơn:</div>
        <div class="box_list">
            <ul class="con_medi">
                <li class="box_medi">
                    <div class="detail_r">
                        <?php foreach($data as $_item):
					$item = $_item['WpBuyLog']; 
					$item['code'] = $code;
					$item['created'] = $day;					
					$dataS = array(
						'WpBuyLog' => array(
							'user_id' => $user->welcomeID(),
							'number' => $item['number'],
							'medicine_id' => $item['medicine_id'],
							'tool_id' => $item['tool_id'],
							'price' => $item['price'],
							'created' => $item['created'],
							'transport' => $transport,
							'total_price' => ($item['number'] * $item['price']),
							'code' => $item['code']
						)
					);
					//echo json_encode($item);
					if ($buy_log->save($dataS)){
							$item = $dataS['WpBuyLog'];
							if ($item['medicine_id'] == 0){
								$data_tool = $tool->findById($item['tool_id']);
								$data_tool['WpTool']['remain_number'] = $data_tool['WpTool']['remain_number'] - $item['number']; 
								$data_tool['WpTool']['bought_number'] = $data_tool['WpTool']['bought_number'] + $item['number']; 
								if ($tool->save($data_tool)){
									//echo $item['tool_id'];
								    //echo $data_medicine['WpTool']['remain_number'];
								} else {
									echo $item['tool_id'];
								    echo $data_tool['WpTool']['remain_number'];
									echo $data_tool['WpTool']['bought_number'];
									echo "fail";
								}

							} else if ($item['tool_id'] == 0){
								$data_medicine = $medicine->findById($item['medicine_id']);
								$data_medicine['WpMedicine']['remain_number'] = $data_medicine['WpMedicine']['remain_number'] - $item['number']; 
								$data_medicine['WpMedicine']['bought_number'] = $data_medicine['WpMedicine']['bought_number'] + $item['number']; 
								if ($medicine->save($data_medicine)){
									//echo $item['medicine_id'];
								    //echo $data_medicine['WpMedicine']['remain_number'];
								}
								
							}
						$user->destroyCart();
					}
					
					?>

                        <div class="txt" id="infos">
                            <p class="info"><span>Mã id sản phẩm:</span>
                                <?php echo ($item['medicine_id'] == 0) ? $item['tool_id'] : $item['medicine_id']; ?></p>
                            <p class="info"><span>Giá:</span> <?php echo number_format($item['price'],0,",","."); ?>
                                Đồng</p>
                            <p class="info"><span>Ngày:</span> <?php echo $day; ?></p>
                            <p class="info"><span>Số lượng:</span> <?php echo $item['number']; ?></p>
                            <?php endforeach; ?>
                        </div>
                        <br />
                        <br />
                        <div class="txt" id="infos">
                            <a class="btn btn-green" href="/medical_product.com/page/main_page/main/list.php"
                                style="background-color: red; padding: 10px; border-radius: 10px; color: white;"> Quay
                                lại </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</body>
<footer>
    <?php include '../../templates/footer/footer.php'; ?>
</footer>

</html>