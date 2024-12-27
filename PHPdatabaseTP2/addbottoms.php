<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #007bff, #6a11cb);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }
        .container h1 {
            margin-bottom: 20px;
        }
        .container button {
            background-color:#3e5382 ;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin: 10px;
            transition: background-color 0.3s;
        }
        .container button:hover {
            background-color: #c5d3b2;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Management Dashboard</h1>
    <button type="button" onclick="window.location.href='addstudent.php'">Ajouter etudient</button>
    <button type="button" onclick="window.location.href='showstu.php'">Afficher étudiant</button>
    <button onclick="location.href='add_etablissement.php'">ajouter Etablissement</button>
    <button onclick="location.href='affiche_etablissement.php'">Afficher Etablissement</button>
</div>
</body>
</html>


