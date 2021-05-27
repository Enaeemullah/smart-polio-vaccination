<?php 

$server ='localhost';
$user = 'root';
$pass = '';
$database = 'spvs';

$connection = mysqli_connect($server, $user, $pass, $database);

if (!$connection)
{
    echo "Datebase not connected";
}
?>