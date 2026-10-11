<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explorez New York</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
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
        <h1>Explorez New York</h1>
        <p>Bienvenue à New York, la ville qui ne dort jamais. Connue pour ses gratte-ciels emblématiques, sa culture diversifiée et son ambiance dynamique, New York est une destination incontournable.</p>
        
        <h2>Attractions Célèbres</h2>
        <div class="attractions">
            <div class="attraction">
                <h3>Statue de la Liberté</h3>
                <img src="img/statue-liberté-manhattan.jpg" alt="Statue de la Liberté" />
                <p>La Statue de la Liberté est un symbole de liberté et d'espoir, offrant une vue imprenable sur le port de New York.</p>
            </div>
            <div class="attraction">
                <h3>Central Park</h3>
                <img src="img/centralpark.jpg" alt="Central Park" />
                <p>Central Park est un vaste espace vert au cœur de Manhattan, parfait pour se détendre, faire du jogging ou pique-niquer.</p>
            </div>
            <div class="attraction">
                <h3>Times Square</h3>
                <img src="img/Times-Square-New-York-City.jpg" alt="Times Square" />
                <p>Times Square est célèbre pour ses lumières vives et son ambiance animée, un lieu incontournable pour les visiteurs.</p>
            </div>
            <div class="attraction">
                <h3>Empire State Building</h3>
                <img src="img/empire.jpg" alt="Empire State Building" />
                <p>L'Empire State Building est l'un des gratte-ciels les plus emblématiques de New York, offrant une vue panoramique spectaculaire depuis son observatoire.</p>
            </div>
        </div>

        <h2>Informations Pratiques</h2>
        <p>Pour profiter pleinement de votre visite à New York, voici quelques conseils :</p>
        <ul>
            <li>Utilisez le métro pour vous déplacer rapidement dans la ville.</li>
            <li>Explorez les différents quartiers pour découvrir la diversité culturelle de New York.</li>
            <li>Visitez les attractions tôt le matin ou en fin d'après-midi pour éviter les foules.</li>
            <li>Ne manquez pas de goûter à la cuisine de rue, notamment les célèbres hot-dogs et les pretzels.</li>
        </ul><br>
        
        <h2>Réservez Votre Voyage</h2>

        <!-- Booking Button -->
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

</body>
</html>
