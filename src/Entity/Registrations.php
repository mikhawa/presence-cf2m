<?php

namespace App\Entity;

use App\Repository\RegistrationsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RegistrationsRepository::class)]
class Registrations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(
        type: 'integer',
        unique: true,
        options: [
            "unsigned" => true,
        ],
    )]
    private $id;

    #[ORM\Column(
        type: 'integer',
        options: [
            "default"  => 1,
            "unsigned" => true,
        ],
    )]
    private $active;

    #[ORM\Column(
        type: 'datetime',
        nullable: true,
        options: [
            "default" => "CURRENT_TIMESTAMP",
        ],
    )]
    private $startingdate;

    #[ORM\Column(
        type: 'datetime',
        nullable: true,
    )]
    private $endingdate;

    #[ORM\ManyToOne(
        targetEntity: User::class,
        inversedBy: 'registrations',
    )]
    private $users;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActive(): ?int
    {
        return $this->active;
    }

    public function setActive(int $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getStartingdate(): ?\DateTimeInterface
    {
        return $this->startingdate;
    }

    public function setStartingdate(?\DateTimeInterface $startingdate): self
    {
        $this->startingdate = $startingdate;

        return $this;
    }

    public function getEndingdate(): ?\DateTimeInterface
    {
        return $this->endingdate;
    }

    public function setEndingdate(?\DateTimeInterface $endingdate): self
    {
        $this->endingdate = $endingdate;

        return $this;
    }

    public function getUsers(): ?User
    {
        return $this->users;
    }

    public function setUsers(?User $users): self
    {
        $this->users = $users;

        return $this;
    }

   

  

}
