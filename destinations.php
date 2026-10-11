<?php
// Include your database connection
include('config.php');

// Fetch destinations from database
$query = "SELECT * FROM destination";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Destinations - Agence de Voyage</title>
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

  <section class="destinations">
    <h2>Nos Destinations Populaires</h2>

    <div class="destination-list">
      <?php
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          ?>
          <div class="card" style="width: 18rem;">
            <img src="img/<?php echo htmlspecialchars($row['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['titre']); ?>">
            <div class="card-body">
              <h3 class="card-title"><?php echo htmlspecialchars($row['titre']); ?></h3>
              <p class="card-text"><?php echo htmlspecialchars($row['descrep']); ?></p>
              <a href="<?php echo strtolower($row['titre']); ?>.php" class="btn btn-primary">Découvrir</a>
            </div>
          </div>
          <?php
        }
      } else {
        echo "<p>Aucune destination trouvée.</p>";
      }
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
