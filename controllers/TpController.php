<?php
class TpController
{

    public function getAllTp(){
        $tp = Tp::getAll();
        return $tp;
    }

    public function getOneTp()
    {
        if (isset($_POST['id'])) {
            $data = array(
                'id' => $_POST['id'],
            );
            $tp = (new Tp)->getTp($data);
            return $tp;
        }
    }

    public function findTp()
    {
        if (isset($_POST['search'])) {
            $data = array(
                'search' => $_POST['search'],
            );
            $tp = (new Tp)->searchTp($data);
            return $tp;
        }
    }

    /**
     * return @void
     */

    public function addTp()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'titre' => $_POST['titre'],
                'enonce' => $_POST['enonce'],
                'simulation' => $_POST['simulation'],
                'tag' => $_POST['tag'],
                'id_teacher' =>  $_POST['id_teacher']
            );
            $result = Tp::addTp($data);
            if ($result === 'ok') {
                Session::set('success','TP Ajouté');
                Redirect::to('home');
            }else{
                echo $result;
            }
        }
    }

    /**
     * return @void
     */

    public function updateTp()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'titre' => $_POST['titre'],
                'enonce' => $_POST['enonce'],
                'simulation' => $_POST['simulation'],
                'tag' => $_POST['tag'],
                'id_teacher' =>  $_POST['id_teacher']
            );
            $result = Tp::updateTp($data);
            if ($result === 'ok') {
                Session::set('success', 'TP Modifié');
                Redirect::to('home');
            } else {
                echo $result;
            }
        }
    }
    /**
     * return @void
     */

    public function deleteTp()
    {
        if (isset($_POST['id'])) {
            $data['id'] = $_POST['id'];
            $result = Tp::deleteTp($data);
            if ($result === 'ok') {
                Session::set('success', 'TP Supprimé');
                Redirect::to('home');
            } else {
                echo $result;
            }
        }
    }
}
?>