<?php
     require_once '../../../lib/model/User.php';  
	 if (!isset($user)) {
		$user = new User();
	} 
 ?>
 <?php
    $check = !empty($user->isLoggedIn()) ? $user->isAdmin() : 0;
	if ($check == 1){
		include '../../templates/header/gnav.php'; 
	} else {
		include '../../templates/header/f_gnav.php';
	}
   

?>
