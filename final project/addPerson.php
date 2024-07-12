<?php
require_once("communication.php");
require_once("connection.php");

echo AddPerson($entityManager, $_POST['name'], $_POST['surname']);
echo '<br><a href="index.php" class="button">Powrót</a>';