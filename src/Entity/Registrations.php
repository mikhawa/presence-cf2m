<?php

namespace App\Entity;

use App\Repository\RegistrationsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RegistrationsRepository::class)]
class Registrations
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
        type: 'integer',
        options: [
            "default"  => 1,
            "unsigned" => true,
        ],
    )]
    private $active;

    #[ORM\Column(
        type: 'datetime',
        nullable: true,
        options: [
            "default" => "CURRENT_TIMESTAMP",
        ],
    )]
    private $startingdate;

    #[ORM\Column(
        type: 'datetime',
        nullable: true,
    )]
    private $endingdate;

    #[ORM\ManyToOne(
        targetEntity: User::class,
        inversedBy: 'inscriptions',
    )]
    private $users;

   

  

}
