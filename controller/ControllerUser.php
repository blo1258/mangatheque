<?php
//require_once __DIR__ . './model/ModelUser.php';


class ControllerUser {
    public function oneUserById(int $id) {
        $modelUser = new ModelUser();
        $user = $modelUser->getOneUserById($id);

        if($user == null) {
            http_response_code(404);
            require './view/404.php';
            exit;
        }

        require './view/user/oneUser.php';
    }

    public function updateUser(int $id){

        $modelUser = new ModelUser();

        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            
            $user = $modelUser->getOneUserById($id);
            
            if($user === null){
                $_SESSION[$error] = "Aucun user trouvé";
                header('Location: /mangatheque/');
                exit;
            }
            $title = "Editer utilisateur : {$user->getPseudo()}";
            ob_start();
            require './view/user/update-form.php';
            $content = ob_get_clean();
            require './view/base-html.php';
            exit;
        }

        

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $userUpdate = $modelUser->getOneUserById($id);
            if($userUpdate === null){
                $_SESSION['error'] = "Aucun user trouvé";
                header('Location: /mangatheque/');
                exit;
            }


            $pseudo = trim($_POST['pseudo']);
            $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
            $password = trim($_POST['password']);
            $newPassword = trim($_POST['new_password']);
            $confirmPassword = trim($_POST['confirm_password']);
           
            $errors = [];
            if(empty($pseudo) || empty($email) || empty($password)){
                $errors[] = "Veuillez remplir tous les champs";
            }
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors[] = "L'email n'est pas valide";
            }

            $hashedPassword = null;

            if(!empty($password) && !password_verify($password, $userUpdate->getPassword())){
                $errors[] = "Le mot de passe actuel est incorrect";
            }

            if(!empty($newPassword) || !empty($confirmPassword) || !empty($password)){
                if(empty($password) || empty($newPassword) || empty($confirmPassword)){
                    $errors[] = "Veuillez remplir tous les champs";
                } elseif($newPassword !== $confirmPassword){
                    $errors[] = "Les mots de passe ne correspondent pas";
                } else {
                    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                }
            }

            if(empty($errors)) {
                $ubdateSuccess = $modelUser->updateOneUserById($id, $pseudo, $email, $hashedPassword);
                if($ubdateSuccess) {
                    $_SESSION['success'] = "User modifié avec succès";
                    header('Location: /mangatheque/');
                    exit;
                } else {
                    $_SESSION['error'] = "Une erreur est survenue lors de la modification du user";
                }
            } else {
                $_SESSION['error'] = implode(', ', $errors);
            }

            header('Location: /mangatheque/user/update/' . $id);
            exit;
        }
    }

    public function deleteUserById(int $id){
        $modelUser = new ModelUser();
        $success = $modelUser->deleteOneUserById($id);

        if($success) {
            $message = 'User supprimé.';
        } else {
            $error = 'Aucun user supprimé.';
            http_response_code(404);
        }

        header('Location: /mangatheque/'); 
        exit;
    }
}



















