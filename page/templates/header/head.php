<?php
if (!isset($user)) {
	$user = new User();
}
?>

<header id="log">
    <div class="row">
        <div class="column1">
            <div class="logo" style="height:58px;">
                <img src="../../../lib/images/medicine_logo.png" width="45" />
                <div class="title"><a href="../../../page/main_page/main/list.php" style="color:white; text-decoration:none;">Medicine</a>
                </div>
                <div class="title" style="font-size:90%; ">Vietnam top 1 medicine website</div>

            </div>
        </div>
        <div class="column2">
            <?php 
                include '../../templates/header/account.php';
             ?>
        </div>
    </div>
</header>

<div class="drop_menu_t">
    <?php include '../../templates/header/sum_nav.php'; ?>
</div>

<header>
    <div class="image"><img src="../../../lib/images/background_t3.png" /></div>
</header>