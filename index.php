<?php
require_once 'lib/config/const.php';
require_once 'lib/config/database.php';
require_once 'lib/model/User.php';

$user = new User();

if ($user->isLoggedIn()) {
	if ($user->isAdmin()) {
		header('Location: ./page/main_page/main/list.php');
	} else {
		header('Location: ./page/product/medicine/list.php');
	}
} else {
	header('Location: ./page/main_page/main/list.php');
}