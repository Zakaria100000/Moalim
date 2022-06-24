<?php

class Tp{

    /**
     * return @void
     */

    static public function getAll(){
        $stmt = DB::connect()->prepare("SELECT * FROM tp");
        $stmt->execute();
        return $stmt->fetchAll();
   
        $stmt = null;
    }

    public function getTp($data)
    {
        $id = $data['id'];
        try {
            $query = "SELECT * FROM tp WHERE id=:id";
            $statement = DB::connect()->prepare($query);
            $statement->execute(array(":id" => $id));
            $tp = $statement->fetch(PDO::FETCH_OBJ);
            return $tp;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }

    public function searchTp($data)
    {
        $search = $data['search'];
        try {
            $query = "SELECT * FROM tp WHERE titre LIKE ?
                
            ";
            $statement = DB::connect()->prepare($query);
            $statement->execute(array('%'.$search.'%', '%' . $search . '%'));
            $tp = $statement->fetchAll();
            return $tp;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }

    static public function addTp($data)
    {
        $stmt = DB::connect()->prepare("INSERT INTO tp(titre,enonce,simulation,tag,id_teacher) VALUES
                (:titre,:enonce,:simulation,:tag,:id_teacher)");
        $stmt->bindParam(':titre', $data['titre'], PDO::PARAM_STR);
        $stmt->bindParam(':enonce', $data['enonce'], PDO::PARAM_STR);
        $stmt->bindParam(':simulation', $data['simulation'], PDO::PARAM_STR);
        $stmt->bindParam(':tag', $data['tag'], PDO::PARAM_STR);
        $stmt->bindParam(':id_teacher', $data['id_teacher'], PDO::PARAM_STR);
    
        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
      
        $stmt = null;
    }
    static public function updateTp($data)
    {
        $stmt = DB::connect()->prepare("UPDATE `tp` SET titre = :titre, enonce = :enonce,
                    simulation = :simulation, tag= :tag , id_teacher= :id_teacher
                     WHERE id = :id");
        $stmt->bindParam(':id', $data['id'], PDO::PARAM_STR);
        $stmt->bindParam(':titre', $data['titre'], PDO::PARAM_STR);
        $stmt->bindParam(':enonce', $data['enonce'], PDO::PARAM_STR);
        $stmt->bindParam(':simulation', $data['simulation'], PDO::PARAM_STR);
        $stmt->bindParam(':tag', $data['tag'], PDO::PARAM_STR);
        $stmt->bindParam(':id_teacher', $data['id_teacher'], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
      
        $stmt = null;
    }
    static public function deleteTp($data)
    {
        $id = $data['id'];
        try {
            $query = "DELETE FROM tp WHERE id=:id";
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