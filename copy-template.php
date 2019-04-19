<?php

	/*
	============================================================
	== Template Page
	============================================================
	*/

	ob_start(); // Output Buffering(saving) Start

	session_start();

	$pageTitle = '';

	if(isset ($_SESSION['logging'])){	
		
		include 'init.php'; 

		$do = isset($_GET['action']) ? $_GET['action'] : 'Manage';

		// Start Manage Page

		if($do == 'Manage'){ // Manage Mambers Page 

			echo 'welcome';

		}elseif($do =='Add'){  //Add Members Page

		}elseif($do == 'Insert') { // Insert Member Page

		}elseif($do == 'Edit') {// Edit page 

		}elseif($do == 'Update'){ // Update Page

		}elseif($do == 'Delete'){ // Delete Member Page

		}elseif($do == 'Activate'){ // Delete Member Page

		}

		include $tpl . 'footer.inc';

	}else{

		header('location: index.php');

		exit();

	}

	ob_end_flush(); // Release The Output

?>

