<?php
require "includes/connexion.php";

if(!isset($_GET['id'])){
    header("Location: formations.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM formations WHERE id=?");
$stmt->execute([$_GET['id']]);
$f = $stmt->fetch();

if(!$f){
    echo "Formation introuvable";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title><?= $f['titre'] ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:Segoe UI;}
body{
    /*background:#f4f6f8;*/
    background-image: url('image/img1.jfif');
    min-height:100vh;
    display:flex;
    flex-direction:column;}
header{background:#0d6efd;color:#fff;padding:20px 40px;display:flex;justify-content:space-between;}
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
main{
    flex:1;
    max-width:800px;
    margin:50px auto;
    background:#fff;
    padding:30px;
    border-radius:12px;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
}
main h2{color:#0d6efd;margin-bottom:15px;}
main p{margin-bottom:10px;line-height:1.6;}
.btn{
    display:inline-block;
    margin-top:20px;
    background:#198754;
    color:#fff;
    padding:12px 18px;
    border-radius:6px;
    text-decoration:none;
}
footer{background:#212529;
       color:#bbb;
       text-align:center;padding:15px;}
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
    <h2><?= htmlspecialchars($f['titre']) ?></h2>
    <p><strong>Catégorie :</strong> <?= htmlspecialchars($f['categorie']) ?></p>
    <p><strong>Durée :</strong> <?= htmlspecialchars($f['duree']) ?></p>
    <p><strong>Prix :</strong> <?= $f['prix'] ?> DH</p>

    <p><?= nl2br(htmlspecialchars($f['description'])) ?></p>

    <a class="btn" href="inscription.php"> S'inscrire</a>
</main>

<footer>
    © 2025 Form’Campus – Tous droits réservés
</footer>

</body>
</html>
