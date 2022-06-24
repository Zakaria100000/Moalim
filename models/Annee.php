<?php

class Annee{

    /**
     * return @void
     */

    static public function getAll(){
        $stmt = DB::connect()->prepare("SELECT * FROM annee");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    public function getAnnee($data)
    {
        $id = $data['id'];
        try {
            $query = "SELECT * FROM annee WHERE id=:id";
            $statement = DB::connect()->prepare($query);
            $statement->execute(array(":id" => $id));
            $annee = $statement->fetch(PDO::FETCH_OBJ);
            return $annee;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }

    public function searchAnnee($data)
    {
        $search = $data['search'];
        try {
            $query = "SELECT * FROM annee WHERE nom_annee LIKE ?
            
            ";
            $statement = DB::connect()->prepare($query);
            $statement->execute(array('%'.$search.'%', '%' . $search . '%'));
            $annee = $statement->fetchAll();
            return $annee;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }

    static public function addAnnee($data)
    {
        $stmt = DB::connect()->prepare("INSERT INTO `annee`(`nom_annee`) VALUES
                (:nom_annee)");
        $stmt->bindParam(':nom_annee', $data['nom_annee'], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
     
        $stmt = null;
    }
    static public function updateAnnee($data)
    {
        $stmt = DB::connect()->prepare("UPDATE annee SET nom_annee = :nom_annee");
        $stmt->bindParam(':id', $data['id'], PDO::PARAM_STR);
        $stmt->bindParam(':nom_annee', $data['nom_annee'], PDO::PARAM_STR);
               
        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
     
        $stmt = null;
    }
    static public function deleteAnnee($data)
    {
        $id = $data['id'];
        try {
            $query = "DELETE FROM annee WHERE id=:id";
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