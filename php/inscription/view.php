<?php
function display_todo_list() {
    $dsn = "mysql:host=localhost;dbname=php_project;charset=utf8mb4";
    $db_username = "root";
    $db_password = "admin";

    try {
        $pdo = new PDO($dsn, $db_username, $db_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $err) {
        die("Erreur de connexion à la base de données : " . $err->getMessage());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["save_state"])) {
            $taskId = $_POST["task_id"];
            $newState = $_POST["state"];

            $sql = "UPDATE taches SET etat = :newState WHERE id = :taskId";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':newState', $newState);
            $stmt->bindParam(':taskId', $taskId);
            $stmt->execute();
        }
    }

    echo '
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Ma To-Do List</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f2f2f2;
                margin: 0;
                padding: 0;
                text-align: center;
            }
    
            h1 {
                background-color: #007BFF;
                color: #fff;
                padding: 10px 0;
            }
    
            ul {
                list-style: none;
                padding: 0;
            }
    
            li {
                background-color: #fff;
                border: 1px solid #ccc;
                border-radius: 5px;
                margin: 10px 0;
                padding: 10px;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
    
            label {
                flex: 1;
                font-size: 18px;
            }
    
            input[type="text"] {
                flex: 2;
                border: 1px solid #ccc;
                border-radius: 5px;
                padding: 5px;
                margin-right: 10px;
            }
    
            button {
                background-color: #007BFF;
                color: #fff;
                border: none;
                border-radius: 5px;
                padding: 5px 10px;
                cursor: pointer;
            }
    
            button:hover {
                background-color: #0056b3;
            }
        </style>
    </head>
    <body>
        <h1>Ma To-Do List</h1>
        <ul>';

        $resultat = $pdo->query("SELECT * FROM taches");

        if ($resultat->rowCount() > 0) {
            while ($row = $resultat->fetch()) {
                echo '<li>';
                echo htmlspecialchars($row["tache"]);

                echo '<form method="post" action="">';
                echo '<input type="hidden" name="task_id" value="' . $row["id"] . '">';
                echo '<input type="text" name="state" value="' . htmlspecialchars($row["etat"]) . '" required>';
                echo '<button type="submit" name="save_state">Enregistrer</button>';
                echo '</form>';

                echo '</li>';
            }
        } else {
            echo "Aucune tâche dans la liste.";
        }
        echo '
        </ul>
        <div class="button-container">
            <a href="../stream"><button>revenir a la to-do list</button></a>
        </div>
    </body>
    </html>';
}
display_todo_list();
?>
