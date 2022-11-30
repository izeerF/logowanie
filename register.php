<?php
require_once('vendor/autoload.php');

$loader = new Twig\Loader\FilesystemLoader('./templates/');

$twig = new Twig\Environment($loader);

$twig->display("register.html.twig", ['name' => "Kacper"]);


$db = new mysqli("localhost", "root", "", "stronalogowanie");
if (isset($_REQUEST['email'])) {
    $email = $_REQUEST['email'];
    $haslo = $_REQUEST['password'];
    $login = $_REQUEST['nick'];
    $imie = $_REQUEST['imie'];
    $nazwisko = $_REQUEST['nazwisko'];

    $user = new User($email, $haslo, $login);
    $user->register();
    var_dump($user->getMail());
    if($user->getMail()) {
        $twig->display('message.html.twig', ['message' => "Pomyślnie zarejestrowano"]);
    }
    else {
        $twig->display('register.html.twig', ['message' => "Rejstracja nie udana"]);
    }

}
else {
    die("Nie wypelniono rejstracji");
}
?>