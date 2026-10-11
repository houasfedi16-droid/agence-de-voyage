<?php
// Include the database connection
include 'config.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data safely
    $username = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password']; // Raw input

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user
    $sql = "INSERT INTO users (username, email, passwd) VALUES ('$username', '$email', '$hashed_password')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Inscription réussie !'); window.location.href='login.php';</script>";
    } else {
        echo "Erreur : " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Créer un compte - Agence de Voyage</title>
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

    .register-container {
      background-color: white;
      padding: 40px 30px;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 400px;
      text-align: center;
    }

    .register-container h2 {
      margin-bottom: 30px;
      color: #333;
      font-size: 2rem;
    }

    .register-container form input {
      width: 100%;
      padding: 12px 15px;
      margin-bottom: 20px;
      border: 2px solid #ccc;
      border-radius: 10px;
      font-size: 1rem;
      transition: border-color 0.3s;
    }

    .register-container form input:focus {
      border-color: #2a9d8f;
      outline: none;
    }

    .register-container button {
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

    .register-container button:hover {
      background-color: #219d79;
    }

    .login-link {
      margin-top: 20px;
      font-size: 1rem;
      color: #555;
    }

    .login-link a {
      color: #2a9d8f;
      text-decoration: none;
      font-weight: bold;
    }

    .login-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<div class="register-container">
  <h2>Créer un compte</h2>
  <form action="" method="POST">
    <input type="text" name="name" placeholder="Nom complet" required>
    <input type="email" name="email" placeholder="Adresse Email" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button type="submit">S'inscrire</button>
  </form>
  <div class="login-link">
    Vous avez déjà un compte ? <a href="login.php">Connectez-vous</a>
  </div>
</div>

</body>
</html>
