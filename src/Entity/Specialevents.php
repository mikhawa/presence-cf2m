<?php

namespace App\Entity;

use App\Repository\SpecialeventsRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
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
            "default" => 0,
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

    #[ORM\ManyToOne(
        targetEntity: Registrations::class,
        inversedBy: 'specialevents',
    )]
    #[ORM\JoinColumn(
        nullable: false,
    )]
    private $registrations;

    #[ORM\ManyToOne(targetEntity: Specialeventtype::class, inversedBy: 'specialevents')]
    #[ORM\JoinColumn(nullable: false)]
    private $specialeventtype_id;

    #[ORM\OneToMany(mappedBy: 'specialevents', targetEntity: Proofofabsences::class)]
    private $proofofabsences;

    public function __construct()
    {
        $this->proofofabsences = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEventdate(): ?DateTimeInterface
    {
        return $this->eventdate;
    }

    public function setEventdate(DateTimeInterface $eventdate): self
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

    public function getArrivaltime(): ?DateTimeInterface
    {
        return $this->arrivaltime;
    }

    public function setArrivaltime(?DateTimeInterface $arrivaltime): self
    {
        $this->arrivaltime = $arrivaltime;

        return $this;
    }

    public function getDeparturetime(): ?DateTimeInterface
    {
        return $this->departuretime;
    }

    public function setDeparturetime(?DateTimeInterface $departuretime): self
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

    public function getRegistrations(): ?Registrations
    {
        return $this->registrations;
    }

    public function setRegistrations(?Registrations $registrations): self
    {
        $this->registrations = $registrations;

        return $this;
    }

    public function getSpecialeventtypeId(): ?Specialeventtype
    {
        return $this->specialeventtype_id;
    }

    public function setSpecialeventtypeId(?Specialeventtype $specialeventtype_id): self
    {
        $this->specialeventtype_id = $specialeventtype_id;

        return $this;
    }

    /**
     * @return Collection<int, Proofofabsences>
     */
    public function getProofofabsences(): Collection
    {
        return $this->proofofabsences;
    }

    public function addProofofabsences(Proofofabsences $proofofabsences): self
    {
        if (!$this->proofofabsences->contains($proofofabsences)) {
            $this->proofofabsences[] = $proofofabsences;
            $proofofabsences->setSpecialevents($this);
        }

        return $this;
    }

    public function removeProofofabsences(Proofofabsences $proofofabsences): self
    {
        if ($this->proofofabsences->removeElement($proofofabsences)) {
            // set the owning side to null (unless already changed)
            if ($proofofabsences->getSpecialevents() === $this) {
                $proofofabsences->setSpecialevents(null);
            }
        }

        return $this;
    }

    public function addProofofabsence(Proofofabsences $proofofabsence): self
    {
        if (!$this->proofofabsences->contains($proofofabsence)) {
            $this->proofofabsences[] = $proofofabsence;
            $proofofabsence->setSpecialevents($this);
        }

        return $this;
    }

    public function removeProofofabsence(Proofofabsences $proofofabsence): self
    {
        if ($this->proofofabsences->removeElement($proofofabsence)) {
            // set the owning side to null (unless already changed)
            if ($proofofabsence->getSpecialevents() === $this) {
                $proofofabsence->setSpecialevents(null);
            }
        }

        return $this;
    }
}
