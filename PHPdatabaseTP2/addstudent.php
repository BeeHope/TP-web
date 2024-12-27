<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Étudiant</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #007bff, #6a11cb);
            color: #444;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #ffffff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h1 {
            color: #333333;
            margin-bottom: 20px;
            font-size: 24px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-size: 14px;
            font-weight: bold;
            color: #555555;
        }

        input[type="text"],
        input[type="number"],
        select,
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            margin-bottom: 15px;
            border: 1px solid #dddddd;
            border-radius: 6px;
            font-size: 14px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        select:focus {
            border-color: #007bff;
            outline: none;
        }

        input[type="submit"] {
            background: linear-gradient(90deg, #007bff, #0056b3);
            color: #ffffff;
            border: none;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background: linear-gradient(90deg, #0056b3, #003f8c);
        }

        .message {
            text-align: center;
            font-size: 14px;
            margin-top: 10px;
        }

        .success {
            color: #2e7d32; /* Green for success */
        }

        .error {
            color: #d32f2f; /* Red for error */
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
<div class="container">
    <div class="button-container">
        <button type="button" onclick="window.location.href='showstu.php'">Afficher Étudiant</button>
        <button type="button" onclick="window.location.href='add_etablissement.php'">Ajouter Établissement</button>
        <button type="button" onclick="window.location.href='affiche_etablissement.php'">Afficher Établissement</button>
    </div>
    <h1>Ajouter Étudiant</h1>
    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br>
        <label for="etab">Nom de l'Établissement :</label>
        <select id="etab" name="etab" required>
            <?php
// Fetch the list of establishments from the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name FROM etab";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<option value='" . htmlspecialchars($row["name"]) . "'>" . htmlspecialchars($row["name"]) . "</option>";
    }
} else {
    echo "<option value=''>No establishments available</option>";
}

$conn->close();
?>
</select>
<input type="submit" name="valider_student" value="Add Student">
<?php
if (isset($_POST['valider_student'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "users";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = $_POST['name'];
    $age = $_POST['age'];
    $etab = $_POST['etab'];
    if (!empty($name) && !empty($age) && !empty($etab)) {
        $sql = "INSERT INTO student (name, age, etablissement_id) VALUES ('$name', '$age', (SELECT id FROM etab WHERE name='$etab'))";

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
