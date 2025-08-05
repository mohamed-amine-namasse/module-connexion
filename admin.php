<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'administration</title>
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
            <a class="#" href="./profil.php">Ton profil </a>
            <a class="active" href="./admin.php">Admin </a>
            <a class="#" href="deconnexion.php">Déconnexion</a>
        </nav>
    </header>

    <main>


        <?php
        
        
        //on établit la connexion avec la base de donnée moduleconnexion
        $connexion = mysqli_connect('localhost', 'root');
        mysqli_select_db($connexion, 'moduleconnexion'); 
      
        
        
        // On fait une requete SQL pour insérer l'ensemble des informations de la table utilisateurs   
        $command= "SELECT id,login,prenom,nom FROM utilisateurs ";
        $result = mysqli_query($connexion, $command);
        ?>
        <h2> Liste des utilisateurs</h2>
        <table>

            <tr>
                <?php        //on recupère le header de notre table 
            $fields = mysqli_fetch_fields($result);
            foreach ($fields as $field) {
            echo"<th>".htmlspecialchars($field->name)."</th>";}
            ?>
            </tr>
            <?php    //on recupère le body de notre table
            while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            foreach ($fields as $field) {
            $fieldName = $field->name;
            echo "<td>" . htmlspecialchars($row[$fieldName]) . "</td>";
            }
            echo"</tr>";
            }
            
            ?>

        </table>




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