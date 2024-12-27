<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the student ID is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the student details to pre-fill the form
    $sql = "SELECT id, name, age FROM student WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $student = $result->fetch_assoc();

    // Check if the student exists
    if (!$student) {
        die("Étudiant introuvable.");
    }
} else {
    die("ID d'étudiant manquant.");
}

// Update student if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];

    // Update student details in the database
    $sql_update = "UPDATE student SET name = ?, age = ? WHERE id = ?";
    $stmt = $conn->prepare($sql_update);
    $stmt->bind_param("sii", $name, $age, $id);

    if ($stmt->execute()) {
        // Redirect back to the main page
        header("Location: showstu.php");
        exit;
    } else {
        echo "Erreur lors de la mise à jour.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Étudiant</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #007bff, #6a11cb);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: 40%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            font-size: 14px;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="number"] {
            width: 91%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            background-color: #f9f9f9;
        }

        button {
            width: 95%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Modifier l'étudiant</h1>

    <form method="POST" action="">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($student['name']); ?>" required><br><br>

        <label for="age">Age:</label><br>
        <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($student['age']); ?>" required><br><br>

        <button type="submit">Mettre à jour</button>
    </form>

    <br>

</div>
</body>
</html>


