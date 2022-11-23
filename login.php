<?php
require_once('vendor/autoload.php');

require('User.class.php');
require('config.php');
//$db = new mysqli('localhost', 'root', '', 'stronalogowanie');
if(isset($_REQUEST['email']) && isset($_REQUEST['password']))
{
$email = $_REQUEST['email'];
$haslo = $_REQUEST['password'];
$user = new User($email, $haslo);

if($user->login()) {
    $message =  'Pomyslnie zalogowano:'.$user->getName();
    $twig->display('message.html.twig', ['message' => $message]);
    var_dump($user->login());
}
else {
    $twig->display('message.html.twig', ['message' => "nieprawidlowy email lub haslo"]);
    var_dump($user->login());
}

}
else {
    $twig->display('login.html.twig');
}
?>