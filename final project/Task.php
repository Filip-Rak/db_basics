<?php
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table('tasks')]
class Task
{
    //Private attributes
    #[ORM\Id]
    #[ORM\Column, ORM\GeneratedValue]
    private int $ID;
    #[ORM\Column]
    private int $personID;
    #[ORM\Column]
    private string $content;
    #[ORM\Column(name : 'isDone')]
    private bool $isCompleted;

    //Public getters
    public function getID() : int { return $this->ID; }
    public function getPersonID() : int { return $this->personID; }
    public function getContent() : string { return $this->content; }
    public function getCompletion() : bool { return $this->isCompleted; }

    //Public setters
    //public function setID(int $id) { $this->ID = $id; } 
    public function setPersonID(int $id) { $this->personID = $id; return $this; }
    public function setContent(string $content) { $this->content = $content; return $this; }
    public function setCompletion(bool $isCompleted) { $this->isCompleted = $isCompleted; return $this; }
}