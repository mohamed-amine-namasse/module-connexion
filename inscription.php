<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'inscription</title>
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
            <a class="#" href="./connexion.php">Se connecter </a>
            <a class="active" href="./inscription.php">Créer compte</a>
        </nav>
    </header>

    <main>


        <div class=container_form>
            <h2>Création de compte</h2>
            <br>
            <form id="form">
                <label for="Prefixe">Prefixe:</label><br>
                <select>
                    <option>Mr. </option>
                    <option>Mme.</option>
                    <option>Mx.</option>
                </select>
                <br>
                <label for="prenom">Prénom:</label><br>
                <input type="text" id="prenom" name="prenom" value=""><br>
                <label for="nom">Nom:</label><br>
                <input type="text" id="nom" name="nom" value=""> <br>
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" value=""><br>
                <label for="mobile">Téléphone mobile:</label><br>
                <input type="tel" id="mobile" name="mobile" value=""><br>

                <br>

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
                <h3>Company Name</h3>
                <ul>
                    <li><a href="#">Company</a></li>
                    <li><a href="#">Team</a></li>
                    <li><a href="#">Careers</a></li>
                </ul>
            </div>
        </div>

        <hr class=hr_milieu>

        <p> ©All Rights Reserved.</p>
        </div>


    </footer>

</body>

</html>