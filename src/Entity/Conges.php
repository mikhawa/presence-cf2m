<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Conges
 *
 * @ORM\Table(name="conges", uniqueConstraints={@ORM\UniqueConstraint(name="jour_UNIQUE", columns={"jour"})})
 * @ORM\Entity
 */
class Conges
{
    /**
     * @var int
     *
     * @ORM\Column(name="idconges", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idconges;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="jour", type="date", nullable=false)
     */
    private $jour;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Promotions", mappedBy="congesIdconges")
     */
    private $promotionsIdpromotion;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->promotionsIdpromotion = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdconges(): ?int
    {
        return $this->idconges;
    }

    public function getJour(): ?\DateTimeInterface
    {
        return $this->jour;
    }

    public function setJour(\DateTimeInterface $jour): self
    {
        $this->jour = $jour;

        return $this;
    }

    /**
     * @return Collection<int, Promotions>
     */
    public function getPromotionsIdpromotion(): Collection
    {
        return $this->promotionsIdpromotion;
    }

    public function addPromotionsIdpromotion(Promotions $promotionsIdpromotion): self
    {
        if (!$this->promotionsIdpromotion->contains($promotionsIdpromotion)) {
            $this->promotionsIdpromotion[] = $promotionsIdpromotion;
            $promotionsIdpromotion->addCongesIdconge($this);
        }

        return $this;
    }

    public function removePromotionsIdpromotion(Promotions $promotionsIdpromotion): self
    {
        if ($this->promotionsIdpromotion->removeElement($promotionsIdpromotion)) {
            $promotionsIdpromotion->removeCongesIdconge($this);
        }

        return $this;
    }

}
