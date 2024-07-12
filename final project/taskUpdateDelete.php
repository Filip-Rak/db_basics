<?php

require_once("communication.php");
require_once("connection.php");

if ($_POST['action'] == 'Zaktualizuj') 
{
    $completed = false;
    if(!empty($_POST['completion']))
           $completed = true;

    echo EditTask($entityManager, intval($_POST['ID']) , intval($_POST['personID']), $_POST['content'],  $completed);
}
    
elseif ($_POST['action'] == 'Usuń') 
    echo DeleteTask($entityManager, intval($_POST['ID']));

echo '<br><a href="index.php" class="button">Powrót</a>';