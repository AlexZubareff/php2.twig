<?php

use Twig\Loader\FilesystemLoader;
use Twig\TwigFilter;

require_once 'connect_bd_php_gb.php';
require_once '../vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader);

$twig->addGlobal('title', 'Photo Galery');

$template = $twig->load('images.html.twig');

if ($connect) {
    $querySelectImages = "SELECT * FROM images ORDER BY vote_count DESC";

    $res = mysqli_query($connect, $querySelectImages); // Получаем ссылку на данные из БД
    $images = [];
    while ($row = mysqli_fetch_assoc($res)) {          // Преобразуем в массив
        $images[] = $row;
    }
}

echo $template->render([
    'images' => $images
]);
