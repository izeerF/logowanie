<?php
require_once('vendor/autoload.php');
require_once('User.class.php');
$db = new mysqli('localhost', 'root', '', 'stronalogowanie');
$loader = new \Twig\Loader\FilesystemLoader('./templates');
$twig = new \Twig\Environment($loader);
?>
