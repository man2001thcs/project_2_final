<?php
require_once '../../../lib/config/const.php';
require_once '../../../lib/config/database.php';
require_once '../../../lib/controller/Helper.php';
require_once '../../../lib/model/Tool.php';
require_once '../../../lib/model/User.php';

if (!isset($user)) {
	$user = new User();
}

if (!$user->isLoggedIn() || !$user->isAdmin()) {
	Helper::redirect_err();
}

$tool = new Tool();
$new_m =  $tool->findById_New();


$target_folder = "tool_img";

$save_name = $new_m;



if ($_POST) {


	$data = $_POST['data'];
	//echo json_encode($data);
	$data['WpTool']['created'] = date('Y-m-d H:i:s');
	$data['WpTool']['modified'] = date('Y-m-d H:i:s');


	if ($tool->save($data)) {
		Helper::redirect('index.php');
	}
}

?>
<!DOCTYPE html>

<head>
    <title>Tool Create</title>
    <?php include "../../templates/css/css.php"; ?>
    <?php include "../../templates/js/js.php"; ?>

</head>

<body>
    <div>
        <?php include '../../templates/header/head.php'; ?>
    </div>

    <div class="bodycontain" style="min-height: 550px ;">
        <div class="heading"><i class="fa fa-stethoscope" aria-hidden="true"></i> Nhập dụng cụ y tế</div>
        <form action="" class="form" method="post" enctype="multipart/form-data">
            <div class="row_queen">
                <div class="col_queen">
                    <section>
                        <dl>
                            <dt>
                                Tên sản phẩm
                            </dt>
                            <dd>
                                <?php echo $tool->form->input("name"); ?>
                                <?php echo $tool->form->error("name"); ?>
                            </dd>
                        </dl>
                    </section>
                    <section>
                        <dl>
                            <dt>
                                Giá
                            </dt>
                            <dd>
                                <?php echo $tool->form->input("price"); ?>
                                <?php echo $tool->form->error("price"); ?>
                            </dd>
                        </dl>
                    </section>
                    <section>
                        <dl>
                            <dt>
                                Số lượng hàng hiện tại
                            </dt>
                            <dd>
                                <?php echo $tool->form->input("remain_number"); ?>
                                <?php echo $tool->form->error("remain_number"); ?>
                            </dd>
                        </dl>
                    </section>
                    <section>
                        <dl>
                            <dt>
                                Nhà sản xuất
                            </dt>
                            <dd>
                                <?php echo $tool->form->input("manufacturer_id"); ?>
                                <?php echo $tool->form->error("manufacturer_id"); ?>
                            </dd>
                        </dl>
                    </section>
                </div>
                <div class="col_queen">
                    <section>
                        <dl>
                            <dt>
                                Cấu tạo
                            </dt>
                            <dd>
                                <?php echo $tool->form->input("description"); ?>
                                <?php echo $tool->form->error("description"); ?>
                            </dd>
                        </dl>
                    </section>
                    <section>
                        <dl>
                            <dt>
                                Hướng dẫn sử dụng
                            </dt>
                            <dd>
                                <?php echo $tool->form->input("manual"); ?>
                                <?php echo $tool->form->error("manual"); ?>
                            </dd>
                        </dl>
                    </section>
                    <section>
                        <dl>
                            <dt>
                                Công dụng
                            </dt>
                            <dd>
                                <?php echo $tool->form->input("described"); ?>
                                <?php echo $tool->form->error("described"); ?>
                            </dd>
                        </dl>
                    </section>
                    <?php include '../../../lib/images/save_img.php'; ?>
                </div>


            </div>
            <div class="row_queen">
                <section>
                    <dl>
                        <dd>
                            <input type="submit" name="submit" value="Tạo" class="btn btn-green">
                        </dd>
                    </dl>
                </section>
            </div>
        </form>

    </div>

</body>

<footer>
    <?php include '../../templates/footer/footer.php'; ?>
</footer>

</html>