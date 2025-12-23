<?php
require "includes/connexion.php";

/* نجيبو غير 3 formations */
$stmt = $pdo->query("SELECT * FROM formations LIMIT 3");
$formations = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Nos formations – Form’Campus</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Segoe UI, Tahoma, Arial, sans-serif;
}
body{
   /* background:#f4f6f8;*/
   background-image: url('image/img1.jfif');
    min-height:100vh;
    display:flex;
    flex-direction:column;
}

/* HEADER */
header{
    background:linear-gradient(135deg,#0d6efd,#084298);
    color:#fff;
    padding:20px 40px;
    display:flex;
    justify-content:space-between;
    align-items:center;
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
main{
    flex:1;
    max-width:1100px;
    margin:50px auto;
    padding:20px;
}
main h2{
    margin-bottom:30px;
    color:#0d6efd;
    text-align:center;
}

/* TABLE */
table{
    width:100%;
    border-collapse:separate;
    border-spacing:30px;
}
td{
    background:#fff;
    border-radius:12px;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    overflow:hidden;
    vertical-align:top;
    transition:transform .3s;
}
td:hover{
    transform:translateY(-5px);
}
td img{
    width:100%;
    height:180px;
    object-fit:cover;
}
.content{
    padding:20px;
}
.content p{
    font-size:14px;
    color:#555;
    margin-bottom:15px;
}
.btn{
    display:inline-block;
    background:#0d6efd;
    color:#fff;
    padding:10px 15px;
    border-radius:6px;
    text-decoration:none;
    font-size:14px;
}
.btn:hover{
    background:#084298;
}

/* FOOTER */
footer{
    background:#212529;
    color:#bbb;
    text-align:center;
    padding:15px;
}

/* RESPONSIVE */
@media (max-width:768px){
    table{
        border-spacing:15px;
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
    <h2>Nos formations phares</h2>

    <table>
        <tr>
            <?php foreach($formations as $f): ?>
            <td>
                <!-- Image -->
                <img src="image\img.png" alt="formation">

                <div class="content">
                    <!-- Petite description -->
                    <p>
                        <?= substr(strip_tags($f['description']), 0, 100) ?>...
                    </p>

                    <!-- Bouton -->
                    <a class="btn" href="formation_detail.php?id=<?= $f['id'] ?>">
                        Voir plus
                    </a>
                </div>
            </td>
            <?php endforeach; ?>
        </tr>
    </table>
</main>

<footer>
    © 2025 Form’Campus – Tous droits réservés
</footer>

</body>
</html>
