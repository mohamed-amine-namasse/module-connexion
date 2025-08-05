<?php
        // On démarre une session
        session_start();
        $message1 = '';      // Message à afficher à l'utilisateur
        $message2 = '';      // Message à afficher à l'utilisateur
        $message3 = '';      // Message à afficher à l'utilisateur


       
        
        
        
        if (isset($_POST["login"]) && isset($_POST["password"]) ){
        $login=$_POST["login"];
        $password=$_POST["password"];
        }
        /*****************************************
         *  Vérification du formulaire de connexion
        *****************************************/
        // Si le tableau $_POST existe alors le formulaire a été envoyé
        if(!empty($_POST))
        {   
           
               
            // Le login est-il rempli ?
            if(empty($_POST['login']))
            {
            $message1 = 'Veuillez indiquer votre login svp !';
            }
            // Le mot de passe est-il rempli ?
            if(empty($_POST['password']))
            {
            $message2 = 'Veuillez indiquer votre mot de passe svp !';
            }
            // Si les champs ne sont pas vides, on n'est connecté
            if(!empty($_POST['login']) && !empty($_POST['password'])) {
            $connexion = mysqli_connect('localhost', 'root');
            mysqli_select_db($connexion, 'moduleconnexion');
            $login =$_POST['login'];
            $password =  $_POST['password'];
            // On fait une requete SQL pour insérer l'ensemble des informations de la table utilisateurs
            // On vérifie si le login et le mot de passe correspondent à un utilisateur dans la base de données
            // On utilise password_verify pour vérifier le mot de passe haché
            $command = "SELECT * FROM utilisateurs WHERE login='$login' ";
            $result = mysqli_query($connexion, $command);
            $donnee = mysqli_fetch_assoc($result);
            
            if ($donnee && password_verify($password, $donnee['password'])) {
                $message3 = 'Bienvenue ' . $login . ' ! Tu es connecté!';
                $_SESSION['login'] = $login;
                $_SESSION['password'] = $password;
            } else {
                $message3 = "Erreur : login ou mot de passe incorrect.";
            }
            }
           
            
            
        }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page profil</title>
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
            <a class="active" href="./profil.php">Ton profil </a>
            <?php if (isset($_SESSION['login']) && isset($_SESSION['password']) && $_SESSION['login'] === 'admin' && $_SESSION['password'] === 'admin'): ?>
            <a class="#" href="./admin.php">Admin</a>
            <?php endif; ?>
            <?php if (isset($_SESSION['login'])): ?>
            <a href="deconnexion.php">Déconnexion</a>
            <?php endif; ?>
        </nav>
    </header>

    <main>
        <?php if(!empty($message1)) : ?>
        <p><?php echo $message1; ?></p>
        <?php endif; ?>
        <?php if(!empty($message2)) : ?>
        <p><?php echo $message2; ?></p>
        <?php endif; ?>
        <?php if(!empty($message3)) : ?>
        <p><?php echo $message3; ?></p>
        <?php endif; ?>

        <?php
        
        
        //on établit la connexion avec la base de donnée moduleconnexion
        $connexion = mysqli_connect('localhost', 'root');
        mysqli_select_db($connexion, 'moduleconnexion'); 
        if (!isset($donnee) && isset($_SESSION['login'])) {
        $login = $_SESSION['login'];
        $command = "SELECT * FROM utilisateurs WHERE login='$login'";
        $result = mysqli_query($connexion, $command);
        $donnee = mysqli_fetch_assoc($result);
}
        
        
        

?>




        <div class=container_form>
            <h2>Information du compte</h2>
            <br>
            <form id=form action="profil.php" method="post">

                <label><b>Login:</b></label><br>
                <input type="text" name="login" value=<?php if (isset($donnee)){ echo $donnee['login'];} ?>><br>
                <label><b>Prenom:</b></label><br>
                <input type="text" name="prenom" value=<?php  if (isset($donnee)){ echo $donnee['prenom'];} ?>><br>
                <label><b>Nom:</b></label><br>
                <input type="text" name="nom" value=<?php  if (isset($donnee)){ echo $donnee['nom'];} ?>><br>
                <label><b>Password:</b></label><br>
                <input type="text" name="password" value="" ?><br>
                <input class=bouton_submit type="submit" value="Modifier">

            </form>

        </div>

        <?php

    if (
        isset($_POST["login"]) &&
        isset($_POST["prenom"]) &&
        isset($_POST["nom"]) &&
        isset($_POST["password"])) {
            
        $id=$donnee['id'];
        $login = $_POST["login"];
        $prenom = $_POST["prenom"];
        $nom = $_POST["nom"];
        $password = $_POST["password"];

      
        
        
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $update = "UPDATE utilisateurs SET login='$login', prenom='$prenom', nom='$nom', password='$password_hash' WHERE id='$id'";
        if (mysqli_query($connexion, $update)) {
            $message3 = "Votre profil mis à jour avec succès !";
            echo "<p>$message3</p>";
            // Recharge les données modifiées depuis la base
            $select = "SELECT * FROM utilisateurs WHERE id='$id'";
            $result = mysqli_query($connexion, $select);
            $donnee = mysqli_fetch_assoc($result);
        } else {
            $message3 = "Erreur lors de la mise à jour du profil.";
            echo "<p>$message3</p>";
        }

        
    }
    
?>



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