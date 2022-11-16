<?php
require('User.class.php');
$db = new mysqli('localhost', 'root', '', 'stronalogowanie');
$user = new User("123@gmail.com", "12341234");
$user->login();
var_dump($user);
?>