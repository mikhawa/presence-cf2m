<?php

namespace App\Entity;

use App\Repository\ProofofabsencesRepository;
use DateTimeInterface;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProofofabsencesRepository::class)]
class Proofofabsences
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
        type: 'string',
        length: 255
    )]
    private $file;

    #[ORM\Column(
        type: 'date'
    )]
    private $firstdaycovered;

    #[ORM\Column(
        type: 'date'
    )]
    private $lastdaycovered;

    #[ORM\ManyToOne(targetEntity: specialevents::class, inversedBy: 'proofofabsences')]
    private $specialevents;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(string $file): self
    {
        $this->file = $file;

        return $this;
    }

    public function getFirstdaycovered(): ?DateTimeInterface
    {
        return $this->firstdaycovered;
    }

    public function setFirstdaycovered(DateTimeInterface $firstdaycovered): self
    {
        $this->firstdaycovered = $firstdaycovered;

        return $this;
    }

    public function getLastdaycovered(): ?DateTimeInterface
    {
        return $this->lastdaycovered;
    }

    public function setLastdaycovered(DateTimeInterface $lastdaycovered): self
    {
        $this->lastdaycovered = $lastdaycovered;

        return $this;
    }

    public function getSpecialevents(): ?specialevents
    {
        return $this->specialevents;
    }

    public function setSpecialevents(?specialevents $specialevents): self
    {
        $this->specialevents = $specialevents;

        return $this;
    }
}
