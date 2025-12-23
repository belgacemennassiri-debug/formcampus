<?php
require "../includes/connexion.php";

$sql = "SELECT i.nom, i.email, f.titre, i.date_inscription
        FROM inscriptions i
        JOIN formations f ON i.id_formation = f.id";

$inscrits = $pdo->query($sql)->fetchAll();
?>

<table border="1">
<tr>
    <th>Nom</th>
    <th>Email</th>
    <th>Formation</th>
    <th>Date</th>
</tr>

<?php foreach ($inscrits as $i): ?>
<tr>
    <td><?= $i['nom'] ?></td>
    <td><?= $i['email'] ?></td>
    <td><?= $i['titre'] ?></td>
    <td><?= $i['date_inscription'] ?></td>
</tr>
<?php endforeach; ?>
</table>
