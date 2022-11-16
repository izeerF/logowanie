<?php
$db = new mysqli("localhost", "root", "", "stronalogowanie");
if (isset($_REQUEST['email'])) {
    $email = $_REQUEST['email'];
    $haslo = $_REQUEST['password'];
    $login = $_REQUEST['nick'];
    $imie = $_REQUEST['imie'];
    $nazwisko = $_REQUEST['nazwisko'];

    $q = $db -> prepare(
        "INSERT INTO uzytkownicy 
        (id, email, haslo, login, imie, nazwisko)
        VALUES (NULL, ?, ?, ?, ?, ?)"
    );
    $q -> bind_param("sssss", $email, $haslo, $login, $imie, $nazwisko);

    $success = $q->execute();
    if($success) {
        echo("Pomyslnie zarejestrowano");
    }
    else {
        echo("Rejestracja nie udana"); 
    }

}
else {
    die("Nie wypelniono rejstracji");
}
?>