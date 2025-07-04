<?php

class ControllerUser {
    public function oneUserById(int $id) {
        $modelUser = new ModelUser();
        $user = $modelUser->getOneUserById($id);
        
        if ($user == null) {
            http_response_code(404);
            require '.view/404.php';
            exit;
        }

        require 'view/user/oneUser.php';
}

// public function listUsers() {
//     $modelUser = new ModelUser();
//     $users = $modelUser->getAllUsers();
//     $successMessage = $_SESSION['success_message'] ?? null;
//     $errorMessage = $_SESSION['error_message'] ?? null;

//     var_dump($successMessage);

//     if (isset($_SESSION['success_message'])) {
//         unset($_SESSION['success_message']);
//     }

//     if(isset($_SESSION['error_message'])) {
//         unset($_SESSION['error_message']);
//     }

//     require 'view/user/list.php';
// }

public function deleteUser (int $id) {
    $modelUser = new ModelUser();
    $isDeleted = $modelUser->deleteUserById($id);

    if($isDeleted) {
        header('Location: /mangatheque/');
        exit;
    } else {
        http_response_code(500);
    }

}
}
