<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Établissement</title>
    <style>
        /* Styles globaux */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #007bff, #6a11cb);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #ffffff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            width: 400px;
        }

        h1 {
            color: #1976d2; /* Bleu pour le titre */
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            color: #1565c0; /* Bleu foncé */
            margin: 10px 0 5px;
        }

        input, select, button {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            border: 1px solid #90caf9; /* Bordure bleu clair */
            border-radius: 8px;
            box-sizing: border-box;
        }

        input:focus, select:focus {
            outline: none;
            border-color: #1976d2; /* Bordure bleu foncé en focus */
            box-shadow: 0 0 5px rgba(25, 118, 210, 0.5);
        }

        button {
            background-color: #1976d2; /* Bleu bouton */
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #1565c0; /* Bleu légèrement plus foncé */
        }

        button:active {
            background-color: #0d47a1; /* Bleu encore plus foncé à l'activation */
        }

        /* Messages d'erreur ou de succès */
        .message {
            text-align: center;
            font-size: 14px;
            margin-top: 10px;
        }

        .success {
            color: #2e7d32; /* Vert pour le succès */
        }

        .error {
            color: #d32f2f; /* Rouge pour les erreurs */
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .button-container button {
            flex: 1;
            margin: 0 5px;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #1976d2;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button-container button:hover {
            background-color: #1565c0;
        }

        .button-container button:active {
            background-color: #0d47a1;
        }
    </style>
</head>
<body>
<div class="form-container">
    <div class="button-container">
        <button type="button" onclick="window.location.href='showstu.php'">Afficher Étudiant</button>
        <button type="button" onclick="window.location.href='addstudent.php'">Ajouter etudient</button>
        <button type="button" onclick="window.location.href='affiche_etablissement.php'">Afficher Établissement</button>
    </div>
    <h1>Ajouter un Établissement</h1>
    <form action="" method="POST">
        <label for="name">Nom de l'Établissement :</label>
        <input type="text" id="name" name="name" required><br>

        <button type="submit" name="valider_etab">Ajouter</button>
        <?php
        if (isset($_POST['valider_etab'])) {
            session_start();
            $servername = "localhost";  // Change if your server name is different
            $username = "root";  // Your database username
            $password = "";  // Your database password
            $dbname = "users";  // Your database name

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $name = $_POST['name'];
            if (!empty($name)) {
                $sql = "INSERT INTO etab (name) VALUES ('$name')";

                if ($conn->query($sql) === TRUE) {
                    echo "<p class='success'>Record added successfully!</p>";
                } else {
                    echo "<p class='error'>Error: " . $sql . "<br>" . $conn->error . "</p>";
                }
            } else {
                echo "<p class='error'>All fields are required!</p>";
            }

            $conn->close();
        }
        ?>
    </form>
</div>
</body>
</html>
