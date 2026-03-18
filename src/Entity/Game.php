<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GameRepository::class)]
class Game
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column]
    private ?int $year = null;

    #[ORM\Column(length: 255)]
    private ?string $platform = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    /**
     * @var Collection<int, DriverRating>
     */
    #[ORM\OneToMany(targetEntity: DriverRating::class, mappedBy: 'game')]
    private Collection $driverRatings;

    public function __construct()
    {
        $this->driverRatings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function getPlatform(): ?string
    {
        return $this->platform;
    }

    public function setPlatform(string $platform): static
    {
        $this->platform = $platform;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, DriverRating>
     */
    public function getDriverRatings(): Collection
    {
        return $this->driverRatings;
    }

    public function addDriverRating(DriverRating $driverRating): static
    {
        if (!$this->driverRatings->contains($driverRating)) {
            $this->driverRatings->add($driverRating);
            $driverRating->setGame($this);
        }

        return $this;
    }

    public function removeDriverRating(DriverRating $driverRating): static
    {
        if ($this->driverRatings->removeElement($driverRating)) {
            // set the owning side to null (unless already changed)
            if ($driverRating->getGame() === $this) {
                $driverRating->setGame(null);
            }
        }

        return $this;
    }
}
