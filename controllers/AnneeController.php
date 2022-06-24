<?php


class AnneeController
{

    public function getAllAnnee(){
        $annee = Annee::getAll();
        return $annee;
    }

    public function getOneAnnee()
    {
        if (isset($_POST['id'])) {
            $data = array(
                'id' => $_POST['id'],
            );
            $annee = (new Annee)->getAnnee($data);
            return $annee;
        }
    }

    public function findAnnee()
    {
        if (isset($_POST['search'])) {
            $data = array(
                'search' => $_POST['search'],
            );
            $annee = (new Annee)->searchAnnee($data);
            return $annee;
        }
    }

    /**
     * return @void
     */

    public function addAnnee()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'nom_annee' => $_POST['nom_annee']
                
            );
            $result = Annee::addAnnee($data);
            if ($result === 'ok') {
                Session::set('success','Année Ajouté');
                Redirect::to('home');
            }else{
                echo $result;
            }
        }
    }

    /**
     * return @void
     */

    public function updateAnnee()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'nom_annee' => $_POST['nom_annee']
              
            );
            $result = annee::updateAnnee($data);
            if ($result === 'ok') {
                Session::set('success', 'Année Modifié');
                Redirect::to('home');
            } else {
                echo $result;
            }
        }
    }
    /**
     * return @void
     */

    public function deleteAnnee()
    {
        if (isset($_POST['id'])) {
            $data['id'] = $_POST['id'];
            $result = annee::deleteAnnee($data);
            if ($result === 'ok') {
                Session::set('success', 'Année Supprimé');
                Redirect::to('home');
            } else {
                echo $result;
            }
        }
    }
}
?>