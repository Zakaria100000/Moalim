<?php

class Cours{

    /**
     * return @void
     */

    static public function getAll(){
        $stmt = DB::connect()->prepare("SELECT * FROM cours");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    public function getCours($data)
    {
        $id = $data['id'];
        try {
            $query = "SELECT * FROM cours WHERE id=:id";
            $statement = DB::connect()->prepare($query);
            $statement->execute(array(":id" => $id));
            $cours= $statement->fetch(PDO::FETCH_OBJ);
            return $cours;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }

    public function searchCours($data)
    {
        $search = $data['search'];
        try {
            $query = "SELECT * FROM cours WHERE nom_cours LIKE ?
              
            ";
            $statement = DB::connect()->prepare($query);
            $statement->execute(array('%'.$search.'%', '%' . $search . '%'));
            $cours= $statement->fetchAll();
            return $cours;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }

    static public function addCours($data)
    {
        $stmt = DB::connect()->prepare("INSERT INTO `cours`(`nom_cours`) VALUES
                (:nom_cours)");
        $stmt->bindParam(':nom_cours', $data['nom_cours'], PDO::PARAM_STR);
       
        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
    
        $stmt = null;
    }
    static public function updateCours($data)
    {
        $stmt = DB::connect()->prepare("UPDATE cours SET nom_cours = :nom_cours");
        $stmt->bindParam(':id', $data['id'], PDO::PARAM_STR);
        $stmt->bindParam(':nom_cours', $data['nom_cours'], PDO::PARAM_STR);
      
       
        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }

        $stmt = null;
    }
    static public function deleteCours($data)
    {
        $id = $data['id'];
        try {
            $query = "DELETE FROM cours WHERE id=:id";
            $statement = DB::connect()->prepare($query);
            $statement->execute(array(":id" => $id));
            if ($statement->execute()) {
                return 'ok';
            } else {
                return 'error';
            }
        
            $statement = null;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }
}
?>