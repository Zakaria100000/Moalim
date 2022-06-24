<?php


class AdminController
{

    public function getAllAdmin(){
        $admin = Admin::getAll();
        return $admin;
    }

    public function getOneAdmin()
    {
        if (isset($_POST['id'])) {
            $data = array(
                'id' => $_POST['id'],
            );
            $admin = (new admin)->getAdmin($data);
            return $admin;
        }
    }

    public function findAdmin()
    {
        if (isset($_POST['search'])) {
            $data = array(
                'search' => $_POST['search']
            );
            $admin = (new admin)->searchAdmin($data);
            return $admin;
        }
    }


}
?>