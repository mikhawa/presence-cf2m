<?php

namespace App\Entity;

use App\Repository\AttendancesheetsRepository;
use DateTimeInterface;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AttendancesheetsRepository::class)]
class Attendancesheets
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
        length: 150
    )]
    private $file;

    #[ORM\Column(
        type: 'date'
    )]
    private $startingweekdate;

    #[ORM\Column(
        type: 'date'
    )]
    private $endingweekdate;

    #[ORM\ManyToOne(targetEntity: Promotions::class, inversedBy: 'attendancesheets')]
    #[ORM\JoinColumn(nullable: false)]
    private $promotions;

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

    public function getStartingweekdate(): ?DateTimeInterface
    {
        return $this->startingweekdate;
    }

    public function setStartingweekdate(DateTimeInterface $startingweekdate): self
    {
        $this->startingweekdate = $startingweekdate;

        return $this;
    }

    public function getEndingweekdate(): ?DateTimeInterface
    {
        return $this->endingweekdate;
    }

    public function setEndingweekdate(DateTimeInterface $endingweekdate): self
    {
        $this->endingweekdate = $endingweekdate;

        return $this;
    }

    public function getPromotions(): ?Promotions
    {
        return $this->promotions;
    }

    public function setPromotions(?Promotions $promotions): self
    {
        $this->promotions = $promotions;

        return $this;
    }
}
