<?php
      
      
        
        $message = '';      // Message à afficher à l'utilisateur
        
        /*****************************************
         *  Vérification du formulaire connexion
        *****************************************/
        // Si le tableau $_POST existe alors le formulaire a été envoyé
        if(!empty($_POST))
        {
            
            // Le formulaire a été envoyé vide
            if(empty($_POST['login'])|| empty($_POST['prenom'])||empty($_POST['nom'])||empty($_POST['password'])||empty($_POST['confirm_password']))
            {
            $message = 'Des champs vides dans le formulaire ont été envoyés ! Veuillez entrer des champs valides';
            }
            if($_POST["password"]!=$_POST["confirm_password"]) {
            $message = 'les deux mots de passe ne sont pas identiques! Veuillez réessayer';}
            
        }


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion</title>
    <link rel="stylesheet" href="./assets/css/style.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100..900&display=swap" rel="stylesheet">






</head>

<body>

    <header>
        <div class=logo_title>
            <a href="index.php">
                <div class="logo"><img src="./assets/images/logo.png" alt="logo page principal">
                </div>

            </a>
            <div class=title>Le pigeon</div>
        </div>

        <nav class="container_menu">
            <a class="#" href="./index.php">Accueil</a>
            <a class="active" href="./connexion.php">Se connecter </a>
            <a class="#" href="./inscription.php">Créer compte</a>
        </nav>
    </header>


    <main>
        <?php if(!empty($message)) : ?>
        <p><?php echo $message; ?></p>
        <?php endif; ?>

        <?php
        
        
        //on établit la connexion avec la base de donnée moduleconnexion
        $connexion = mysqli_connect('localhost', 'root');
        mysqli_select_db($connexion, 'moduleconnexion'); 
        /*
        if($connexion ){
            echo "tu es connecté à la BDD!";
        }
        else{echo "Echec de connexion à la BDD";}
        */
        //on fait une requete SQL pour insérer l'ensemble des informations de la table utilisateurs
        if (isset($_POST["login"]) && isset($_POST["prenom"]) && isset($_POST["nom"]) && isset($_POST["password"])&&isset($_POST["confirm_password"]) ){
        $login=$_POST["login"];
        $prenom=$_POST["prenom"];
        $nom=$_POST["nom"];
        $password=$_POST["password"];
        $confirm_password=$_POST["confirm_password"];
        }
        //Si les champs ne sont pas vides, on insère les données dans la base de données
        if(!empty($login) && !empty($prenom) && !empty($nom) && !empty($password) &&
        !empty($_POST["confirm_password"]) && ($_POST["password"]==$_POST["confirm_password"])) {
            // Vérifie si le login existe déjà
            $check = "SELECT * FROM utilisateurs WHERE login='$login'";
            $check_result = mysqli_query($connexion, $check);
            if(mysqli_num_rows($check_result) > 0) {
                $message = "Ce login existe déjà, veuillez en choisir un autre.";
                echo "<p>$message</p>";
            } else {
                // Hash du mot de passe
                $password_hash = password_hash($password, PASSWORD_DEFAULT);
                $command = "INSERT INTO utilisateurs (id,login,prenom,nom,password) VALUES (0,'$login','$prenom','$nom','$password_hash')";
                $result = mysqli_query($connexion, $command);
                $message = 'Parfait, ton utilisateur a bien été créé!';
                echo "<p>$message</p>";
            }
}
            
       

       
        ?>


        <div class=container_form>
            <h2>Connexion</h2>
            <br>
            <form id=form action="profil.php" method="post">
                <label><b>Login:</b></label><br>
                <input type="text" name="login"><br>
                <label><b>Password:</b></label><br>
                <input type="text" name="password"><br><br>
                <input class=bouton_submit type="submit" value="Envoyer">

            </form>

        </div>




    </main>

    <footer>

        <div class="container_footer">

            <div>
                <h3>Services</h3>
                <ul>
                    <li><a href="#">Web design</a></li>
                    <li><a href="#">Development</a></li>
                    <li><a href="#">Hosting</a></li>
                </ul>
            </div>
            <div>
                <h3>About</h3>
                <ul>
                    <li><a href="#">Company</a></li>
                    <li><a href="#">Team</a></li>
                    <li><a href="#">Careers</a></li>
                </ul>
            </div>

            <div>
                <h3>Company </h3>
                <ul>
                    <li><a href="#">Awards</a></li>
                    <li><a href="#">Method</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </div>

        <hr class=hr_milieu>

        <p> ©All Rights Reserved.</p>
        </div>


    </footer>

</body>

</html>