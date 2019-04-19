<?php

	session_start(); // Start The Session

	session_unset(); // Unset The Session

	session_destroy(); // Dstroy The Session

	header('location: index.php');

	exit();