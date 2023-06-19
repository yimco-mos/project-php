
<?php 
include('config.php');
try{
    $conection = new PDO("mysql:host=$servidor;dbname=$db;charset=utf8", $username, $password);
} catch (Exception $e) {
    echo $e->getMessage();
}
?>