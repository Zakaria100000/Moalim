<?php
	if(isset($_POST['submit'])){
		$newStudent = new StudentController();
		$newStudent->addStudent();
	}
	require_once('navbar.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ajouter un Enseignant</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>


<body>
    <section class="pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="page-header">
                        <h2>Ajouter un Enseignant</h2>
                    </div>
                    <p>
                        Veuillez remplir ce formulaire et le soumettre pour ajouter un enseignant à la base de
                        données</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" class="form-control" placeholder="Nom" name="firstname" id='firstname'
                                required />
                        </div>
                        <div class="form-group">
                            <label>Prénom</label>
                            <input type="text" class="form-control" placeholder="Prénom" name="lastname" id='lastname'
                                required />
                        </div>
                        <div class="form-group">
                            <label>Nom Utilisateur</label>
                            <input type="text" class="form-control" placeholder="Nom Utilisateur" name="username"
                                id='username' required />
                        </div>
                        <div class="form-group">
                            <label>Mot de passe</label>
                            <input type="text" class="form-control" placeholder="Mot de passe" name="password"
                                id='password' required />
                        </div>
                        <div class="form-group">
                            <label>Choisissez un rôle</label>
                            <select class="form-control" name="role" id="role">

                                <option value="Enseignant" required>Elève</option>
                                <option value="Eleve" required>Enseignant</option>
                            </select>
                            <br>





                            <input type="submit" class="btn btn-primary" value="Submit">
                            <a href="delegate-index.php" class="btn btn-secondary">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>