<?php

namespace App\Entity;

use App\Repository\HolidaysRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HolidaysRepository::class)]
class Holidays
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
        type: 'date'
    )]
    private $day;

    #[ORM\Column(
        type: 'integer'
    )]
    private $holidayperiod;

    #[ORM\ManyToMany(targetEntity: Promotions::class, inversedBy: 'holidays')]
    private $promotions;

    public function __construct()
    {
        $this->promotions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDay(): ?DateTimeInterface
    {
        return $this->day;
    }

    public function setDay(DateTimeInterface $day): self
    {
        $this->day = $day;

        return $this;
    }

    public function getHolidayperiod(): ?int
    {
        return $this->holidayperiod;
    }

    public function setHolidayperiod(int $holidayperiod): self
    {
        $this->holidayperiod = $holidayperiod;

        return $this;
    }

    /**
     * @return Collection<int, Promotions>
     */
    public function getPromotions(): Collection
    {
        return $this->promotions;
    }

    public function addPromotion(Promotions $promotion): self
    {
        if (!$this->promotions->contains($promotion)) {
            $this->promotions[] = $promotion;
        }

        return $this;
    }

    public function removePromotion(Promotions $promotion): self
    {
        $this->promotions->removeElement($promotion);

        return $this;
    }
}
