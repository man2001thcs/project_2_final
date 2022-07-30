<?php
require_once '../../../lib/config/const.php';
require_once '../../../lib/config/database.php';
require_once '../../../lib/model/Medicine.php';
require_once '../../../lib/controller/Session.php';
require_once '../../../lib/model/User.php';

?>
<!DOCTYPE html>

<head>
    <title>Medicine Create</title>
    <?php include "../../templates/css/css.php"; ?>
    <?php include "../../templates/js/js.php"; ?>

</head>

<body>
    <div>
        <?php include '../../templates/header/head.php'; ?>
    </div>

    <div class="bodycontain">
        <div class="heading">Về chúng tôi</div>
        <div class="box_list">
            <ul class="con_medi">

                <li class="box_medi">
                    <div class="detail_l">

                    </div>
                    <div class="detail_r">

                        <div class="txt">
                            <p class="info" style="font-size: 20px;"><span style="font-size: 20px;">Số điện
                                    thoại:</span> 0354324599</p>
                            <p class="info" style="font-size: 20px;"><span style="font-size: 20px;">Email:</span>
                                dochu8@gmail.com</p>
                            <p class="info" style="font-size: 20px;"><span style="font-size: 20px;">Địa chỉ:</span> Long
                                Biên, Hà Nội, Việt Nam</p>
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