<?php
session_start();
require_once('vendor/autoload.php');
require_once('User.class.php');
require_once('config.php');
use Steampixel\Route;
function isAuth() {
    if(!isset($user)) {
        return;
    }
}
Route::add('/', function() {
    isAuth();
    echo "Strona główna";
    global $twig;
    $twig->display("home.html.twig", ['authorized' => $_SESSION]);
});

Route::add('/login', function() {
    global $twig;
    $twig->display("login.html.twig");
    
});
Route::add('/login', function() {
    echo "Przetwarzanie logowania";
    include('./login.php');
}, 'post');


Route::add('/register', function() {
    global $twig;
    $twig->display("register.html.twig");
});
Route::add('/register', function() {
    echo "Przetwarzanie rejstracji";
    include('./register.php');
}, 'post');
Route::add('/logout', function() {
   session_destroy(); 
   global $twig;
   $twig->display("message.html.twig", ['message' => 'Pomyślnie wylogowano']);
});

Route::run('/kacperhinz4gp/logowanie');
?>