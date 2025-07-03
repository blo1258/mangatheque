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

public function deleteUser (int $id) {
    $modelUser = new ModelUser();
    $isDeleted = $modelUser->deleteUserById($id);

    if($isDeleted) {
        header('Location: /');
        exit;
    } else {
        http_response_code(500);
    }

}
}
