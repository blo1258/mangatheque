<?php

class ModelUser {

    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getUsers() : array {

        $query = "SELECT id, pseudo, email FROM user";
        $req = $this->db->query($query);
        $user = $req->fetchAll(PDO::FETCH_ASSOC);
        return $user;

    }
}


?>