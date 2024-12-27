<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Étudiants</title>
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
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 800px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .no-data {
            text-align: center;
            color: #888;
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
        <button type="button" onclick="window.location.href='addstudent.php'">Ajouter Etudiant</button>
    </div>
    <h1>Liste des Étudiants</h1>
    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Etablissement</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $servername = "localhost";  // Change if your server name is different
        $username = "root";  // Your database username
        $password = "";  // Your database password
        $dbname = "users";  // Your database name

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT student.name, student.age, etab.name AS etab_name FROM student 
                JOIN etab ON student.etablissement_id = etab.id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . htmlspecialchars($row["name"]) . "</td><td>" . htmlspecialchars($row["age"]) . "</td><td>" . htmlspecialchars($row["etab_name"]) . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3' class='no-data'>No students found</td></tr>";
        }

        $conn->close();
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
