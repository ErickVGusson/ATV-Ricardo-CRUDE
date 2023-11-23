<?php 

// Usado para conctar no banco
$host = "localhost";
$db_name = "php_beginner_crude_level_1";
$username = "root";
$password = "";

//Usado para mostrar erros
try {
    $con = new PDO("mysql:host={$host}; dbname={$db_name}", $username, $password);
} catch (PDOException $exception) {
    echo "Connection errors: " . $exception->getMessage();
}

?>