<?php 

session_start(); 


unset($_SESSION['type_id']);

session_destroy(); 

header("Location: ../parents_login.php");
exit();

?>