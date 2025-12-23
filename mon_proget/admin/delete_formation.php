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

// Vérifier si la suppression est confirmée
if ($_POST && isset($_POST['confirm'])) {
    $stmt = $pdo->prepare("DELETE FROM formations WHERE id=?");
    $stmt->execute([$id]);
    header("Location: admin_formations.php");
    exit();
}

// Récupérer le titre de la formation pour l'afficher
$stmt = $pdo->prepare("SELECT titre FROM formations WHERE id=?");
$stmt->execute([$id]);
$formation = $stmt->fetch();
if (!$formation) {
    header("Location: admin_formations.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Supprimer formation – Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {
    background: #02a6f8ff;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    font-family: 'Segoe UI', Tahoma, Arial, sans-serif;
}

.confirm-box {
    background: #fff;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    width: 400px;
    text-align: center;
}

.confirm-box h2 {
    color: #dc3545;
    margin-bottom: 20px;
}

.confirm-box p {
    margin-bottom: 30px;
    color: #555;
    font-size: 16px;
}

button {
    padding: 12px 25px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 16px;
    margin: 0 10px;
    transition: background-color 0.3s;
}

button.confirm {
    background-color: #dc3545;
    color: #fff;
}

button.confirm:hover {
    background-color: #a71d2a;
}

button.cancel {
    background-color: #6c757d;
    color: #fff;
}

button.cancel:hover {
    background-color: #495057;
}

/* Responsive */
@media (max-width: 500px) {
    .confirm-box {
        width: 90%;
        padding: 30px;
    }
}
</style>
</head>
<body>

<div class="confirm-box">
    <h2> Supprimer formation</h2>
    <p>Voulez-vous vraiment supprimer la formation <strong><?= htmlspecialchars($formation['titre']) ?></strong> ?</p>

    <form method="post">
        <button type="submit" name="confirm" class="confirm">Supprimer</button>
        <a href="admin_formations.php"><button type="button" class="cancel">Annuler</button></a>
    </form>
</div>

</body>
</html>
