<?php

class ControllerPage {
    public function homePage() {
        $modelUser = new ModelUser();
        $users = $modelUser->getUsers();
        require './view/homepage.php';


    }
}

?>