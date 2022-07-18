<?php

namespace App\Entity;

use App\Repository\FollowupsRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FollowupsRepository::class)]
class
Followups
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
        type: 'datetime'
    )]
    private $meetingdate;

    #[ORM\Column(
        type: 'string',
        length: 512
    )]
    private $punctuality;

    #[ORM\Column(
        type: 'string',
        length: 512
    )]
    private $evolution;

    #[ORM\Column(
        type: 'string',
        length: 512
    )]
    private $tests;

    #[ORM\Column(
        type: 'string',
        length: 512
    )]
    private $behaviour;

    #[ORM\OneToOne(mappedBy: 'followups', targetEntity: Registrations::class, cascade: ['persist', 'remove'])]
    private $registrations;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMeetingdate(): ?DateTimeInterface
    {
        return $this->meetingdate;
    }

    public function setMeetingdate(DateTimeInterface $meetingdate): self
    {
        $this->meetingdate = $meetingdate;

        return $this;
    }

    public function getPunctuality(): ?string
    {
        return $this->punctuality;
    }

    public function setPunctuality(string $punctuality): self
    {
        $this->punctuality = $punctuality;

        return $this;
    }

    public function getEvolution(): ?string
    {
        return $this->evolution;
    }

    public function setEvolution(string $evolution): self
    {
        $this->evolution = $evolution;

        return $this;
    }

    public function getTests(): ?string
    {
        return $this->tests;
    }

    public function setTests(string $tests): self
    {
        $this->tests = $tests;

        return $this;
    }

    public function getBehaviour(): ?string
    {
        return $this->behaviour;
    }

    public function setBehaviour(string $behaviour): self
    {
        $this->behaviour = $behaviour;

        return $this;
    }

    public function getRegistrations(): ?Registrations
    {
        return $this->registrations;
    }

    public function setRegistrations(Registrations $registrations): self
    {
        // set the owning side of the relation if necessary
        if ($registrations->getFollowups() !== $this) {
            $registrations->setFollowups($this);
        }

        $this->registrations = $registrations;

        return $this;
    }

}
