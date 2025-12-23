<?php
require "includes/connexion.php";
$formations = $pdo->query("SELECT * FROM formations")->fetchAll();

$message = "";
if ($_POST) {
    $sql = "INSERT INTO inscriptions 
    (nom, prenom, email, tel, id_formation, commentaire)
    VALUES (?,?,?,?,?,?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['email'],
        $_POST['tel'],
        $_POST['formation'],
        $_POST['commentaire']
    ]);

    $message = " Inscription réussie";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription – Form’Campus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", Tahoma, Arial, sans-serif;
        }

        body {
            /*background-color: #f4f6f8;*/
            background-image: url('image/img1.jfif');
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
        }

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
            max-width: 600px;
            margin: 50px auto;
            background: white;
            padding: 35px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        }

        main h2 {
            text-align: center;
            color: #0d6efd;
            margin-bottom: 20px;
        }

        /* FORM */
        form input,
        form select,
        form textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        form textarea {
            resize: vertical;
            min-height: 90px;
        }
        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="email"]:focus,
        input[type="text"]:focus,
        textarea:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 5px rgba(13,110,253,0.5);
            outline: none;
        }
        select:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 5px rgba(13,110,253,0.5);
            outline: none;
        }


        button {
            width: 100%;
            background-color: #0d6efd;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #084298;
        }

        .success {
            background-color: #d1e7dd;
            color: #0f5132;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            text-align: center;
        }

        /* FOOTER */
        footer {
            background-color: #212529;
            color: #bbb;
            text-align: center;
            padding: 15px;
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
            }
        }
    </style>

    <script>
        function verifierForm() {
            let email = document.querySelector("input[name='email']").value;
            if (email === "") {
                alert("Email obligatoire");
                return false;
            }
            let regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!regex.test(email)) {
                alert("Email invalide");
                return false;
            }
            return true;
        }
    </script>
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
    <h2>Formulaire d'inscription</h2>

    <?php if ($message): ?>
        <div class="success"><?= $message ?></div>
    <?php endif; ?>

    <form method="post" onsubmit="return verifierForm()">
        <input type="text" name="nom" placeholder="Nom" required>
        <input type="text" name="prenom" placeholder="Prénom" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="tel" placeholder="Téléphone" required>

        <select name="formation" required>
            <option value="">-- Choisir une formation --</option>
            <?php foreach ($formations as $f): ?>
                <option value="<?= $f['id'] ?>">
                    <?= $f['titre'] ?>
                </option>
            <?php endforeach; ?>
        </select>

        <textarea name="commentaire" placeholder="Motivation"></textarea>
        <button type="submit">S'inscrire</button>
    </form>
</main>

<footer>
    © 2025 Form’Campus – Tous droits réservés
</footer>

</body>
</html>
