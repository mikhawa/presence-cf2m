<?php

namespace App\Entity;

use App\Repository\InscriptionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InscriptionRepository::class)]
class Inscription
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(
        type: 'integer',
        unique: true,
        options: ["unsigned" => true],
    )]
    private $id;

    #[ORM\Column(
        type: 'boolean',
        options: [
            "default"  => true,
        ],
    )]
    private $theactive;

    #[ORM\Column(
        type: 'datetime',
        nullable: true,
        options: [
            "default" => "CURRENT_TIMESTAMP",
        ],
    )]
    private $thebeginning;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $theend;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isTheactive(): ?bool
    {
        return $this->theactive;
    }

    public function setTheactive(bool $theactive): self
    {
        $this->theactive = $theactive;

        return $this;
    }

    public function getThebeginning(): ?\DateTimeInterface
    {
        return $this->thebeginning;
    }

    public function setThebeginning(?\DateTimeInterface $thebeginning): self
    {
        $this->thebeginning = $thebeginning;

        return $this;
    }

    public function getTheend(): ?\DateTimeInterface
    {
        return $this->theend;
    }

    public function setTheend(?\DateTimeInterface $theend): self
    {
        $this->theend = $theend;

        return $this;
    }


}
