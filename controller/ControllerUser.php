<?php
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
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $modelUser = new ModelUser();
            $user = $modelUser->getOneUserById($id);
            
            if($user === null){
                $error = "Aucun user trouvé";
                header('Location: /mangatheque/');
                exit;
            }

            require './view/user/update-form.php';
            exit;
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $modelUser = new ModelUser();
            $pseudo = trim($_POST['pseudo']);
            $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
            $password = trim($_POST['password']);
            $req = $modelUser->updateOneUserById($id, $pseudo, $email, $password);

            if($req){
                $message = "User modifié";
                header('Location: /mangatheque/');
                exit;
            }
        }

        http_response_code(405);
        header('Location: /mangatheque/');
        exit;
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



















