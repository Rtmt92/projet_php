<?php
function display_tasks_view(){
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
    $tache = $_POST["tache"];


    if (!empty($tache)) {
        $query = "INSERT INTO taches (tache) VALUES (:tache)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':tache', $tache);
        $stmt->execute();
    }

    if (isset($_POST["delete_task"])) {
        $id = $_POST["delete_task"];

        $stmt = $pdo->prepare("DELETE FROM taches WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    if (isset($_POST["update_task"]) && isset($_POST["new_task"])) {
        $taskId = $_POST["update_task"];
        $newTask = $_POST["new_task"];
        $sql = "UPDATE taches SET tache = :newTask WHERE id = :taskId";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':newTask', $newTask);
        $stmt->bindParam(':taskId', $taskId);
        $stmt->execute();
    }
};

echo '<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Ma To-Do List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        .task {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 10px 0;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
        }
        label {
            flex: 1;
            font-size: 18px;
        }
        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        form {
            display: flex;
        }
        input[type="text"] {
            flex: 2;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 5px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ma To-Do List</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="tache">Tâche</label>
                <input type="text" id="tache" name="tache" placeholder="Ajouter une tâche" required>
                <button type="submit" name="add_task">Ajouter</button>
            </div>
        </form>
        <ul>';
            $resultat = $pdo->query("SELECT * FROM taches");

            if ($resultat->rowCount() > 0) {
                while ($row = $resultat->fetch()) {
                    echo '<li class="task">';
                    echo htmlspecialchars($row["tache"]);

                    echo '<form method="post" action="">';
                    echo '<input type="hidden" name="delete_task" value="' . $row["id"] . '">';
                    echo '<button type="submit">Supprimer</button>';
                    echo '</form>';

                    echo '<form method="post" action="">';
                    echo '<input type="hidden" name="update_task" value="' . $row["id"] . '">';
                    echo '<input type="text" name="new_task" placeholder="Nouvelle tâche" required>';
                    echo '<button type="submit">Mettre à jour</button>';
                    echo '</form>';
                    
                    echo '</li>';
                }
            } else {
                echo "Aucune tâche dans la liste.";
            }
        echo'
        </ul>
        <div class="button-container">
            <a href="../sign"><button>Accéder a la progression</button></a>
        </div>
    </div>
</body>
</html>';
}
