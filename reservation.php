<?php
// Include the database connection file
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data and insert into database
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $type_voyage = $_POST['type_voyage'];
    $date_depart = $_POST['date_depart'];
    $date_retour = $_POST['date_retour'];
    $methode_paiement = $_POST['methode_paiement'];
    $assurance = $_POST['assurance'];  // Hidden field that is always set to TRUE

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO reservations (nom, email, telephone, type_voyage, date_depart, date_retour, methode_paiement, assurance) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $nom, $email, $telephone, $type_voyage, $date_depart, $date_retour, $methode_paiement, $assurance);

    // Execute the query and check for success
    if ($stmt->execute()) {
        echo "<script>alert('Réservation réussie !');</script>";
    } else {
        echo "<script>alert('Erreur lors de la réservation.');</script>";
    }

    // Close the prepared statement and the database connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation de Voyage</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        form {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"], input[type="email"], input[type="date"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="text"]:focus, input[type="email"]:focus, input[type="date"]:focus, select:focus {
            border-color: #5d9b9b;
            outline: none;
        }

        select {
            background-color: #fff;
        }

        .payment-methods label {
            display: inline-block;
            margin-right: 15px;
            font-weight: normal;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #5d9b9b;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #4a7c7c;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            form {
                padding: 20px;
            }
            h1 {
                font-size: 24px;
            }
        }

    </style>
</head>
<body>
    <h1>Formulaire de Réservation</h1>
    <form method="POST" action="">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="telephone">Numéro de Téléphone:</label>
        <input type="text" id="telephone" name="telephone"><br><br>

        <label for="type_voyage">Type de Voyage:</label>
        <select id="type_voyage" name="type_voyage" required>
            <option value="Voyage en Groupe">Voyage en Groupe</option>
            <option value="Voyage Personnalisé">Voyage Personnalisé</option>
        </select><br><br>

        <label for="date_depart">Date de Départ:</label>
        <input type="date" id="date_depart" name="date_depart" required><br><br>

        <label for="date_retour">Date de Retour:</label>
        <input type="date" id="date_retour" name="date_retour" required><br><br>

        <label for="methode_paiement">Méthode de Paiement:</label>
        <div class="payment-methods">
            <label>
                <input type="radio" name="methode_paiement" value="Carte de Crédit" required> Carte de Crédit
            </label>
            <label>
                <input type="radio" name="methode_paiement" value="PayPal" required> PayPal
            </label>
            <label>
                <input type="radio" name="methode_paiement" value="Virement Bancaire" required> Virement Bancaire
            </label>
        </div><br><br>

        <!-- Hidden assurance field that is auto-checked -->
        <input type="hidden" name="assurance" value="1">

        <button type="submit">Réserver Maintenant</button>
    </form>
</body>
</html>
