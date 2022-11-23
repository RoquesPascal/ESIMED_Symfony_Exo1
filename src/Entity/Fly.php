<?php

namespace App\Entity;

use App\Repository\FlyRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FlyRepository::class)]
class Fly
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $location = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    private ?int $altitude_from = null;

    #[ORM\Column]
    private ?int $altitude_to = null;

    #[ORM\Column]
    private ?int $time = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $comment = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
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

    public function getAltitudeFrom(): ?int
    {
        return $this->altitude_from;
    }

    public function setAltitudeFrom(int $altitude_from): self
    {
        $this->altitude_from = $altitude_from;

        return $this;
    }

    public function getAltitudeTo(): ?int
    {
        return $this->altitude_to;
    }

    public function setAltitudeTo(int $altitude_to): self
    {
        $this->altitude_to = $altitude_to;

        return $this;
    }

    public function getTime(): ?int
    {
        return $this->time;
    }

    public function setTime(int $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }
}
