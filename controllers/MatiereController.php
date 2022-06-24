<?php


class MatiereController
{

    public function getAllMatiere(){
        $matiere = Matiere::getAll();
        return $matiere;
    }

    public function getOneMatiere()
    {
        if (isset($_POST['id'])) {
            $data = array(
                'id' => $_POST['id'],
            );
            $matiere = (new Matiere)->getMatiere($data);
            return $matiere;
        }
    }

    public function findMatiere()
    {
        if (isset($_POST['search'])) {
            $data = array(
                'search' => $_POST['search'],
            );
            $matiere = (new Matiere)->searchMatiere($data);
            return $matiere;
        }
    }

    /**
     * return @void
     */

    public function addMatiere()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'nom_matiere' => $_POST['nom_matiere']
                
            );
            $result = Matiere::addMatiere($data);
            if ($result === 'ok') {
                Session::set('success','Matière Ajouté');
                Redirect::to('home');
            }else{
                echo $result;
            }
        }
    }

    /**
     * return @void
     */

    public function updateMatiere()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'nom_matiere' => $_POST['nom_matiere']
              
            );
            $result = Matiere::updateMatiere($data);
            if ($result === 'ok') {
                Session::set('success', 'Matière Modifié');
                Redirect::to('home');
            } else {
                echo $result;
            }
        }
    }
    /**
     * return @void
     */

    public function deleteMatiere()
    {
        if (isset($_POST['id'])) {
            $data['id'] = $_POST['id'];
            $result = Matiere::deleteMatiere($data);
            if ($result === 'ok') {
                Session::set('success', 'Matière Supprimé');
                Redirect::to('home');
            } else {
                echo $result;
            }
        }
    }
}
?>