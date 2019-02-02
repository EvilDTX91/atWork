<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';

$twig = new Twig_Environment(new Twig_Loader_Filesystem('template/'));

$template = $twig->load('base.twig');

$menuElements = [
    [
        'name' => 'Fooldal!',
        'href' => ''
    ],
    [
        'name' => 'Profile',
        'href' => 2
    ],
    [
        'name' => 'SendNews',
        'href' => 3
    ],
    [
        'name' => 'LogOut',
        'href' => 'userLogOut'
    ]
];

$twig->display('index.twig',
    [
        'index' => $template,
        'menuElements' => $menuElements
    ]);