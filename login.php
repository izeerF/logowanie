<?php
require_once('vendor/autoload.php');

require('config.php');
//$db = new mysqli('localhost', 'root', '', 'stronalogowanie');
if(isset($_REQUEST['email']) && isset($_REQUEST['password']))
{
$email = $_REQUEST['email'];
$haslo = $_REQUEST['password'];
$user = new User($email, $haslo);

if($user->login()) {
    $_SESSION['authorized'] = true;
    $v = array(
        'message' => 'Pomyslnie zalogowano: '.$user->getNick(),
        'authorized' => $_SESSION['authorized'],
    );
    $twig->display('message.html.twig', $v);
}
else {
    $twig->display('login.html.twig', ['message' => "nieprawidlowy email lub haslo"]);
    var_dump($user->login());
}

}
else {
    die("ERROR - no data");
}
?>