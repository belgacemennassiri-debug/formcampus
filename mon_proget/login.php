<?php
session_start();
require "includes/connexion.php";

if ($_POST) {
    $sql = "SELECT * FROM users WHERE login=? AND password=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST['login'], $_POST['password']]);

    if ($stmt->rowCount() == 1) {
        $_SESSION['admin'] = true;
        header("Location: admin/admin_formations.php");
        exit();
    } else {
        $error = "Login ou mot de passe incorrect";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Connexion Admin – Form’Campus</title>
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
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-image: url('image/img1.jfif');
    /*background: linear-gradient(135deg, #0d6efd, #084298);*/
}

form {
    background: #fff;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    width: 300px;
    text-align: center;
}

form h2 {
    margin-bottom: 25px;
    color: #0d6efd;
    font-size: 22px;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 12px 15px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 14px;
    transition: border 0.3s, box-shadow 0.3s;
}

input[type="text"]:focus,
input[type="password"]:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 5px rgba(13,110,253,0.5);
    outline: none;
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

.error {
    color: red;
    margin-bottom: 15px;
    font-size: 14px;
}
</style>
</head>
<body>

<form method="post">
    <h2>Connexion Admin</h2>

    <?php if(isset($error)): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <input type="text" name="login" placeholder="Login" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button>Connexion</button>
</form>

</body>
</html>
