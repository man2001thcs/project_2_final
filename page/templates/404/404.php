<?php
require_once '../../../lib/config/const.php';
require_once '../../../lib/config/database.php';
require_once '../../../lib/model/User.php';
if (!isset($user)) {
	$user = new User();
}

?>
<!DOCTYPE html>

<head>
    <title>404</title>
    <?php include "../../templates/css/css.php"; ?>
    <?php include "../../templates/js/js.php"; ?>

</head>

<body>
    <div>
        <?php include '../../templates/header/head.php'; ?>
    </div>
    <div class="bodycontain">
        <div class="heading"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> 404: Lỗi không thể truy cập
        </div>

        <div class="img404">
            <img src="../../../lib/images/404.png" style="width: 100%;">
        </div>
    </div>
    </div>
</body>
<footer>
    <?php include '../../templates/footer/footer.php'; ?>
</footer>

</html>