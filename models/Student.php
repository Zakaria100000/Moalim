<?php

class Student{

    /**
     * return @void
     */

    static public function getAll(){
        $stmt = DB::connect()->prepare("SELECT * FROM student");
        $stmt->execute();
        return $stmt->fetchAll();
   
        $stmt = null;
    }

    public function getStudent($data)
    {
        $id = $data['id'];
        try {
            $query = "SELECT * FROM student WHERE id=:id";
            $statement = DB::connect()->prepare($query);
            $statement->execute(array(":id" => $id));
            $student = $statement->fetch(PDO::FETCH_OBJ);
            return $student;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }

    public function searchStudent($data)
    {
        $search = $data['search'];
        try {
            $query = "SELECT * FROM student WHERE firstname LIKE ?
                OR lastname LIKE ?
            ";
            $statement = DB::connect()->prepare($query);
            $statement->execute(array('%'.$search.'%', '%' . $search . '%'));
            $student = $statement->fetchAll();
            return $student;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }

    static public function addStudent($data)
    {
        $stmt = DB::connect()->prepare("INSERT INTO `student`(`firstname`,`lastname`,`email`,`password`,`role`) VALUES
                (:firstname,:lastname,:email,:password,:role)");
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
    static public function updateStudent($data)
    {
        $stmt = DB::connect()->prepare("UPDATE student SET firstname = :firstname ,lastname = :lastname,
                    email = :email,password = :password,role = :role,
                   WHERE id = :id");
        $stmt->bindParam(':id', $data['id'], PDO::PARAM_STR);
        $stmt->bindParam(':firstname', $data['nom'], PDO::PARAM_STR);
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
    static public function deleteStudent($data)
    {
        $id = $data['id'];
        try {
            $query = "DELETE FROM student WHERE id=:id";
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