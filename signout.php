<?php 

session_start(); 


unset($_SESSION['user_id']);
unset($_SESSION['user_name']);
unset($_SESSION['cnic']);
unset($_SESSION['role_id']);
unset($_SESSION['type_id']);
unset($_SESSION['family_number']);
unset($_SESSION['team_number']);

session_destroy(); 

header("Location: parents_login.php");
exit();

?>