<?php
require_once("communication.php");
require_once("connection.php");

$completed = true;
if(empty($_POST['completion']))
    $completed = false;

echo AddTask($entityManager, intval($_POST['personID']), $_POST['content'], $completed);
echo '<br><a href="index.php" class="button">Powrót</a>';