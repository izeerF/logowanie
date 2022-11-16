<?php
class User {
    private $db;
    private int $id;
    private string $login;
    private string $email;
    private string $haslo;
    private string $imie;
    private string $nazwisko;

    public function __construct(string $email, string $haslo) {
        $this->email = $email;
        $this->haslo = $haslo;
        global $db;
        $this->db = &$db;
    }
    public function isAuth() : bool {
        if(isset($this->id) && $this->id != null) {
            return true;
        }
        else return false;
    }
    public function getMail() : string {
        return $this->email;
    }
    public function login() {
        $q = "SELECT * FROM uzytkownicy WHERE email = ? LIMIT 1";
        $preperedQ = $this->db->prepare($q);
        $preperedQ->bind_param('s', $this->email);
        $preperedQ->execute();
        $result = $preperedQ->get_result();
        $row = $result->fetch_assoc();
        if(password_verify($this->haslo, $row['haslo'])) {
            $this->id = $row['id'];
            $this->imie = $row['imie'];
            $this->nazwisko = $row['nazwisko'];
        }
    }
    public function logout() {
        $this->email = null;
        $this->login = null;
        $this->haslo = null;
        $this->id = null;
        $this->imie = null;
        $this->nazwisko = null;
    }
    public function register() {
        $q = 
            "INSERT INTO uzytkownicy 
            (id, email, haslo, login, imie, nazwisko)
            VALUES (NULL, ?, ?, ?, ?, ?)";
        $pQ = $this->db->prepare($q);
        $passwordHash = password_hash($this->haslo, PASSWORD_ARGON2I);
        if(!isset($this->imie))
            $this->imie = "";
        if(!isset($this->nazwisko))
            $this->nazwisko = "";
        $pQ -> bind_param("sssss", $this->email, $passwordHash, $this->login, $this->imie, $this->nazwisko);
        $pQ->execute();
    }
}


?>