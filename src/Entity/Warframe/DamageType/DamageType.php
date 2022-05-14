<?php

namespace App\Entity\Warframe\DamageType;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class DamageType
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $class;

    /**
     * @ORM\Column(type="string", length=255)
     */
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