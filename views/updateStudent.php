<?php
                    if ($_SESSION['role'] == 'admin') {
						
						if(isset($_POST['id'])){
							$exitStudent = new StudentController() ;
							$student = $exitStudent->getOneStudent();
						
						}else{
							Redirect::to('home');
						}
						if(isset($_POST['submit'])){
							$exitStudent = new StudentController();
							$exitStudent->updateStudent();
						}
                    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Modification Cours</title>
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
                        <h2>Modifier un Cours</h2>
                    </div>
                    <p>Veuillez modifier les valeurs d'entrée et soumettre pour mettre à jour le cours</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">

                        <div class="form-group">
                            <label>Nom</label>
                            <input type="input" name="firstname" id="firstname" class="form-control"
                                value="<?php echo $firstname; ?>">
                        </div>

                        <div class="form-group">
                            <label>Prénom</label>
                            <input type="input" name="lastname" id="lastname" class="form-control"
                                value="<?php echo $lastname; ?>">
                        </div>

                        <div class="form-group">
                            <label>Nom d'utilisateur</label>
                            <input type="input" name="username" id="username" class="form-control"
                                value="<?php echo $username; ?>">
                        </div>


                        <div class="form-group">
                            <label>Mot de passe</label>
                            <input type="input" name="password" id="password" class="form-control"
                                value="<?php echo $password; ?>">
                        </div>


                        <div class="form__group field">
                            <label>Role</label> <br>
                            <input type="input" class="form__field" placeholder="Role" name="role" id='role'
                                value="<?php echo $cours; ?>" required />

                        </div>
                        <br>

                        <div class="form__group field">

                            <input type="submit" class="btn btn-primary" value="Submit">
                            <a href="delegate-index.php" class="btn btn-secondary">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>