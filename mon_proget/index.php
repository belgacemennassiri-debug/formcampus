<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Form’Campus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        /* RESET */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", Tahoma, Arial, sans-serif;
        }

        body {
            /*background-color: #f4f6f8;*/
            background-image: url('image/img1.jfif');
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;

            
        }

        /* HEADER */
        header {
            background: linear-gradient(135deg, #0d6efd, #084298);
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            font-size: 24px;
            font-weight: 600;
        }

        /* MENU */
        nav a {
            color: white;
            text-decoration: none;
            margin-left: 25px;
            font-weight: 500;
            position: relative;
        }

        nav a::after {
            content: "";
            position: absolute;
            width: 0;
            height: 2px;
            background: #ffc107;
            left: 0;
            bottom: -6px;
            transition: 0.3s;
        }

        nav a:hover::after {
            width: 100%;
        }

        /* MAIN */
        main {
            flex: 1;
            max-width: 900px;
            margin: 60px auto;
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
            text-align: center;
        }

        main h2 {
            color: #0d6efd;
            margin-bottom: 15px;
        }

        main p {
            font-size: 16px;
            line-height: 1.6;
        }

        /* FOOTER */
        footer {
            background-color: #212529;
            color: #bbb;
            text-align: center;
            padding: 15px 10px;
            font-size: 14px;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                text-align: center;
            }

            nav {
                margin-top: 10px;
            }

            nav a {
                margin: 0 10px;
            }

            main {
                margin: 30px 15px;
                padding: 25px;
            }
        }
    </style>
</head>
<body>

<header>
    <h1>Form’Campus</h1>
    <nav>
        <a href="index.php">Accueil</a>
        <a href="formations.php">Formations</a>
        <a href="formations.php">Se connceter</a>
        <a href="inscription.php">S'inscrire</a>
      
    </nav>
</header>

<main>
    <h2>Bienvenue sur Form’Campus</h2>
    <p>
        Form’Campus est une plateforme moderne dédiée à l’inscription
        aux formations professionnelles. Elle permet aux visiteurs
        de consulter les formations disponibles et de s’inscrire
        facilement en ligne.
    </p>
</main>

<footer>
    © 2025 Form’Campus – Tous droits réservés
</footer>

</body>
</html>
