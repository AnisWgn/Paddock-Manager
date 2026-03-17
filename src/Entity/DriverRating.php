<?php

namespace App\Entity;

use App\Repository\DriverRatingRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DriverRatingRepository::class)]
class DriverRating
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $overall = null;

    #[ORM\Column]
    private ?int $pace = null;

    #[ORM\Column]
    private ?int $experience = null;

    #[ORM\Column]
    private ?int $racecraft = null;

    #[ORM\Column]
    private ?int $awareness = null;

    #[ORM\ManyToOne(inversedBy: 'driverRatings')]
    private ?Driver $driver = null;

    #[ORM\ManyToOne(inversedBy: 'driverRatings')]
    private ?Game $game = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOverall(): ?int
    {
        return $this->overall;
    }

    public function setOverall(int $overall): static
    {
        $this->overall = $overall;

        return $this;
    }

    public function getPace(): ?int
    {
        return $this->pace;
    }

    public function setPace(int $pace): static
    {
        $this->pace = $pace;

        return $this;
    }

    public function getExperience(): ?int
    {
        return $this->experience;
    }

    public function setExperience(int $experience): static
    {
        $this->experience = $experience;

        return $this;
    }

    public function getRacecraft(): ?int
    {
        return $this->racecraft;
    }

    public function setRacecraft(int $racecraft): static
    {
        $this->racecraft = $racecraft;

        return $this;
    }

    public function getAwareness(): ?int
    {
        return $this->awareness;
    }

    public function setAwareness(int $awareness): static
    {
        $this->awareness = $awareness;

        return $this;
    }

    public function getDriver(): ?Driver
    {
        return $this->driver;
    }

    public function setDriver(?Driver $driver): static
    {
        $this->driver = $driver;

        return $this;
    }

    public function getGame(): ?Game
    {
        return $this->game;
    }

    public function setGame(?Game $game): static
    {
        $this->game = $game;

        return $this;
    }
}
