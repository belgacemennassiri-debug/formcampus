<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}
require "../includes/connexion.php";

$formations = $pdo->query("SELECT * FROM formations")->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Gestion des formations – Admin</title>
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
    background: #f4f6f8;
    min-height: 100vh;
    padding: 40px;
}

/* Titre */
h2 {
    text-align: center;
    color: #0d6efd;
    margin-bottom: 30px;
}

/* Bouton Ajouter */
a.add-btn {
    display: inline-block;
    margin-bottom: 20px;
    padding: 10px 15px;
    background-color: #0d6efd;
    color: #fff;
    border-radius: 8px;
    text-decoration: none;
    transition: background-color 0.3s;
}

a.add-btn:hover {
    background-color: #084298;
}

/* Tableau */
table {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

table th, table td {
    padding: 15px 20px;
    text-align: left;
}

table th {
    background-color: #0d6efd;
    color: #fff;
    font-weight: 500;
}

table tr:nth-child(even) {
    background-color: #f8f9fa;
}

table tr:hover {
    background-color: #e9ecef;
}

/* Actions (Edit/Delete) */
.actions a {
    margin-right: 10px;
    text-decoration: none;
    font-size: 18px;
    transition: transform 0.2s;
}

.actions a:hover {
    transform: scale(1.2);
}

.actions .edit {
    color: #ffc107; /* jaune/orange pour éditer */
}

.actions .delete {
    color: #dc3545; /* rouge pour supprimer */
}

/* Responsive */
@media (max-width: 768px) {
    table, table tr, table td {
        display: block;
        width: 100%;
    }
    table tr {
        margin-bottom: 15px;
        border-bottom: 2px solid #ddd;
    }
    table th {
        display: none;
    }
    table td {
        padding: 10px;
        text-align: right;
        position: relative;
    }
    table td::before {
        content: attr(data-label);
        position: absolute;
        left: 10px;
        font-weight: bold;
        text-align: left;
    }
}
</style>
</head>
<body>

<h2>Gestion des formations</h2>

<a class="add-btn" href="add_formation.php">➕ Ajouter formation</a>

<table>
    <tr>
        <th>Titre</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($formations as $f): ?>
    <tr>
        <td data-label="Titre"><?= htmlspecialchars($f['titre']) ?></td>
        <td data-label="Actions" class="actions">
            <a class="edit" href="edit_formation.php?id=<?= $f['id'] ?>">✏️ Modifier formation</a>
            <a class="delete" href="delete_formation.php?id=<?= $f['id'] ?>" onclick="return confirm('Supprimer ?')">🗑️ Supprimer formation</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
