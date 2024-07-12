<?php
use Doctrine\ORM\EntityManager;

//Person functions
function AddPerson(EntityManager $entityManager, string $name, string $surname) : string
{
    $person = (new Person())
        ->setName($name)
        ->setSurname($surname);

    $entityManager->persist($person);
    $entityManager->flush();

    return "Sukces!";
}

function EditPerson(EntityManager $entityManager, int $id, string $name, string $surname) : string
{
    $entity = $entityManager->find(Person::class, $id);

    if(!$entity)
        return "Niepowodzenie! Osoba nie istnieje";

    $entity->setName($name);
    $entity->setSurname($surname);

    $entityManager->flush();

    return "Sukces!";
}

function DeletePerson(EntityManager $entityManager, int $id) : string
{
    $entity = $entityManager->find(Person::class, $id); //szukaj rekordu o podanym ID
    
    if(!$entity)    //jezeli nie istnieje
        return "Niepowodzenie! Osoba nie isntieje";

    $repository = $entityManager->getRepository(Task::class);   //nie pozwol na usuniecie
    if($repository->findOneBy(["personID" => strval($entity->getID())]))  //jezeli ma przydizelone zadanie
        return "Niepowodzenie! Osoba jest przydzielona do przynajmniej jednego zadania";

    $entityManager->remove($entity);    //usun z bazy
    $entityManager->flush();    //uaktualnij baze

    return "Sukces!";
}

function fetchPeople(EntityManager $entityManager) : array
{
    $repository = $entityManager->getRepository(Person::class);
    return $repository->findAll();
}

//Task functions
function AddTask(EntityManager $entityManager, int $personID, string $content, bool $isCompleted) : string
{
    $repository = $entityManager->getRepository(Person::class);   //nie pozwol na dodanie
    if(!$repository->findOneBy(["ID" => strval($personID)]))  //jezeli osoba nie istnieje
        return "Niepowodzenie! Przydzielona osoba nie sitnieje";

    $task = (new Task())
        ->setPersonID($personID)
        ->setContent($content)
        ->setCompletion($isCompleted);

    $entityManager->persist($task);
    $entityManager->flush();

    return "Sukces!";
}

function EditTask(EntityManager $entityManager, int $id, int $personID, string $content, bool $isCompleted) : string
{
    $entity = $entityManager->find(Task::class, $id);

    if(!$entity)
        return "Niepowodzenie! Zadanie nie zostało znalezione";

    if(!$entityManager->find(Person::class, $personID))
        return "Niepowodzenie! Nie można przydzielić zadania do nie istniejącej osoby";

    $entity->setContent($content);
    $entity->setCompletion($isCompleted);
    $entity->setPersonID($personID);

    $entityManager->flush();

    return "Sukces!";
}

function DeleteTask(EntityManager $entityManager, int $id) : string
{
    $entity = $entityManager->find(Task::class, $id);
    
    if(!$entity)
        return "Niepowodzenie! Zadanie nie istnieje";

    $entityManager->remove($entity);
    $entityManager->flush();

    return "Sukces!";
}

function fetchTask(EntityManager $entityManager) : array
{
    $repository = $entityManager->getRepository(Task::class);
    return $repository->findAll();
}

//zmiana ID w person zmienie tez personID w task