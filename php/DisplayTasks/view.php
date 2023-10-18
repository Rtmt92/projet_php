<?php
function display_tasks_view(){
echo "
<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <title>Manuel d'Utilisation de la To-Do List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        h2 {
            margin-top: 20px;
            color: #555;
        }
        p {
            line-height: 1.5;
            color: #333;
        }
        ol {
            padding-left: 20px;
            color: #333;
        }
        a {
            display: block;
            text-align: center;
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            margin-top: 20px;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Manuel d'Utilisation de la To-Do List</h1>

    <h2>Ajouter une Tâche</h2>
    <p>Pour ajouter une nouvelle tâche à votre liste :</p>
    <ol>
        <li>Cliquez dans la zone de texte 'Tâche'.</li>
        <li>Tapez la description de la tâche que vous souhaitez ajouter.</li>
        <li>Appuyez sur le bouton 'Ajouter'. La tâche sera ajoutée à la liste.</li>
    </ol>

    <h2>Supprimer une Tâche</h2>
    <p>Pour supprimer une tâche de la liste :</p>
    <ol>
        <li>Repérez la tâche que vous souhaitez supprimer.</li>
        <li>Cliquez sur le bouton 'Supprimer' à côté de la tâche. La tâche sera retirée de la liste.</li>
    </ol>

    <h2>Mettre à Jour une Tâche</h2>
    <p>Pour mettre à jour une tâche existante :</p>
    <ol>
        <li>Repérez la tâche que vous souhaitez mettre à jour.</li>
        <li>Remplissez la zone de texte la plus proche du boutton mettre a jour puis cliquez sur celui ci.</li>
    </ol>

    <h2>Marquer une Tâche comme Terminée</h2>
    <p>Pour marquer une tâche comme terminée :</p>
    <ol>
        <li>cliquez sur la section accéder a la progression</li>
        <li>Repérez la tâche que vous avez terminée.</li>
        <li>Ecrivez son statut dans la zone de texte puis cliquez sur enregistrer.</li>
    </ol>

    <h2>Conseils Supplémentaires</h2>
    <p>
        - Utilisez la To-Do List pour noter vos tâches importantes.<br>
        - Marquez les tâches terminées pour garder une trace de votre progression.<br>
    </p>

    <p>j'espere que cet outil vous aidera à gérer vos tâches de manière plus efficace. Bonne organisation !</p>
    
    <a href='../stream'>Accéder à la To-Do List</a>
</body>
</html>";
}
?>
