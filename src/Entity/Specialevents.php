<?php

namespace App\Entity;

use App\Repository\SpecialeventsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpecialeventsRepository::class)]
class Specialevents
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
        type: 'datetime',
    )]
    private $eventdate;

    #[ORM\Column(
        type: 'smallint',
        nullable: true,
        options: [
            "unsigned" => true,
        ],
    )]
    private $remote;

    #[ORM\Column(
        type: 'smallint',
        options: [
            "unsigned" => true,
            "default"  => 0,
        ],
    )]
    private $eventperiod;

    #[ORM\Column(
        type: 'time',
        nullable: true,
    )]
    private $arrivaltime;

    #[ORM\Column(
        type: 'time',
        nullable: true,
    )]
    private $departuretime;

    #[ORM\Column(
        type: 'string',
        length: 500,
        nullable: true,
    )]
    private $message;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEventdate(): ?\DateTimeInterface
    {
        return $this->eventdate;
    }

    public function setEventdate(\DateTimeInterface $eventdate): self
    {
        $this->eventdate = $eventdate;

        return $this;
    }

    public function getRemote(): ?int
    {
        return $this->remote;
    }

    public function setRemote(?int $remote): self
    {
        $this->remote = $remote;

        return $this;
    }

    public function getEventperiod(): ?int
    {
        return $this->eventperiod;
    }

    public function setEventperiod(int $eventperiod): self
    {
        $this->eventperiod = $eventperiod;

        return $this;
    }

    public function getArrivaltime(): ?\DateTimeInterface
    {
        return $this->arrivaltime;
    }

    public function setArrivaltime(?\DateTimeInterface $arrivaltime): self
    {
        $this->arrivaltime = $arrivaltime;

        return $this;
    }

    public function getDeparturetime(): ?\DateTimeInterface
    {
        return $this->departuretime;
    }

    public function setDeparturetime(?\DateTimeInterface $departuretime): self
    {
        $this->departuretime = $departuretime;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }
}
