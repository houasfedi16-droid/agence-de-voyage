<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nos Services - Agence de Voyage</title>
  <link rel="stylesheet" href="css/styles.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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

  <section class="services">
    <h2>Nos Services</h2>
    <div class="service-list">
      <?php
        include 'config.php';

        $sql = "SELECT * FROM service";
        
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo '<div class="service-card">';
            echo '<h3>' . htmlspecialchars($row["titre"]) . '</h3>';
            echo '<p>' . htmlspecialchars($row["descrep"]) . '</p>';
            echo '<a href="' . htmlspecialchars($row["page_link"]) . '" class="btn-details">Voir les détails</a>';
            echo '</div>';
          }
        } else {
          echo "<p>Aucun service disponible pour le moment.</p>";
        }

        $conn->close();
      ?>
    </div>
  </section>

  <footer>
    <p>&copy; 2024 Agence de Voyage - Tous droits réservés</p>
    <div>
      <a href="https://www.facebook.com/" class="text-white me-3">
        <i class="fab fa-facebook-f"></i> Facebook
      </a>
      <a href="https://twitter.com/" class="text-white me-3">
        <i class="fab fa-twitter"></i> Twitter
      </a>
      <a href="https://www.instagram.com/" class="text-white">
        <i class="fab fa-instagram"></i> Instagram
      </a>
    </div>
  </footer>

  <script src="script.js"></script>
</body>
</html>
