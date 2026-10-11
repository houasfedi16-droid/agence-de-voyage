<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Paris - Agence de Voyage</title>
  <link rel="stylesheet" href="css/styles.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <style>
    /* 🎨 Your exact CSS from before */
    body {
        font-family: "Trebuchet MS", sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding-bottom: 60px;
    }
    header {
        width: 100%;
        background-color: #000000;
        padding: 20px;
        text-align: center;
        position: sticky;
        top: 0;
        z-index: 1000;
        margin: 0;
        left: 0;
    }
    header nav ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    header nav ul li {
        display: inline;
        margin-right: 20px;
    }
    header nav ul li a {
        text-decoration: none;
        color: white;
        font-size: 1.1rem;
        font-weight: bold;
    }
    header nav ul li a:hover {
        text-decoration: underline;
    }
    h1 {
        text-align: center;
        color: #e74c3c;
    }
    h2 {
        color: #333;
    }
    .container {
        max-width: 800px;
        margin: auto;
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    img {
        width: 100%;
        border-radius: 8px;
        height: auto;
    }
    .attractions {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }
    .attraction {
        flex: 1 1 45%;
        margin: 10px;
        background: #eaeaea;
        padding: 10px;
        border-radius: 5px;
        transition: transform 0.2s;
    }
    .attraction:hover {
        transform: scale(1.05);
    }
    ul {
        padding-left: 20px;
    }
    footer {
        background-color: #000000;
        color: white;
        text-align: center;
        padding: 10px 0;
        width: 100%;
        position: fixed;
        bottom: 0;
        left: 0;
        margin: 0;
    }
    footer a {
        margin-right: 15px;
    }
    footer a:last-child {
        margin-right: 0;
    }
    footer a:hover {
        color: #007bff;
    }
    footer p {
        margin: 0;
        font-size: 1rem;
    }
    .reserve-btn {
        padding: 10px;
        background-color: #e74c3c;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
    }
    .reserve-btn:hover {
        background-color: #c0392b;
    }
  </style>
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

  <div class="container">
    <h1>Explorez Paris</h1>
    <p>Bienvenue à Paris, la capitale française, connue comme la ville de l'amour et de la culture. Paris est célèbre pour ses monuments emblématiques, sa cuisine délicieuse et son ambiance romantique.</p>
    
    <h2>Attractions Célèbres</h2>
    <div class="attractions">
        <div class="attraction">
            <h3>Tour Eiffel</h3>
            <img src="img/tour eiffel.jpg" alt="Vue de la Tour Eiffel" />
            <p>La Tour Eiffel est l'un des monuments les plus reconnaissables au monde. Elle offre une vue imprenable sur la ville.</p>
        </div>
        <div class="attraction">
            <h3>Louvre</h3>
            <img src="img/louvre.jpg" alt="Musée du Louvre" />
            <p>Le Louvre est le plus grand musée d'art au monde, abritant des œuvres célèbres comme la Mona Lisa et la Vénus de Milo.</p>
        </div>
        <div class="attraction">
            <h3>Cathédrale Notre-Dame</h3>
            <img src="img/notre dame.jpg" alt="Cathédrale Notre-Dame" />
            <p>La Cathédrale Notre-Dame est un chef-d'œuvre de l'architecture gothique, célèbre pour ses vitraux et ses gargouilles.</p>
        </div>
        <div class="attraction">
            <h3>Montmartre</h3>
            <img src="img/montmartre.jpg" alt="Montmartre" />
            <p>Montmartre est un quartier artistique connu pour sa basilique du Sacré-Cœur et ses rues pittoresques.</p>
        </div>
    </div>

    <h2>Informations Pratiques</h2>
    <p>Pour profiter pleinement de votre visite à Paris, voici quelques conseils :</p>
    <ul>
        <li>Utilisez le métro pour vous déplacer facilement dans la ville.</li>
        <li>Essayez la cuisine française dans les bistrots locaux.</li>
        <li>Visitez les musées en semaine pour éviter les foules.</li>
        <li>Ne manquez pas de flâner le long de la Seine au coucher du soleil.</li>
    </ul>
    <br>

    <h2>Réservez Votre Voyage</h2>
    <form method="POST">
        <button type="submit" name="reserver" class="reserve-btn">Réserver Maintenant</button>
    </form>



<?php
    if (isset($_POST['reserver'])) {
        if (isset($_SESSION['user_id'])) {
            echo "<script>
            
            window.location.href = 'reservation.php';
            
            </script>";
        } else {
            echo "<script>alert('Veuillez vous connecter pour réserver.'); window.location.href='login.php';</script>";
        }
    }
    ?>

  </div>

  <footer>
    <p>&copy; 2024 Agence de Voyage - Tous droits réservés</p>
    <div>
      <a href="https://www.facebook.com/">
        <i class="fab fa-facebook-f"></i> Facebook
      </a>
      <a href="https://twitter.com/">
        <i class="fab fa-twitter"></i> Twitter
      </a>
      <a href="https://www.instagram.com/">
        <i class="fab fa-instagram"></i> Instagram
      </a>
    </div>
  </footer>

</body>
</html>
