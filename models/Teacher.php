<?php

class Teacher{

    /**
     * return @void
     */

    static public function getAll(){
        $stmt = DB::connect()->prepare("SELECT * FROM teacher");
        $stmt->execute();
        return $stmt->fetchAll();
     
        $stmt = null;
    }

    public function getTeacher($data)
    {
        $id = $data['id'];
        try {
            $query = "SELECT * FROM teacher WHERE id=:id";
            $statement = DB::connect()->prepare($query);
            $statement->execute(array(":id" => $id));
            $teacher = $statement->fetch(PDO::FETCH_OBJ);
            return $teacher;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }

    public function searchTeacher($data)
    {
        $search = $data['search'];
        try {
            $query = "SELECT * FROM teacher WHERE firstname LIKE ?
                OR lastname LIKE ?
            ";
            $statement = DB::connect()->prepare($query);
            $statement->execute(array('%'.$search.'%', '%' . $search . '%'));
            $teacher = $statement->fetchAll();
            return $teacher;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }

    static public function addTeacher($data)
    {
        $stmt = DB::connect()->prepare("INSERT INTO teacher(firstname, lastname, email, password, role) VALUES
        (:firstname, :lastname, :email, :password, :role)");
        $stmt->bindParam(':firstname', $data['firstname'], PDO::PARAM_STR);
        $stmt->bindParam(':lastname', $data['lastname'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);
        $stmt->bindParam(':password', $data['password'], PDO::PARAM_STR);
        $stmt->bindParam(':role', $data['role'], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
       
        $stmt = null;
    }
    static public function updateTeacher($data)
    {
        $stmt = DB::connect()->prepare("UPDATE teacher SET firstname = :firstname,lastname = :lastname,
                    email = :email,password = :password,role = :role,
                     WHERE id = :id");
         $stmt->bindParam(':firstname', $data['firstname'], PDO::PARAM_STR);
         $stmt->bindParam(':lastname', $data['lastname'], PDO::PARAM_STR);
         $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);
         $stmt->bindParam(':password', $data['password'], PDO::PARAM_STR);
         $stmt->bindParam(':role', $data['role'], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }

        $stmt = null;
    }
    static public function deleteTeacher($data)
    {
        $id = $data['id'];
        try {
            $query = "DELETE FROM teacher WHERE id=:id";
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