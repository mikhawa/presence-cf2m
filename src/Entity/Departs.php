<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departs
 *
 * @ORM\Table(name="departs", uniqueConstraints={@ORM\UniqueConstraint(name="iddepart_UNIQUE", columns={"iddepart"})}, indexes={@ORM\Index(name="fk_departs_inscriptions1_idx", columns={"inscriptions_idinscription"})})
 * @ORM\Entity
 */
class Departs
{
    /**
     * @var int
     *
     * @ORM\Column(name="iddepart", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iddepart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $date = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure", type="time", nullable=false)
     */
    private $heure;

    /**
     * @var string|null
     *
     * @ORM\Column(name="justificatif", type="string", length=150, nullable=true)
     */
    private $justificatif;

    /**
     * @var \Inscriptions
     *
     * @ORM\ManyToOne(targetEntity="Inscriptions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="inscriptions_idinscription", referencedColumnName="idinscription")
     * })
     */
    private $inscriptionsIdinscription;

    public function getIddepart(): ?int
    {
        return $this->iddepart;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getHeure(): ?\DateTimeInterface
    {
        return $this->heure;
    }

    public function setHeure(\DateTimeInterface $heure): self
    {
        $this->heure = $heure;

        return $this;
    }

    public function getJustificatif(): ?string
    {
        return $this->justificatif;
    }

    public function setJustificatif(?string $justificatif): self
    {
        $this->justificatif = $justificatif;

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
