<?php

require_once("communication.php");
require_once("connection.php");

if ($_POST['action'] == 'Zaktualizuj') 
    echo EditPerson($entityManager, intval($_POST['ID']), $_POST['name'], $_POST['surname']);
    
elseif ($_POST['action'] == 'Usuń') 
    echo DeletePerson($entityManager, intval($_POST['ID']));

echo '<br><a href="index.php" class="button">Powrót</a>';