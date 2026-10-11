<?php
session_start(); // Start the session to track login status
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agence de Voyage</title>
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
      <div class="auth-links">
    <?php if (isset($_SESSION['user_id'])): ?>
      <span class="welcome-text" style="color: #FF6347;">Bonjour, <?php echo $_SESSION['username']; ?></span>

      <a href="logout.php" class="btn-logout">Se déconnecter</a>
    <?php else: ?>
      <a href="login.php" class="btn-login">Se connecter</a>
    <?php endif; ?>
  </div>
    </ul>
  </nav>
</header>



  <!-- HERO SECTION avec slider -->
  <section class="hero">
    <div class="hero-slider">
      <div class="slide" style="background-image: url('img/paris2.jpg');">
        <div class="slide-content">
          <h1>Voyagez vers les plus belles destinations</h1>
          <p>Explorez le monde avec nos offres exceptionnelles.</p>
          <a href="destinations.php" class="btn-cta">Explorer maintenant</a>
        </div>
      </div>
      <div class="slide" style="background-image: url('img/tokyo2.jpg');">
        <div class="slide-content">
          <h1>Plongez dans la culture japonaise</h1>
          <p>Voyagez au cœur de Tokyo et découvrez une ville fascinante.</p>
          <a href="destinations.php" class="btn-cta">Explorer maintenant</a>
        </div>
      </div>
      <div class="slide" style="background-image: url('img/newyork2.jpg');">
        <div class="slide-content">
          <h1>New York, la ville qui ne dort jamais</h1>
          <p>Vivez l'expérience unique de la ville de l'énergie.</p>
          <a href="destinations.php" class="btn-cta">Explorer maintenant</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
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

  <script>
    // Select the hero slider
    const heroSlider = document.querySelector('.hero-slider');
    const slides = document.querySelectorAll('.hero-slider .slide');
    let currentIndex = 0;

    // Function to move the slider to the next slide
    function moveToNextSlide() {
      currentIndex = (currentIndex + 1) % slides.length; // Loop back to the first slide
      const offset = -currentIndex * 100; // Calculate the offset based on current index
      heroSlider.style.transform = `translateX(${offset}%)`;
    }

    // Set an interval to change slides every 5 seconds
    setInterval(moveToNextSlide, 5000);
  </script>

</body>
</html>
