<?php


class TeacherController
{

    public function getAllTeacher(){
        $teacher = Teacher::getAll();
        return $teacher;
    }

    public function getOneTeacher()
    {
        if (isset($_POST['id'])) {
            $data = array(
                'id' => $_POST['id'],
            );
            $teacher =  (new Teacher)->getTeacher($data);
            return $teacher;
        }
    }

    public function findTeacher()
    {
        if (isset($_POST['search'])) {
            $data = array(
                'search' => $_POST['search'],
            );
            $Teacher =  (new Teacher)->searchTeacher($data);
            return $Teacher;
        }
    }

    /**
     * return @void
     */

    public function addTeacher()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'role' =>  $_POST['role']
            );
            $result = Teacher::addTeacher($data);
            if ($result === 'ok') {
                Session::set('success','Teacher Ajouté');
                Redirect::to('home');
            }else{
                echo $result;
            }
        }
    }

    /**
     * return @void
     */

    public function updateTeacher()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'role' =>  $_POST['role']
            );
            $result = Teacher::updateTeacher($data);
            if ($result === 'ok') {
                Session::set('success', 'Teacher Modifié');
                Redirect::to('home');
            } else {
                echo $result;
            }
        }
    }
    /**
     * return @void
     */

    public function deleteTeacher()
    {
        if (isset($_POST['id'])) {
            $data['id'] = $_POST['id'];
            $result = Teacher::deleteTeacher($data);
            if ($result === 'ok') {
                Session::set('success', 'Teacher Supprimé');
                Redirect::to('home');
            } else {
                echo $result;
            }
        }
    }
}
?>