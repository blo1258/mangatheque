<?php

class ModelUser extends Model {

    private $db;
    public function getUsers() : array {
       
        $query = $this->getDb()->query( "SELECT id, pseudo, email, password, created_at FROM user");
        
        $arrayUser = [];
        while($user = $query->fetch(PDO::FETCH_ASSOC)) {
            $arrayUser[] = new User($user);
        }

        return $arrayUser;
    }

    public function getOneUserById(int $id) : ?User {
       //$db = new PDO('mysql:host=localhost; dbname=mangatheque', 'root', 'root');
       
       $req = $this->getDb()->prepare('SELECT id, pseudo, email, password FROM user WHERE id= :id');
       $req->bindParam(':id', $id, PDO::PARAM_INT);
       $req->execute();

       $user = $req->fetch(PDO::FETCH_ASSOC);
      
       return $user ? new User($user) : null;
       
    }

    public function deleteUserById(int $id) : bool {
         $db = $this->getDb();

        try {
            $query = "DELETE FROM user WHERE id = :id";
            $req = $db->prepare($query);
            $req->bindParam(':id', $id, PDO::PARAM_INT);
            $req->execute();

            return $req->rowCount() > 0;
        } catch (PDOException $e) {
            error_log("Erruer". $e->getMessage());
            return false;
        }
    }

    // public function getAllUsers(): array
    // {
    //     $sql = "SELECT id, pseudo, email FROM user"; 
    //     try {
    //         $stmt = $this->db->query($sql);
    //         return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    //     } catch (\PDOException $e) {
    //         error_log("Erreur: " . $e->getMessage());
    //         return []; // 
    //     }
    // }

}


?>