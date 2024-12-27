<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #007bff, #6a11cb);
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 800px;
        }

        .formule {
            flex: 1;
            padding: 20px 30px;
            text-align: center;
        }

        .formule h1 {
            margin-bottom: 10px;
            font-size: 24px;
            color: #333;
        }

        .formule div {
            margin-bottom: 30px;
            text-align: left;
        }

        .formule label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        .formule input[type="text"],
        .formule input[type="password"] {
            width: 95%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        .formule input[type="submit"],
        .formule button {
            background-color: #4d6bb0;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            width: 100%;
            margin-top: 10px;
        }

        .formule input[type="submit"]:hover,
        .formule button:hover {
            background-color: seagreen;
        }

        .formule .success-message {
            color: red;
            font-size: 16px;
            margin-top: 10px;
        }

        .image-section {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.3);
            padding: 20px;
        }

        .image-section img {
            max-width: 100%;
            max-height: 200px;
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<div class="container">
    <div class="formule">
        <h1>Login</h1>
        <form method="post" action="">
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your name..." />
            </div>
            <div>
                <label for="modepass">Password:</label>
                <input type="password" id="modepass" name="password" placeholder="Enter your modepass..." />
            </div>
            <div>
                <input type="submit" name="valider" value="Login" />
                <?php
                session_start();
                @$login = $_POST['name'];
                @$password = $_POST['password'];
                @$valider = $_POST['valider'];
                $bonLogin = "user";
                $bonPass = "123456789";
                $erreur = "";
                if (isset($valider)) {
                    if ($login == $bonLogin && $password == $bonPass) {
                        $_SESSION["autoriser"] = "oui";
                        header("location:addbottoms.php");
                        exit();
                    } else {
                        $erreur = "Mauvais login ou mot de passe";
                    }
                }
                ?>
            </div>
        </form>
    </div>
    <div class="image-section">
        <img src="avatarblue.png" alt="User Avatar" />
    </div>
</div>
</body>
</html>

