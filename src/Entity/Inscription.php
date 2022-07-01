<?php

namespace App\Entity;

use App\Repository\InscriptionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InscriptionRepository::class)]
class Inscription
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(
        type: 'integer',
        unique: true,
        options: ["unsigned" => true],
    )]
    private $id;

    #[ORM\Column(
        type: 'boolean',
        options: [
            "default"  => true,
        ],
    )]
    private $theactive;

    #[ORM\Column(
        type: 'datetime',
        nullable: true,
        options: [
            "default" => "CURRENT_TIMESTAMP",
        ],
    )]
    private $thebeginning;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $theend;


}
