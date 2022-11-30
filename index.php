<?php
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
    include('./register.php');
});

Route::run('/kacperhinz4gp/logowanie');
?>