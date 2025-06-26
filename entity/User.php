<?php

class User {
    private int $id = 1;
    private string $pseudo = 'jean';
    private string $email = 'jean@mail.com';
    private string $password = 'password123';
    private DateTimeImmutable $createdAt;

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

$user = new User();
$user2 = new User();

echo $user->getId(). '<br>';
echo $user->setId(12). '<br>';
echo $user2->getId(). '<br>'; 
echo $user2->setId(2);
echo $user2->getId(). '<br>'; // 2
echo $user2->setId(3). '<br>'; // 
echo $user2->setId(2);
echo $user->getId(); // 12







//snake case user_controller
// kebab case user-controller
// camel case userController
// pascal case UserController

?>



