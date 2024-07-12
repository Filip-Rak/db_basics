<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;

// Replace with the path to your 'doctrine.php' or equivalent file
// that sets up and returns your EntityManager.
require_once 'doctrine.php';

return ConsoleRunner::createHelperSet($entityManager);
