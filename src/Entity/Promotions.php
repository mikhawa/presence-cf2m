<?php

namespace App\Entity;

use App\Entity\Options;
use App\Repository\PromotionsRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PromotionsRepository::class)]
class Promotions
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
        length: 45,
    )]
    private $promoname;

    #[ORM\Column(
        type: 'string',
        length: 16,
    )]
    private $acronym;

    #[ORM\Column(
        type: 'date',
        nullable: true,
    )]
    private $startingdate;

    #[ORM\Column(
        type: 'date',
        nullable: true,
    )]
    private $endingdate;

    #[ORM\Column(
        type: 'smallint',
        nullable: true,
        options: [
            "unsigned" => true,
        ],

    )]
    private $nbdays;

    #[ORM\Column(
        type: 'smallint',
        options: [
            "unsigned" => true,
        ],
    )]
    private $active;

    #[ORM\OneToMany(
        mappedBy: 'promotions',
        targetEntity: Registrations::class,
    )]
    private $registrations;

    #[ORM\ManyToOne(targetEntity: Options::class, inversedBy: 'promotions')]
    #[ORM\JoinColumn(nullable: false)]
    private $options;

    #[ORM\OneToMany(mappedBy: 'promotions', targetEntity: Attendancesheets::class, orphanRemoval: true)]
    private $attendancesheets;

    public function __construct()
    {
        $this->registrations = new ArrayCollection();
        $this->attendancesheets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPromoname(): ?string
    {
        return $this->promoname;
    }

    public function setPromoname(string $promoname): self
    {
        $this->promoname = $promoname;

        return $this;
    }

    public function getAcronym(): ?string
    {
        return $this->acronym;
    }

    public function setAcronym(string $acronym): self
    {
        $this->acronym = $acronym;

        return $this;
    }

    public function getStartingdate(): ?DateTimeInterface
    {
        return $this->startingdate;
    }

    public function setStartingdate(?DateTimeInterface $startingdate): self
    {
        $this->startingdate = $startingdate;

        return $this;
    }

    public function getEndingdate(): ?DateTimeInterface
    {
        return $this->endingdate;
    }

    public function setEndingdate(?DateTimeInterface $endingdate): self
    {
        $this->endingdate = $endingdate;

        return $this;
    }

    public function getNbdays(): ?int
    {
        return $this->nbdays;
    }

    public function setNbdays(?int $nbdays): self
    {
        $this->nbdays = $nbdays;

        return $this;
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

    /**
     * @return Collection<int, Registrations>
     */
    public function getRegistrations(): Collection
    {
        return $this->registrations;
    }

    public function addRegistration(Registrations $registration): self
    {
        if (!$this->registrations->contains($registration)) {
            $this->registrations[] = $registration;
            $registration->setPromotions($this);
        }

        return $this;
    }

    public function removeRegistration(Registrations $registration): self
    {
        if ($this->registrations->removeElement($registration)) {
            // set the owning side to null (unless already changed)
            if ($registration->getPromotions() === $this) {
                $registration->setPromotions(null);
            }
        }

        return $this;
    }

    public function getOptions(): ?Options
    {
        return $this->options;
    }

    public function setOptions(?Options $options): self
    {
        $this->options = $options;

        return $this;
    }

    /**
     * @return Collection<int, Attendancesheets>
     */
    public function getAttendancesheets(): Collection
    {
        return $this->attendancesheets;
    }

    public function addAttendancesheet(Attendancesheets $attendancesheet): self
    {
        if (!$this->attendancesheets->contains($attendancesheet)) {
            $this->attendancesheets[] = $attendancesheet;
            $attendancesheet->setPromotions($this);
        }

        return $this;
    }

    public function removeAttendancesheet(Attendancesheets $attendancesheet): self
    {
        if ($this->attendancesheets->removeElement($attendancesheet)) {
            // set the owning side to null (unless already changed)
            if ($attendancesheet->getPromotions() === $this) {
                $attendancesheet->setPromotions(null);
            }
        }

        return $this;
    }
}
