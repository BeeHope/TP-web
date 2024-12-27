<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <style>
        body {
            font-family: Verdana, sans-serif;
            font-size: 12pt;
            background-color: #fafafa;
            color: #4a4a4a;
            margin: 20px;
            line-height: 1.6;
        }

        h1 {
            color: #2a7f62;
            text-align: center;
            margin-bottom: 40px;
            text-transform: uppercase;
        }

        h2 {
            color: #fff;
            background-color: #2a7f62;
            padding: 10px 15px;
            text-align: left;
            margin: 0;
            border-radius: 8px 8px 0 0;
            font-size: 1.2em;
            text-transform: uppercase;
            cursor: pointer;
        }

        u {
            color: black;
            font-size: 0.9em;
        }

        .section {
            margin-bottom: 40px;
            display: inline-block;
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #fff;
            color: #333;
            display: none; /* Hide all tables initially */
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #74c8b3;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            text-align: left;
        }

        tr:hover {
            background-color: #a8d7b9;
        }

        b {
            color: #2a7f62;
        }

        .container {
            max-width: 90%;
            margin: auto;
        }

    </style>
    <script>
        function toggleTable(tableId) {
            var table = document.getElementById(tableId);
            if (table.style.display === "none") {
                table.style.display = "table";  // Show the table
            } else {
                table.style.display = "none";   // Hide the table
            }
        }
    </script>
</head>
<body>
<div class="container">
    <h1>Manipulation des Tableaux en PHP</h1>
    <?php
    $tab = array("Karim", "Maroua", "Aya", "Mohammed", "Fatima");

    // 1
    echo "<div class='section'>";
    echo "<h2 onclick='toggleTable(\"table1\")'>Affichage du tableau :</h2>";
    echo "<table id='table1'>";
    echo "<tr><th>Index</th><th>Nom</th></tr>";
    foreach ($tab as $index => $element) {
        echo "<tr><td>" . ($index + 1) . "</td><td>$element</td></tr>";
    }
    echo "</table>";
    echo "</div>";

    // 2
    echo "<div class='section'>";
    echo "<h2 onclick='toggleTable(\"table2\")'>Ajouter un étudiant :</h2>";
    echo "<h4>Ajout de <b>Salim</b> au tableau :</h4>";
    $tab[] = 'Salim';
    echo "<table id='table2'>";
    echo "<tr><th>Index</th><th>Nom</th></tr>";
    foreach ($tab as $index => $element) {
        echo "<tr><td>" . ($index + 1) . "</td><td>$element</td></tr>";
    }
    echo "</table>";
    echo "</div>";

    // 3
    echo "<div class='section'>";
    echo "<h2 onclick='toggleTable(\"table3\")'>Supprimer un étudiant :</h2>";
    echo "<h4>Suppression de <b>Karim</b> du tableau :</h4>";
    $key = array_search("Karim", $tab);
    if ($key !== false) {
        unset($tab[$key]);
    }
    echo "<table id='table3'>";
    echo "<tr><th>Index</th><th>Nom</th></tr>";
    foreach ($tab as $index => $element) {
        echo "<tr><td>" . ($index + 1) . "</td><td>$element</td></tr>";
    }
    echo "</table>";
    echo "</div>";

    // 4
    echo "<div class='section'>";
    echo "<h2 onclick='toggleTable(\"table4\")'>Rechercher un étudiant :</h2>";
    echo "<h4>Recherche de <b>Mohammed</b> dans le tableau :</h4>";
    $key = array_search("Mohammed", $tab);
    if ($key !== false) {
        echo "<u>Nom trouvé : $tab[$key]<br /></u>";
    } else {
        echo "<u>Nom non trouvé<br /></u>";
    }
    echo "</div>";

    // 5
    echo "<div class='section'>";
    echo "<h2 onclick='toggleTable(\"table5\")'>Modifier un étudiant :</h2>";
    echo "<h4>Modification de <b>Salim</b> en <b>Daniel</b> dans le tableau :</h4>";
    $key = array_search("Salim", $tab);
    if ($key !== false) {
        $tab[$key] = "Daniel";
    }
    echo "<table id='table5'>";
    echo "<tr><th>Index</th><th>Nom</th></tr>";
    foreach ($tab as $index => $element) {
        echo "<tr><td>" . ($index + 1) . "</td><td>$element</td></tr>";
    }
    echo "</table>";
    echo "</div>";

    // 6
    echo "<div class='section'>";
    echo "<h2 onclick='toggleTable(\"table6\")'>Parcourir le tableau avec une boucle :</h2>";
    foreach ($tab as $elem) {
        echo "<u>$elem<br /></u>";
    }
    echo "</div>";

    // 7
    echo "<div class='section'>";
    echo "<h2 onclick='toggleTable(\"table7\")'>Trier le tableau :</h2>";
    sort($tab);
    echo "<table id='table7'>";
    echo "<tr><th>Index</th><th>Nom</th></tr>";
    foreach ($tab as $index => $element) {
        echo "<tr><td>" . ($index + 1) . "</td><td>$element</td></tr>";
    }
    echo "</table>";
    echo "</div>";

    // 8
    echo "<div class='section'>";
    echo "<h2 onclick='toggleTable(\"table8\")'>Inverser l'ordre du tableau :</h2>";
    $tabInverse = array_reverse($tab);
    echo "<table id='table8'>";
    echo "<tr><th>Index</th><th>Nom</th></tr>";
    foreach ($tabInverse as $index => $element) {
        echo "<tr><td>" . ($index + 1) . "</td><td>$element</td></tr>";
    }
    echo "</table>";
    echo "</div>";

    // 9
    echo "<div class='section'>";
    echo "<h2 onclick='toggleTable(\"table9\")'>Compter les éléments du tableau :</h2>";
    $numberOfElements = count($tab);
    echo "<u>Le tableau contient $numberOfElements éléments.<br /></u>";
    echo "</div>";

    // 10
    echo "<div class='section'>";
    echo "<h2 onclick='toggleTable(\"table10\")'>Afficher un tableau associatif :</h2>";
    $tabAssoc = array("Karim" => "22", "Maroua" => "24");
    echo "<table id='table10'>";
    echo "<tr><th>Nom</th><th>Âge</th></tr>";
    foreach ($tabAssoc as $key => $element) {
        echo "<tr><td>$key</td><td>$element</td></tr>";
    }
    echo "</table>";
    echo "</div>";
    ?>
</div>
</body>
</html>
