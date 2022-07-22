<?php

namespace App\Entity;

use App\Repository\SpecialeventtypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpecialeventtypeRepository::class)]
class Specialeventtype
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
        length: 45
    )]
    private $eventname;

    #[ORM\OneToMany(mappedBy: 'specialeventtype', targetEntity: Specialevents::class)]
    private $specialevents;

    public function __construct()
    {
        $this->specialevents = new ArrayCollection();
    }

    public function getId() : ?int
    {
        return $this->id;
    }

    public function getEventname() : ?string
    {
        return $this->eventname;
    }

    public function setEventname(string $eventname) : self
    {
        $this->eventname = $eventname;

        return $this;
    }

    /**
     * @return Collection<int, Specialevents>
     */
    public function getSpecialevents() : Collection
    {
        return $this->specialevents;
    }

    public function addSpecialevent(Specialevents $specialevent) : self
    {
        if (!$this->specialevents->contains($specialevent)) {
            $this->specialevents[] = $specialevent;
            $specialevent->setSpecialeventtype($this);
        }

        return $this;
    }

    public function removeSpecialevent(Specialevents $specialevent) : self
    {
        if ($this->specialevents->removeElement($specialevent)) {
            // set the owning side to null (unless already changed)
            if ($specialevent->getSpecialeventtype() === $this) {
                $specialevent->setSpecialeventtype(null);
            }
        }

        return $this;
    }
}
