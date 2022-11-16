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
        $this->password = $password;
        global $db;
        $this->$db = $db;
    }
    public function isAuth() : bool {
        if(isset($this->id) && $this->id != null) {
            return true;
        }
        else return false;
    }
    public function login() {
        $q = "SELECT * FROM uzytkownicy WHERE email = ? LIMIT 1";
        $preperedQ = $this->db->prepare($q);
        $preperedQ->bind_param('s', $this->email);
        $preperedQ->execute();
        $result = $preperedQ->get_result();
    }
    public function logout() {
        
    }
    public function register() {
        
    }
}


?>