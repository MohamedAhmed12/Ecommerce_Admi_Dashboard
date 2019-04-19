<?php
	
	include 'connect.php';

	//Routes

	$tpl 	= 'includes/templates/'; // Template Directory
	$lang  	= 'includes/languages/'; // Language Directory
	$func 	= 'includes/functions/'; // Functions Directory
	$css	= 'layout/css/'; // Style Directory
	$js 	= 'layout/js/'; // js Directory

	

	// Include The Important Files

	include $func . 'functions.php';
	include $lang . 'en.php'; // language first because the header will have words written by this language
	include $tpl . 'header.inc';

	// Include Navbar In All Pages Except The one With $noNavbar Variable

	if(!isset($noNavbar)){include $tpl . 'navbar.php';};


    /**
    * Use faker Liberary to create dummy data to insert into data base
    */

    // require the Faker autoloader
    //dirname(__FILE__) the parent directory path
    $shit = require_once dirname(__FILE__) . '/includes/liberaries/vendor/fzaninotto/Faker/src/autoload.php';

    // use the factory to create a Faker\Generator instance
    $faker = Faker\Factory::create();