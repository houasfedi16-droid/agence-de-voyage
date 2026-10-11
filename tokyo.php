<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explorez Tokyo</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        /* 🎨 Your exact original CSS */
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
            margin-top: 10px;
            font-size: 1rem;
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
    <h1>Explorez Tokyo</h1>
    <p>Bienvenue à Tokyo, la capitale du Japon, connue pour son mélange unique de tradition et de modernité. Tokyo est célèbre pour ses gratte-ciels, sa cuisine délicieuse et sa culture vibrante.</p>

    <h2>Attractions Célèbres</h2>
    <div class="attractions">
        <div class="attraction">
            <h3>Tour de Tokyo</h3>
            <img src="img/tokyo tour.jpg" alt="Tour de Tokyo" />
            <p>La Tour de Tokyo est un symbole emblématique de la ville, offrant une vue panoramique spectaculaire.</p>
        </div>
        <div class="attraction">
            <h3>Temple Senso-ji</h3>
            <img src="img/temple.jpg" alt="Temple Senso-ji" />
            <p>Le Temple Senso-ji est le plus ancien temple de Tokyo, célèbre pour son architecture traditionnelle et son ambiance spirituelle.</p>
        </div>
        <div class="attraction">
            <h3>Shibuya Crossing</h3>
            <img src="img/Shibuya crosing.jpg" alt="Shibuya Crossing" />
            <p>Shibuya Crossing est l'un des carrefours les plus fréquentés au monde, symbole de l'énergie de Tokyo.</p>
        </div>
        <div class="attraction">
            <h3>Parc Ueno</h3>
            <img src="img/ciliegi-in-fiore.jpg" alt="Parc Ueno" />
            <p>Le Parc Ueno est un grand parc public célèbre pour ses musées, ses jardins et ses cerisiers en fleurs au printemps.</p>
        </div>
    </div>

    <h2>Informations Pratiques</h2>
    <ul>
        <li>Utilisez le réseau de trains et de métros pour vous déplacer facilement dans la ville.</li>
        <li>Goûtez aux spécialités japonaises dans les izakayas et les restaurants locaux.</li>
        <li>Visitez les attractions tôt le matin pour éviter les foules.</li>
        <li>Ne manquez pas de découvrir les quartiers animés comme Akihabara et Harajuku.</li>
    </ul>

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

</body>
</html>
