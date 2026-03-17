<?php

namespace App\Entity;

use App\Repository\DriverRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DriverRepository::class)]
class Driver
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\Column(length: 255)]
    private ?string $nationality = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $birthDate = null;

    #[ORM\Column]
    private ?int $number = null;

    #[ORM\Column(length: 3)]
    private ?string $code = null;

    #[ORM\Column(length: 255)]
    private ?string $photo = null;

    #[ORM\Column]
    private ?bool $isAlive = null;

    #[ORM\Column]
    private ?bool $isRetired = null;

    #[ORM\ManyToOne(inversedBy: 'drivers')]
    private ?Team $team = null;

    /**
     * @var Collection<int, DriverRating>
     */
    #[ORM\OneToMany(targetEntity: DriverRating::class, mappedBy: 'driver')]
    private Collection $driverRatings;

    public function __construct()
    {
        $this->driverRatings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(string $nationality): static
    {
        $this->nationality = $nationality;

        return $this;
    }

    public function getBirthDate(): ?\DateTime
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTime $birthDate): static
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): static
    {
        $this->number = $number;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): static
    {
        $this->photo = $photo;

        return $this;
    }

    public function isAlive(): ?bool
    {
        return $this->isAlive;
    }

    public function setIsAlive(bool $isAlive): static
    {
        $this->isAlive = $isAlive;

        return $this;
    }

    public function isRetired(): ?bool
    {
        return $this->isRetired;
    }

    public function setIsRetired(bool $isRetired): static
    {
        $this->isRetired = $isRetired;

        return $this;
    }

    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function setTeam(?Team $team): static
    {
        $this->team = $team;

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
            $driverRating->setDriver($this);
        }

        return $this;
    }

    public function removeDriverRating(DriverRating $driverRating): static
    {
        if ($this->driverRatings->removeElement($driverRating)) {
            // set the owning side to null (unless already changed)
            if ($driverRating->getDriver() === $this) {
                $driverRating->setDriver(null);
            }
        }

        return $this;
    }
}
