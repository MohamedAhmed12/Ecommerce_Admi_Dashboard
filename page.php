<?php

	/*
		Categories => [ Manage | Edit | Update | Add | Insert | Delete | Stats ]
	*/

	$do = isset($_GET['action']) ? $_GET['action'] : 'Manage';

	// If The Page Is Main Page

	if($do == 'Manage'){

		echo 'Welcome You Are In Main Page';

	}elseif($do == 'Add'){

		echo 'Welcome You Are In add';

	}else{

		echo'Error There Is No Page With This Name';

	}