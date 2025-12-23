<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}
require "../includes/connexion.php";

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: admin_formations.php");
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM formations WHERE id=?");
$stmt->execute([$id]);
$formation = $stmt->fetch();

if (!$formation) {
    header("Location: admin_formations.php");
    exit();
}

if ($_POST) {
    $sql = "UPDATE formations SET
        titre=?, categorie=?, description=?, duree=?, prix=?
        WHERE id=?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $_POST['titre'],
        $_POST['categorie'],
        $_POST['description'],
        $_POST['duree'],
        $_POST['prix'],
        $id
    ]);

    header("Location: admin_formations.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Modifier formation – Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
/* Reset et style de base */
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

/* Formulaire */
form {
    background: #fff;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    width: 400px;
    text-align: center;
}

form h2 {
    color: #0d6efd;
    margin-bottom: 30px;
}

/* Champs de saisie */
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

/* Bouton */
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
    <h2>Modifier formation</h2>

    <input type="text" name="titre" value="<?= htmlspecialchars($formation['titre']) ?>" required>
    <input type="text" name="categorie" value="<?= htmlspecialchars($formation['categorie']) ?>" required>
    <input type="text" name="duree" value="<?= htmlspecialchars($formation['duree']) ?>" required>
    <input type="number" name="prix" value="<?= htmlspecialchars($formation['prix']) ?>" required>
    <textarea name="description" required><?= htmlspecialchars($formation['description']) ?></textarea>
    <button>Modifier</button>
</form>

</body>
</html>
