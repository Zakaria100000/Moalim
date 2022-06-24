<?php


class CoursController
{

    public function getAllCours(){
        $cours = Cours::getAll();
        return $cours;
    }

    public function getOneCours()
    {
        if (isset($_POST['id'])) {
            $data = array(
                'id' => $_POST['id'],
            );
            $cours = (new Cours)->getCours($data);
            return $cours;
        }
    }

    public function findCours()
    {
        if (isset($_POST['search'])) {
            $data = array(
                'search' => $_POST['search'],
            );
            $cours = (new Cours)->searchCours($data);
            return $cours;
        }
    }

    /**
     * return @void
     */

    public function addCours()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'nom_cours' => $_POST['nom_cours']
                
            );
            $result = cours::addCours($data);
            if ($result === 'ok') {
                Session::set('success','Cours Ajouté');
                Redirect::to('home');
            }else{
                echo $result;
            }
        }
    }

    /**
     * return @void
     */

    public function updateCours()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'nom_cours' => $_POST['nom_cours']
              
            );
            $result = Cours::updateCours($data);
            if ($result === 'ok') {
                Session::set('success', 'Cours Modifié');
                Redirect::to('home');
            } else {
                echo $result;
            }
        }
    }
    /**
     * return @void
     */

    public function deleteCours()
    {
        if (isset($_POST['id'])) {
            $data['id'] = $_POST['id'];
            $result = Cours::deleteCours($data);
            if ($result === 'ok') {
                Session::set('success', 'Cours Supprimé');
                Redirect::to('home');
            } else {
                echo $result;
            }
        }
    }
}
?>