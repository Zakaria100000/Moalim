<?php

class Admin{

    /**
     * return @void
     */

    static public function getAll(){
        $stmt = DB::connect()->prepare("SELECT * FROM admin");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }

    public function getAdmin($data)
    {
        $id = $data['id'];
        try {
            $query = "SELECT * FROM admin WHERE id=:id";
            $statement = DB::connect()->prepare($query);
            $statement->execute(array(":id" => $id));
            $admin = $statement->fetch(PDO::FETCH_OBJ);
            return $admin;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }

    public function searchAdmin($data)
    {
        $search = $data['search'];
        try {
            $query = "SELECT * FROM admin WHERE firstname LIKE ?
                OR lastname LIKE ?
            ";
            $statement = DB::connect()->prepare($query);
            $statement->execute(array('%'.$search.'%', '%' . $search . '%'));
            $admin = $statement->fetchAll();
            return $admin;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    } 
}
?>