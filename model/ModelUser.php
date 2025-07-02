<?php

class ModelUser {

   
    public static function getUsers() : array {
        $db = new PDO('mysql:host=localhost; dbname=mangatheque', 'root', 'root');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT id, pseudo, email, password, created_at FROM user";
        $query = $db->query($query);
        $arrayUser = [];
        while($user = $query->fetch(PDO::FETCH_ASSOC)) {
            $arrayUser[] = new User($user['id'], $user['pseudo'], $user['email'], $user['password']);
        }

        return $arrayUser;
    }
}


?>