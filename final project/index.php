<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href = "style.css">
    <title>web design is my passion</title>
</head>
<body>
    <?php
      require "connection.php";
      require "communication.php";

      header("Cache-Control: no-cache, must-revalidate");
      header("Pragma: no-cache");
      header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past


      $tasks = fetchTask($entityManager);
      $people = fetchPeople($entityManager);
    ?>
    <section class = "twoTables">
      <div class = "tableBox">
      <?php foreach($tasks as $task){ ?> 
        <form action="taskUpdateDelete.php" method="POST">
            <div class = "instanceBox">
              <div class="idBox">
              <?php echo "ID: #" . $task->getID() ?>
                <input type="text" name = "ID" value = "<?php echo $task->getID() ?>" hidden required>
              </div>
              <div class="contentBox">
                <input type="text" name = "content" value = "<?php echo $task->getContent(); ?>" required>
              </div>
              <div class="doubleBox">
                <div class = "element">
                  ID wykonawcy: <input type = "text" name = "personID" value = "<?php echo $task->getPersonID(); ?>" required>
                </div>
                <div class = "element">
                  Wykonane: <input type = "checkbox" name = "completion" value = "1" <?php if( $task->getCompletion()) echo "checked" ?>>
                </div>
              </div>
              <div class="doubleBox">
              <div class = "element">
                <input type = "submit" name="action" value = "Zaktualizuj">
              </div>
                <div class = "element">
                  <input type = "submit" name="action" value = "Usuń">
                </div>
              </div>
            </div>
        </form>
        <?php } ?>
      </div>
      <div class = "tableBox">
      <?php foreach($people as $person){ ?> 
        <form action="personUpdateDelete.php" method="POST">
            <div class = "instanceBox">
              <div class="idBox" id="personIDBOX">
              <?php echo "ID: #" . $person->getID() ?>
                <input type="text" name = "ID" value = "<?php echo $person->getID() ?>" hidden required>
              </div>
              <input type = "text" name = "name" value = "<?php echo $person->getName(); ?>" required>
              <input type = "text" name = "surname" value = "<?php echo $person->getSurname(); ?>">
              <div class="doubleBox">
              <div class = "element">
                <input type = "submit" name="action" value = "Zaktualizuj">
              </div>
                <div class = "element">
                  <input type = "submit" name="action" value = "Usuń">
                </div>
              </div>
            </div>
        </form>
        <?php } ?>
      </div>
      </div>
    </section>
    <section id = "adding">
      <div class = "addElement">
        <form action="addTask.php" method="POST">
            Zawartość: <input type="text" name="content" required>
            ID osoby: <input type="text" name="personID" required>
            Wykonane <input type="checkbox" name = "completion" value = "1">
            <input type="submit" value="Dodaj Zadanie">
          </form>
      </div>

      <div class = "addElement">
        <form action="addPerson.php" method="POST">
            Imie: <input type="text" name="name" required>
            Nazwisko: <input type="text" name="surname" required>
            <input type="submit" value="Dodaj Osobe">
          </form>
      </div>
    </section>

    <section id = "bottom">
      <section class = "innerBottom">
        <form action="innerJoin.php" method = "POST">
          ID osoby: <input type="text" name = "personID" required>
          <input type="submit" value = "Wyszukaj zadania osoby (InnerJoin)">
        </form>
      </section>
      <section class = "innerBottom">
        <form action="leftJoin.php">
          <input type="submit" value = "Wyświetl osoby (LeftJoin)">
        </form>
      </section>
    </section>
</body>
</html>