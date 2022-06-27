<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inscriptions
 *
 * @ORM\Table(name="inscriptions", indexes={@ORM\Index(name="fk_inscriptions_users1_idx", columns={"users_id"}), @ORM\Index(name="fk_inscriptions_promotions1_idx", columns={"promotions_idpromotion"})})
 * @ORM\Entity
 */
class Inscriptions
{
    /**
     * @var int
     *
     * @ORM\Column(name="idinscription", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idinscription;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean", nullable=false, options={"default"="1","comment"="1 => Active | 0 => Non active"})
     */
    private $active = true;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebut", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $datedebut = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFin", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $datefin = 'CURRENT_TIMESTAMP';

    /**
     * @var int
     *
     * @ORM\Column(name="stagiaires_idstagiaires", type="integer", nullable=false)
     */
    private $stagiairesIdstagiaires;

    /**
     * @var \Promotions
     *
     * @ORM\ManyToOne(targetEntity="Promotions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="promotions_idpromotion", referencedColumnName="idpromotion")
     * })
     */
    private $promotionsIdpromotion;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="users_id", referencedColumnName="id")
     * })
     */
    private $users;

    public function getIdinscription(): ?int
    {
        return $this->idinscription;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getDatedebut(): ?\DateTimeInterface
    {
        return $this->datedebut;
    }

    public function setDatedebut(\DateTimeInterface $datedebut): self
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    public function getDatefin(): ?\DateTimeInterface
    {
        return $this->datefin;
    }

    public function setDatefin(\DateTimeInterface $datefin): self
    {
        $this->datefin = $datefin;

        return $this;
    }

    public function getStagiairesIdstagiaires(): ?int
    {
        return $this->stagiairesIdstagiaires;
    }

    public function setStagiairesIdstagiaires(int $stagiairesIdstagiaires): self
    {
        $this->stagiairesIdstagiaires = $stagiairesIdstagiaires;

        return $this;
    }

    public function getPromotionsIdpromotion(): ?Promotions
    {
        return $this->promotionsIdpromotion;
    }

    public function setPromotionsIdpromotion(?Promotions $promotionsIdpromotion): self
    {
        $this->promotionsIdpromotion = $promotionsIdpromotion;

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
