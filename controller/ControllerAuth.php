<?php

class ControllerAuth {
    public function register() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(empty($_POST['pseudo']) || empty($_POST['email']) || empty($_POST['password'])) {
                $_SESSION['error'] = 'Veuillez remplir tous les champs';
                header('Location: /mangatheque/register?error=Veuillez remplir tous les champs');
                exit;
            } else {
               
                $success = "Inscription réussie !";
            }
            
            $pseudo = trim($_POST['pseudo']) ?? '';
            $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) ?? '';
            $password = trim($_POST['password']) ?? '';

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            
            $modelUser = new ModelUser();
            $successUser = $modelUser->createUser($pseudo, $email, $password);
            if($successUser) {
                $_SESSION['success'] = "Votre compte a été créé avec succès ! Veuillez vous connecter.";
                header('Location: /mangatheque/login');
                exit;
            } else {
                $_SESSION['error'] = 'Une erreur est survenue lors de l\'inscription. Veuillez réessayer.';
                header('Location: /mangatheque/register');
                exit;
            }
        }
        require __DIR__ . '/../view/auth/register.php';
        
    }

    public function login() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(empty($_POST['email']) || empty($_POST['password'])) {
                $_SESSION['error'] = 'Veuillez remplir tous les champs';
                header('Location: /mangatheque/login?error=Veuillez remplir tous les champs');
                exit;
            }

            $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
            $password = trim($_POST['password']);

            $modelUser = new ModelUser();
            $user = $modelUser->getOneUserByEmail($email);

            if($user && password_verify($password, $user->getPassword())) {
                $_SESSION['user'] = $user;
                header('Location: /mangatheque/');
                exit;
            } else {
                $_SESSION['error'] = 'Identifiants incorrects';
                header('Location: /mangatheque/login');
                exit;
            }
        }
        require __DIR__ . '/../view/auth/login.php';
    }
        
}