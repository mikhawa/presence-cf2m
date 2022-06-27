<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Absences
 *
 * @ORM\Table(name="absences", indexes={@ORM\Index(name="fk_absences_inscriptions1_idx", columns={"inscriptions_idinscription"})})
 * @ORM\Entity
 */
class Absences
{
    /**
     * @var int
     *
     * @ORM\Column(name="idAbsences", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idabsences;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $date = 'CURRENT_TIMESTAMP';

    /**
     * @var string|null
     *
     * @ORM\Column(name="justificatif", type="string", length=150, nullable=true, options={"comment"="Null => Sans justificatif"})
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

    public function getIdabsences(): ?int
    {
        return $this->idabsences;
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
