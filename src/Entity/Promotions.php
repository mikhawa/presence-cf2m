<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Promotions
 *
 * @ORM\Table(name="promotions", indexes={@ORM\Index(name="fk_promotions_options1_idx", columns={"options_idoption"})})
 * @ORM\Entity
 */
class Promotions
{
    /**
     * @var int
     *
     * @ORM\Column(name="idpromotion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpromotion;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=45, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="acronyme", type="string", length=16, nullable=false)
     */
    private $acronyme;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebut", type="date", nullable=false)
     */
    private $datedebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFin", type="date", nullable=false)
     */
    private $datefin;

    /**
     * @var bool
     *
     * @ORM\Column(name="nbJours", type="boolean", nullable=false)
     */
    private $nbjours;

    /**
     * @var \Options
     *
     * @ORM\ManyToOne(targetEntity="Options")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="options_idoption", referencedColumnName="idoption")
     * })
     */
    private $optionsIdoption;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Conges", inversedBy="promotionsIdpromotion")
     * @ORM\JoinTable(name="promotions_has_conges",
     *   joinColumns={
     *     @ORM\JoinColumn(name="promotions_idpromotion", referencedColumnName="idpromotion")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="conges_idconges", referencedColumnName="idconges")
     *   }
     * )
     */
    private $congesIdconges;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->congesIdconges = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdpromotion(): ?int
    {
        return $this->idpromotion;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAcronyme(): ?string
    {
        return $this->acronyme;
    }

    public function setAcronyme(string $acronyme): self
    {
        $this->acronyme = $acronyme;

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

    public function isNbjours(): ?bool
    {
        return $this->nbjours;
    }

    public function setNbjours(bool $nbjours): self
    {
        $this->nbjours = $nbjours;

        return $this;
    }

    public function getOptionsIdoption(): ?Options
    {
        return $this->optionsIdoption;
    }

    public function setOptionsIdoption(?Options $optionsIdoption): self
    {
        $this->optionsIdoption = $optionsIdoption;

        return $this;
    }

    /**
     * @return Collection<int, Conges>
     */
    public function getCongesIdconges(): Collection
    {
        return $this->congesIdconges;
    }

    public function addCongesIdconge(Conges $congesIdconge): self
    {
        if (!$this->congesIdconges->contains($congesIdconge)) {
            $this->congesIdconges[] = $congesIdconge;
        }

        return $this;
    }

    public function removeCongesIdconge(Conges $congesIdconge): self
    {
        $this->congesIdconges->removeElement($congesIdconge);

        return $this;
    }

}
