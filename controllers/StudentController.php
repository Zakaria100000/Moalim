<?php


class StudentController
{

    public function getAllStudent(){
        $student = Student::getAll();
        return $student;
    }

    public function getOneStudent()
    {
        if (isset($_POST['id'])) {
            $data = array(
                'id' => $_POST['id'],
            );
            $student = (new student)->getStudent($data);
            return $student;
        }
    }

    public function findStudent()
    {
        if (isset($_POST['search'])) {
            $data = array(
                'search' => $_POST['search'],
            );
            $student = (new student)->searchStudent($data);
            return $student;
        }
    }

    /**
     * return @void
     */

    public function addStudent()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'username' => $_POST['username'],
                'password' => $_POST['password'],
                'role' =>  $_POST['role']
            );
            $result = Student::addStudent($data);
            if ($result === 'ok') {
                Session::set('success','Élève Ajouté');
                Redirect::to('home');
            }else{
                echo $result;
            }
        }
    }

    /**
     * return @void
     */

    public function updateStudent()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'username' => $_POST['username'],
                'password' => $_POST['password'],
                'role' =>  $_POST['role']
            );
            $result = Student::updateStudent($data);
            if ($result === 'ok') {
                Session::set('success', 'Eleve Modifié');
                Redirect::to('home');
            } else {
                echo $result;
            }
        }
    }
    /**
     * return @void
     */

    public function deleteStudent()
    {
        if (isset($_POST['id'])) {
            $data['id'] = $_POST['id'];
            $result = Student::deleteStudent($data);
            if ($result === 'ok') {
                Session::set('success', 'Élève Supprimé');
                Redirect::to('home');
            } else {
                echo $result;
            }
        }
    }
}
?>