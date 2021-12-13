<?php

use Twig\Loader\FilesystemLoader;
use Twig\TwigFilter;

require_once 'connect_bd_php_gb.php';
require_once '../vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader);

$twig->addGlobal('title', 'Big Photo');

$template = $twig->load('bigImage.html.twig');

require_once 'connect_bd_php_gb.php';

if (isset($_GET['id'])) {
    $imageId = $_GET['id']; //Получаем id картинки из GET запроса
    $queryCount = "UPDATE images SET vote_count = vote_count + 1 WHERE id = $imageId";
    mysqli_query($connect, $queryCount); // Обновляем счетчик просмотрров в БД
    $queryImageId = "SELECT * FROM images WHERE id = $imageId";
    $res = mysqli_query($connect, $queryImageId); // получаем ссылку на данные из БД по id картинки
    $image = mysqli_fetch_assoc($res); // преобразуем полученную ссылку в массив данных

}

echo $template->render([
    'image' => $image
]);
