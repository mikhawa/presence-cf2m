<?php

namespace App\Entity;

use App\Repository\PromotionsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PromotionsRepository::class)]
class Promotions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 45)]
    private $promoname;

    #[ORM\Column(type: 'string', length: 16)]
    private $acronym;

    #[ORM\Column(type: 'date', nullable: true)]
    private $startingdate;

    #[ORM\Column(type: 'date', nullable: true)]
    private $endingdate;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private $nbdays;

    #[ORM\Column(type: 'smallint')]
    private $active;

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

    public function getStartingdate(): ?\DateTimeInterface
    {
        return $this->startingdate;
    }

    public function setStartingdate(?\DateTimeInterface $startingdate): self
    {
        $this->startingdate = $startingdate;

        return $this;
    }

    public function getEndingdate(): ?\DateTimeInterface
    {
        return $this->endingdate;
    }

    public function setEndingdate(?\DateTimeInterface $endingdate): self
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
}
