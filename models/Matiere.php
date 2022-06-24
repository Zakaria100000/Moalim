<?php

class Matiere{

    /**
     * return @void
     */

    static public function getAll(){
        $stmt = DB::connect()->prepare("SELECT * FROM matiere");
        $stmt->execute();
        return $stmt->fetchAll();

        $stmt = null;
    }

    public function getMatiere($data)
    {
        $id = $data['id'];
        try {
            $query = "SELECT * FROM matiere WHERE id=:id";
            $statement = DB::connect()->prepare($query);
            $statement->execute(array(":id" => $id));
            $matiere = $statement->fetch(PDO::FETCH_OBJ);
            return $matiere;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }

    public function searchMatiere($data)
    {
        $search = $data['search'];
        try {
            $query = "SELECT * FROM matiere WHERE nom_matiere LIKE ?
            ";
            $statement = DB::connect()->prepare($query);
            $statement->execute(array('%'.$search.'%', '%' . $search . '%'));
            $matiere = $statement->fetchAll();
            return $matiere;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }

    static public function addMatiere($data)
    {
        $stmt = DB::connect()->prepare("INSERT INTO `matiere`(`nom_matiere`) VALUES
                (:nom_matiere)");
        $stmt->bindParam(':nom_matiere', $data['nom_matiere'], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
     
        $stmt = null;
    }
    static public function updateMatiere($data)
    {
        $stmt = DB::connect()->prepare("UPDATE matiere SET nom_matiere = :nom_matiere
                   WHERE id = :id");
        $stmt->bindParam(':id', $data['id'], PDO::PARAM_STR);
        $stmt->bindParam(':nom_matiere', $data['nom_matiere'], PDO::PARAM_STR);
       
        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
        
        $stmt = null;
    }
    static public function deleteMatiere($data)
    {
        $id = $data['id'];
        try {
            $query = "DELETE FROM matiere WHERE id=:id";
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