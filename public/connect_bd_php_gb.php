<?php
$servername = "localhost";
$username = "root";
$password = "Qas6932";
$dbname = "php_gb";

// Создаем соединение
$connect = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($connect, "utf8");

// ПРоверяем соединение
if (!$connect) {
    die("Соединение с Базой данных не установлено!");
}
