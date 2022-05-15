<?php

namespace App\Entity\Warframe\DamageType;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ApiResource(
    shortName: 'warframe/damage_types'
)]
class DamageType
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column(type: "integer")]
    private $id;

    #[ORM\Column(type: "string", length: 255, nullable: false)]
    #[Assert\NotBlank]
    private string $class;

    #[ORM\Column(type: "string", length: 255, nullable: false)]
    #[Assert\NotBlank]
    private string $name;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClass(): string
    {
        return $this->class;
    }

    public function setClass($class): void
    {
        $this->class = $class;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }
}