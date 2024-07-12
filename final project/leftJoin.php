<?php
    require_once("communication.php");
    require_once("connection.php");
    $conn = $entityManager->getConnection();

    // Zapytanie SQL dla LEFT JOIN
    $sql = "SELECT DISTINCT people.personID, people.name, people.surname 
            FROM people 
            LEFT JOIN tasks 
            ON people.personID = tasks.personID";   //ew. SELECT DISTINCT
            
    $stmt = $conn->executeQuery($sql);

    echo '<a href="index.php" class="button">Powrót</a><br><br>';
    while ($row = $stmt->fetchAssociative()) 
    {

        echo "Person ID: " . $row['personID'] . "<br>";
        echo "Person Name: " . $row['name'] . "<br>";
        echo "Person Surname: " . $row['surname'] . "<br>";
        echo "<hr>";
    }

    //01:45 - projekt uznaje za skończony
?>