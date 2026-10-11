<?php
// Start session if needed
// session_start(); // Uncomment if you need sessions

// Include database connection
include 'config.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize inputs
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $sujet = mysqli_real_escape_string($conn, $_POST['sujet']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Insert into database
    $sql = "INSERT INTO contact (nom, email, sujet, message) VALUES ('$nom', '$email', '$sujet', '$message')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Message envoyé avec succès !'); window.location.href='index.php';</script>";
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
  <title>Contact - Agence de Voyage</title>
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css">
 
    
 
</head>
<body>

<header>
  <nav>
  <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="destinations.php">Destinations</a></li>
        <li><a href="services.php">Nos Services</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
  </nav>
</header>

<h1>Contactez-nous</h1>

<form action="" method="POST">
  <label for="nom">Nom :</label>
  <input type="text" id="nom" name="nom" required>

  <label for="email">Email :</label>
  <input type="email" id="email" name="email" required>

  <label for="sujet">Sujet :</label>
  <input type="text" id="sujet" name="sujet" required>

  <label for="message">Message :</label>
  <textarea id="message" name="message" rows="5" required></textarea>

  <button type="submit">Envoyer</button>
</form>

<footer>
  <p>&copy; 2024 Agence de Voyage - Tous droits réservés</p>
  <div>
    <a href="https://www.facebook.com/" target="_blank">
        <i class="fab fa-facebook-f"></i> Facebook
    </a>
    <a href="https://twitter.com/" target="_blank">
        <i class="fab fa-twitter"></i> Twitter
    </a>
    <a href="https://www.instagram.com/" target="_blank">
        <i class="fab fa-instagram"></i> Instagram
    </a>
  </div>
</footer>

<script src="script.js"></script>

</body>
</html>
