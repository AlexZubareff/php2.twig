<?php
use Twig\Loader\FilesystemLoader;
use Twig\TwigFilter;
require_once 'connect_bd_php_gb.php';
require_once '../vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader);

$filter = new TwigFilter('rot13', function($string){
    $string = '**' . str_rot13($string) . '**';
    return $string;
});
$twig->addFilter($filter);
$twig->addGlobal('title', 'Title Global');

$template = $twig->load('images.html.twig');

$users = [
    [
        'username'=> 'Alex',
        'email'=>'123@123.ru'
    ],
    [
        'username'=> 'Nike',
        'email'=>'789@mail.ru'
    ]
];
echo $template->render([
      'users' => $users
]);
