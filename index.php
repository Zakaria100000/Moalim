<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

session_start();

include 'views/templates/header.php';


spl_autoload_register('autoload');


function autoload($class_name)
{
    $array_paths = array(
        'database/',
        'app/classes/',
        'models/',
        'controllers/'
    );
    $parts = explode('\\', $class_name);
    $name = array_pop($parts);
    foreach ($array_paths as $path) {
        $file = sprintf($path . '%s.php', $name);
        if (is_file($file)) {
            include_once $file;
        }
    }
}



$home = new HomeController();

//Page d'admin
$pagesAdmin = ["home","login","logout","about","contact","add","update","delete","Tp","Matiere","Catalogue","addEleve","updateEleve","deleteEleve","addEnseignant","updateEnseignant","deleteEnseignant","addCours","updateCours","deleteCours","addAnnee","updateAnnee","deleteAnnee","addMatiere","updateMatiere","deleteMatiere"];

//Page d'Enseignant
$pagesTeacher = ["login","logout","home","about","contact","Matiere","Catalogue","Tp","add","update","delete","addTp","updateTp","deleteTp"];

//Page d'Eleve 
$pagesStudent = ["login","logout","home","about","contact","Matiere","Catalogue","Tp"];



if(isset($_SESSION['logged']) && $_SESSION['logged'] === true && $_SESSION['role'] === 'Admin'){

	if(isset($_GET['page'])){
		if(in_array($_GET['page'],$pagesAdmin)){
			$page = $_GET['page'];
			$home->index($page);
		}else{
			include('views/includes/404.php');
		}
	}else{
		$home->index('home');
	}
}
elseif(isset($_SESSION['logged']) && $_SESSION['logged'] === true && $_SESSION['role'] === 'Teacher'){

    if(isset($_GET['page'])){
		if(in_array($_GET['page'],$pagesTeacher)){
			$pagesTeacher = $_GET['page'];
			$home->index($pagesTeacher);
		}else{
			include('views/includes/denied.php');
		}
	}else{
		$home->index('home');
	}



}
elseif(isset($_SESSION['logged']) && $_SESSION['logged'] === true && $_SESSION['role'] === 'Student'){

	if(isset($_GET['page'])){
		if(in_array($_GET['page'],$pagesStudent)){
			$pagesStudent = $_GET['page'];
			$home->index($pagesStudent);
		}else{
			include('views/includes/denied.php');
		}
	}else{
		$home->index('home');
	}

}

else 
{
    $home->index('home');
}


?>