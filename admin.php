<?php
session_start();
include 'config.php';

// Access control
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    echo "<script>alert('Accès refusé.'); window.location.href='index.php';</script>";
    exit;
}

// CREATE
if (isset($_POST['create'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $defaultPassword = password_hash("default123", PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, passwd) VALUES ('$username', '$email', '$defaultPassword')";
    mysqli_query($conn, $sql);
}

// UPDATE
if (isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $sql = "UPDATE users SET username='$username', email='$email' WHERE id=$id";
    mysqli_query($conn, $sql);
}

// DELETE
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    mysqli_query($conn, "DELETE FROM users WHERE id=$id");
}

// READ
$users = mysqli_query($conn, "SELECT id, username, email FROM users");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - Gérer les utilisateurs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            background-color: #f4f4f4;
        }

        h1 {
            color: #2a9d8f;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
        }

        th {
            background-color: #2a9d8f;
            color: white;
        }

        form input {
            padding: 8px;
            margin: 5px;
        }

        form button {
            padding: 10px 15px;
            background-color: #2a9d8f;
            color: white;
            border: none;
            cursor: pointer;
        }

        a {
            color: red;
            text-decoration: none;
        }
    </style>
</head>
<body>

<h1>Admin - Gérer les utilisateurs</h1>



<!-- Users Table -->
<h2>Liste des utilisateurs</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom d'utilisateur</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($users)) { ?>
        <tr>
            <form method="POST">
                <td><?= $row['id'] ?><input type="hidden" name="id" value="<?= $row['id'] ?>"></td>
                <td><input type="text" name="username" value="<?= htmlspecialchars($row['username']) ?>"></td>
                <td><input type="email" name="email" value="<?= htmlspecialchars($row['email']) ?>"></td>
                <td>
                    <button type="submit" name="update">Mettre à jour</button>
                    <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Supprimer cet utilisateur ?')">Supprimer</a>
                </td>
            </form>
        </tr>
        <?php } ?>
    </tbody>
</table>

<a href="logout.php">Se déconnecter</a>

</body>
</html>
