<?php
    require_once("communication.php");
    require_once("connection.php");
    $conn = $entityManager->getConnection();

    // Zapytanie SQL dla INNER JOIN
    $sql = "SELECT * FROM tasks INNER JOIN people ON tasks.personID = people.personID WHERE people.personID = " . $_POST['personID'];
    $stmt = $conn->executeQuery($sql);
    $firstRow = true;
    
    echo '<a href="index.php" class="button">Powrót</a><br><br>';
    while ($row = $stmt->fetchAssociative()) 
    {
        if ($firstRow) 
        {
            // Drukuj informacje o osobie tylko raz, przed rozpoczęciem pętli z zadaniami
            echo "Person ID: " . $row['personID'] . "<br>";
            echo "Person Name: " . $row['name'] . "<br>";
            echo "Person Surname: " . $row['surname'] . "<br>";
            echo "<hr>";
            $firstRow = false;
        }

        // Drukuj informacje o zadaniach w każdej iteracji
        echo "Task ID: " .$row['ID'] . "<br>";
        echo "Task Content: " . $row['content'] . "<br>";
        
        echo "Is completed: ";
        if(!empty($row['isDone']))
            echo "Yes";
        else 
            echo "No";
        echo "<br>";
        echo "<hr>"; // Separator dla czytelności
    }

?>