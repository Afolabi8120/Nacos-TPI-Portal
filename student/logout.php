<?php
	require('../core/init.php');;
	session_destroy();

	header('location: ../auth/login');

?>