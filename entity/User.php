<?php

class User {
    private int $id = 1;
    private string $pseudo = 'jean';
    private string $email = 'jean@mail.com';
    private string $password = 'password123';
    private DateTimeImmutable $createdAt;

    public function __construct($id, $pseudo, $email, $password) {
        $this->id=$id;
        $this->pseudo = $pseudo;
        $this->email = $email;
        $this->password = $password;
    }

    public function getId() : int {
        return $this->id;

    }
    public function getPseudo() : string {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo) : void {
        $this->pseudo = $pseudo;
    }
    public function getEmail() : string {
        return $this->email;
    }
    public function getPassword() : string {
        return $this->password;
    }

    public function setId (int $id) {
        $this->id = $id;
    }
    
}









//snake case user_controller
// kebab case user-controller
// camel case userController
// pascal case UserController

?>



