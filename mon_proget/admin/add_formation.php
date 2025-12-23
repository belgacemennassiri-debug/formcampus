<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}
require "../includes/connexion.php";

if ($_POST) {
    $sql = "INSERT INTO formations 
    (titre, categorie, description, duree, prix)
    VALUES (?,?,?,?,?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $_POST['titre'],
        $_POST['categorie'],
        $_POST['description'],
        $_POST['duree'],
        $_POST['prix']
    ]);

    header("Location: admin_formations.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Ajouter une formation – Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
/* Reset de base */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, Arial, sans-serif;
}

body {
    background: #02a6f8ff;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

form {
    background: #fff;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    width: 400px;
}

form h2 {
    text-align: center;
    margin-bottom: 30px;
    color: #0d6efd;
}

input[type="text"],
input[type="number"],
textarea {
    width: 100%;
    padding: 12px 15px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 14px;
    transition: border 0.3s, box-shadow 0.3s;
}

input[type="text"]:focus,
input[type="number"]:focus,
textarea:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 5px rgba(13,110,253,0.5);
    outline: none;
}

textarea {
    resize: vertical;
    min-height: 100px;
}

button {
    width: 100%;
    padding: 12px;
    background-color: #0d6efd;
    color: #fff;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #084298;
}

/* Responsive */
@media (max-width: 500px) {
    form {
        width: 90%;
        padding: 30px;
    }
}
</style>
</head>
<body>

<form method="post">
    <h2>Ajouter une formation</h2>

    <input type="text" name="titre" placeholder="Titre" required>
    <input type="text" name="categorie" placeholder="Catégorie" required>
    <input type="text" name="duree" placeholder="Durée" required>
    <input type="number" name="prix" placeholder="Prix" required>
    <textarea name="description" placeholder="Description" required></textarea>
    <button>Ajouter</button>
</form>

</body>
</html>
