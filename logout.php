<?php 
session_start();
session_unset();
session_destroy();


header("Location: http://localhost/YAZWarehouse/view/login.php");
exit();