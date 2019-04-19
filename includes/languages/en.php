<?php

	function lang($phrase){

		 $lang = array(

			//Dashboard Page

			'HOME'			=> 'ADMIN HOME',

			'cat'	 		=> 'Categories',

			'Dropdown_menu' => 'Hi ' . $_SESSION['logging'],

			'items'	 		=> 'ITEMS',

			'members'		=> 'MEMBERS',

			'statistics'	=> 'STATISTICS',
             
             'comments'     => 'Comments',

			'logs'	 		=> 'LOGS',

			//Settings

		);

		return $lang[$phrase];

	}