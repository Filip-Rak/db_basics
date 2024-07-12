<?php
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "people")]
class Person
{
    // Private attributes
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer", name: "personID")]
    private int $ID;

    #[ORM\Column(type: "string", length: 20)]
    private string $name;

    #[ORM\Column(type: "string", length: 20)]
    private string $surname;

    // Public getters
    public function getID(): int { return $this->ID; }
    public function getName(): string { return $this->name; }
    public function getSurname(): string { return $this->surname; }

    // Public setters
    public function setName(string $name): self { $this->name = $name; return $this; }
    public function setSurname(string $surname): self { $this->surname = $surname; return $this; }
}
