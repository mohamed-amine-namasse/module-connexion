        <?php
         session_start();
        ?>
        <!DOCTYPE html>
        <html lang="fr">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Page d'accueil</title>
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
                    <a class="active" href="./index.php">Accueil</a>
                    <?php if (!isset($_SESSION['login'])): ?>
                    <a class="#" href="./connexion.php">Se connecter </a>
                    <a class="#" href="./inscription.php">Créer compte</a>
                    <?php else: ?>
                    <a href="./profil.php">Ton profil</a>
                    <?php if (
                        isset($_SESSION['login']) && isset($_SESSION['password']) &&
                        $_SESSION['login'] === 'admin' && $_SESSION['password'] === 'admin'
                    ): ?>
                    <a class="#" href="./admin.php">Admin</a>
                    <?php endif; ?>
                    <a class="#" href="deconnexion.php">Déconnexion</a>
                    <?php endif; ?>
                </nav>
            </header>

            <main>



                <div class="text">
                    <h1>Bienvenue!<span> à toi sur la page d'accueil </span></h1>
                    <p>Ce site comprend un module de connexion. Il s'agit d'un module qui te permet de te connecter
                        via des sessions à ton compte.Tu peux modifier tes données également!</p>
                </div>

                <div class="photo">
                    <img src="./assets/images/phone.jpg" alt="photo_main">
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