<?php
require_once '../../../lib/config/const.php';
require_once '../../../lib/config/database.php';
require_once '../../../lib/model/User.php';

$user = new User();
$user->logout();
header('Location: ../../../page/main_page/main/list.php');