<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check hardcoded admin first
    if ($email === 'admin@admin.com' && $password === 'admin') {
        $_SESSION['user_id'] = 0;
        $_SESSION['username'] = 'admin';
        $_SESSION['is_admin'] = true;

        echo "<script>alert('Bienvenue administrateur.'); window.location.href='admin.php';</script>";
        exit;
    }

    // Check regular users
    $email = mysqli_real_escape_string($conn, $email);
    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['passwd'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['is_admin'] = false;

            echo "<script>alert('Connexion réussie !'); window.location.href='index.php';</script>";
            exit;
        } else {
            echo "<script>alert('Mot de passe incorrect.');</script>";
        }
    } else {
        echo "<script>alert('Aucun compte trouvé avec cet email.');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion - Agence de Voyage</title>
  <link rel="stylesheet" href="css/styles.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">  
  <style>
    body {
      background: linear-gradient(to right, #2a9d8f, #21867a);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      font-family: 'Helvetica', sans-serif;
    }

    .login-container {
      background-color: white;
      padding: 40px 30px;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 400px;
      text-align: center;
    }

    .login-container h2 {
      margin-bottom: 30px;
      color: #333;
      font-size: 2rem;
    }

    .login-container form input {
      width: 100%;
      padding: 12px 15px;
      margin-bottom: 20px;
      border: 2px solid #ccc;
      border-radius: 10px;
      font-size: 1rem;
      transition: border-color 0.3s;
    }

    .login-container form input:focus {
      border-color: #2a9d8f;
      outline: none;
    }

    .login-container button {
      width: 100%;
      padding: 12px;
      background-color: #2a9d8f;
      color: white;
      border: none;
      border-radius: 10px;
      font-size: 1.2rem;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .login-container button:hover {
      background-color: #219d79;
    }

    .register-link {
      margin-top: 20px;
      font-size: 1rem;
      color: #555;
    }

    .register-link a {
      color: #2a9d8f;
      text-decoration: none;
      font-weight: bold;
    }

    .register-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<div class="login-container">
  <h2>Se connecter</h2>
  <form action="" method="POST">
    <input type="email" name="email" placeholder="Votre Email" required>
    <input type="password" name="password" placeholder="Votre Mot de passe" required>
    <button type="submit">Connexion</button>
  </form>
  <div class="register-link">
    Pas de compte ? <a href="register.php">Créez-en un</a>
  </div>
</div>

</body>
</html>
