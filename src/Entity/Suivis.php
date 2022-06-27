<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Suivis
 *
 * @ORM\Table(name="suivis", indexes={@ORM\Index(name="fk_suivis_inscriptions1_idx", columns={"inscriptions_idinscription"})})
 * @ORM\Entity
 */
class Suivis
{
    /**
     * @var int
     *
     * @ORM\Column(name="idSuvi", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idsuvi;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateReunion", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $datereunion = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="ponctualite", type="string", length=512, nullable=false)
     */
    private $ponctualite;

    /**
     * @var string
     *
     * @ORM\Column(name="evolution", type="string", length=512, nullable=false)
     */
    private $evolution;

    /**
     * @var string
     *
     * @ORM\Column(name="tests", type="string", length=512, nullable=false)
     */
    private $tests;

    /**
     * @var string
     *
     * @ORM\Column(name="attitude", type="string", length=512, nullable=false)
     */
    private $attitude;

    /**
     * @var \Inscriptions
     *
     * @ORM\ManyToOne(targetEntity="Inscriptions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="inscriptions_idinscription", referencedColumnName="idinscription")
     * })
     */
    private $inscriptionsIdinscription;

    public function getIdsuvi(): ?int
    {
        return $this->idsuvi;
    }

    public function getDatereunion(): ?\DateTimeInterface
    {
        return $this->datereunion;
    }

    public function setDatereunion(\DateTimeInterface $datereunion): self
    {
        $this->datereunion = $datereunion;

        return $this;
    }

    public function getPonctualite(): ?string
    {
        return $this->ponctualite;
    }

    public function setPonctualite(string $ponctualite): self
    {
        $this->ponctualite = $ponctualite;

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

    public function getAttitude(): ?string
    {
        return $this->attitude;
    }

    public function setAttitude(string $attitude): self
    {
        $this->attitude = $attitude;

        return $this;
    }

    public function getInscriptionsIdinscription(): ?Inscriptions
    {
        return $this->inscriptionsIdinscription;
    }

    public function setInscriptionsIdinscription(?Inscriptions $inscriptionsIdinscription): self
    {
        $this->inscriptionsIdinscription = $inscriptionsIdinscription;

        return $this;
    }


}
