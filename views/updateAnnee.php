<?php

//Declaring variables 

$annee = "";

if(isset($_POST['id'])){
		$exitAnnee = new AnneeController();
		$annee = $exitAnnee->getOneAnnee();
		
}
	if(isset($_POST['submit'])){
		$exitAnnee = new AnneeController();
		$exitAnnee->updateAnnee();
	}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Modification Année</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<?php require_once('navbar.php'); ?>

<body>
    <section class="pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="page-header">
                        <h2>Modifier une Année</h2>
                    </div>
                    <p>Veuillez modifier les valeurs d'entrée et soumettre pour mettre à jour l'année</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">

                        <div class="form-group">
                            <label>Annee</label>
                            <input type="input" name="annee" id="annee" class="form-control"
                                value="<?php echo $annee; ?>">
                        </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="delegate-index.php" class="btn btn-secondary">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>