<?php
class User {
    private int $id;
    private string $login;
    private string $email;
    private string $passwordHash;
    private string $firstName;
    private string $lastName;

    public function __construct(string $email, string $password) {
        $this->login = $email;
        $this->password_hash = password_hash($password, PASSWORD_ARGON2I);
        $this->$db = $db;
    }
    public function isAuth() {

    }
    public function login() {
        
    }
    public function logout() {
        
    }
    public function register() {
        
    }
}


?>