<?php
require_once '../../../lib/config/const.php';
require_once '../../../lib/config/database.php';
require_once '../../../lib/model/Buy_Log.php';
require_once '../../../lib/controller/Session.php';
require_once '../../../lib/model/User.php';
require_once '../../../lib/model/Medicine.php';
require_once '../../../lib/model/Tool.php';

if (!isset($user)) {
	$user = new User();
}

if (!$user->isLoggedIn()) {
	Helper::redirect_err();
}

$buy_log = new Buy_Log();
$code = $buy_log->verifyCode();

?>

<!DOCTYPE html>

<head>
    <title>Shopping cart</title>
    <?php include "../../templates/css/css.php"; ?>
    <?php include "../../templates/js/js.php"; ?>
</head>

<body>

    <div>
        <?php include '../../templates/header/head.php'; ?>
    </div>

    <link href="../../../css/shopping_cart/shop_cart.css" rel="stylesheet" type="text/css" media="all">
    <script src="../../../lib/script/shopping_cart.js"></script>

    <div class="bodycontain">
        <main>
            <div class="basket">
                <div class="basket-module">
                    <label for="promo-code">Điền địa chỉ giao hàng</label>
                    <input id="promo-code" type="text" name="promo-code" maxlength="5" class="promo-code-field">
                    <button class="promo-code-cta">Ok</button>
                </div>
                <?php //label ?>
                <div class="basket-labels">
                    <ul>
                        <li class="item item-heading"><strong>ID sản phẩm</strong></li>
                        <li class="price"><strong>Giá đơn sản phẩm</strong></li>
                        <li class="quantity"><strong>Số lượng</strong></li>
                        <li class="subtotal"><strong>Tổng giá trị</strong></li>
                    </ul>
                </div>


                <?php //product shopping card 
      if (!empty($user->getCart())): ?>

                <?php 
       $data = $user->getCart();
       foreach ($data as $_item) :?>
                <?php 
	        		  $_item['stt'];
		        	  $item = $_item['WpBuyLog'];

		        	  if ($item['tool_id']==0){
                      //medicine bill
                        $id = isset($item["medicine_id"]) ? intval($item["medicine_id"]) : null;
                        $link_img = Helper::return_img_M($id);
                        $medicine = new Medicine_M();			
                        $data1 = $medicine->findById($id);
                        $data1 = $data1["WpMedicine"] ?? NULL;
                    } else {
                        //tool bill
                        $id = isset($item["tool_id"]) ? intval($item["tool_id"]) : null;
                        $link_img = Helper::return_img_T($id);
                        $tool = new Tool();			
                        $data1 = $tool->findById($id);
                        $data1 = $data1["WpTool"] ?? NULL;
			}

			?>

                <!-- HTML code shopping product card -->
                <div class="basket-product">
                    <div class="item">
                        <div class="product-image">
                            <img src=<?php echo $link_img; ?> alt="Placholder Image 2" class="product-frame">
                        </div>
                        <div class="product-details">
                            <h1><strong><span class="item-quantity"><?php echo $item['number']; ?></span> x </strong>
                                <?php echo $data1['name'] ?? "NULL"; ?></h1>
                            <p><strong>Mã id: <?php echo $id; ?></strong></p>
                        </div>
                    </div>
                    <div class="price"> <?php echo number_format($item['price'],0,",","."); ?></div>
                    <div class="quantity">
                        <input disabled type="number" value=<?php echo $item['number']; ?> min="1"
                            class="quantity-field">
                    </div>
                    <div class="subtotal"><?php echo number_format($item['price'] * $item['number'],0,",","."); ?></div>
                    <div class="remove">
                        <form method="post" action="delete.php?stt=<?php echo $_item['stt']; ?>">
                            <button type="submit">Remove</button>
                        </form>
                    </div>
                </div>

                <?php endforeach; ?>
                <?php else: ?>
                <div class="basket-product">
                    <div class="item">
                        <div class="product-details">
                            <p><strong>Trống, vui lòng thêm item để thanh toán.</strong></p>
                        </div>
                    </div>

                </div>
                <?php endif; ?>


                <!-- Price summary -->
            </div>
            <aside>
                <div class="summary">
                    <div class="summary-total-items"><span class="total-items"></span> item trong Cart <a
                            href="../../main_page/main/list.php">Quay lại</a></div>
                    <div class="summary-subtotal">
                        <div class="subtotal-title">Tổng giá trị</div>
                        <div class="subtotal-value final-value" id="basket-subtotal">
                            <?php echo number_format($user->Cart_total_money(),0,",",".");?></div>
                        <div class="summary-promo hide">
                            <div class="promo-title">Promotion</div>
                            <div class="promo-value final-value" id="basket-promo"></div>
                        </div>
                    </div>

                    <form action="create_order.php" method="post">
                        <input type="hidden" id="code" name="code" value=<?php echo $code;?>>
                        <div class="summary-delivery">
                            <select name="delivery-collection" class="summary-delivery-selection">
                                <option value="Express">Express</option>
                                <option value="Shoppee">Shoppe Delivery</option>
                            </select>
                        </div>
                        <div class="summary-total">
                            <div class="total-title">Tổng giá trị</div>
                            <div class="total-value final-value" id="basket-total">
                                <?php echo number_format($user->Cart_total_money(),0,",",".");?></div>
                        </div>
                        <div class="summary-checkout">
                            <button class="checkout-cta" name="pay_button" type="submit">Hoàn tất hóa đơn</button>
                        </div>
                    </form>
                </div>
    </div>
    </aside>
    </main>

    </div>
</body>

<footer>
    <?php include '../../templates/footer/footer.php'; ?>
</footer>

</html>