<?php

namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeamRepository::class)]
class Team
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $country = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $logo = null;

    /**
     * @var Collection<int, Driver>
     */
    #[ORM\OneToMany(targetEntity: Driver::class, mappedBy: 'team')]
    private Collection $drivers;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $carImage = null;

    #[ORM\Column(length: 7, nullable: true)]
    private ?string $backgroundColor = null;

    #[ORM\Column(length: 255)]
    private ?string $fullTeamName = null;

    #[ORM\Column(length: 255)]
    private ?string $Base = null;

    #[ORM\Column(length: 255)]
    private ?string $TeamChief = null;

    #[ORM\Column(length: 255)]
    private ?string $TechnicalChief = null;

    #[ORM\Column(length: 255)]
    private ?string $Chassis = null;

    #[ORM\Column(length: 255)]
    private ?string $PowerUnit = null;

    #[ORM\Column(length: 255)]
    private ?string $ReserveDriver = null;

    #[ORM\Column(length: 255)]
    private ?string $FirstTeamEntry = null;

    #[ORM\Column(length: 255)]
    private ?string $image_biography = null;

    #[ORM\Column(length: 255)]
    private ?string $footerImage = null;

    public function __construct()
    {
        $this->drivers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): static
    {
        $this->country = $country;

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

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): static
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * @return Collection<int, Driver>
     */
    public function getDrivers(): Collection
    {
        return $this->drivers;
    }

    public function addDriver(Driver $driver): static
    {
        if (!$this->drivers->contains($driver)) {
            $this->drivers->add($driver);
            $driver->setTeam($this);
        }

        return $this;
    }

    public function removeDriver(Driver $driver): static
    {
        if ($this->drivers->removeElement($driver)) {
            // set the owning side to null (unless already changed)
            if ($driver->getTeam() === $this) {
                $driver->setTeam(null);
            }
        }

        return $this;
    }

    public function getCarImage(): ?string
    {
        return $this->carImage;
    }

    public function setCarImage(string $carImage): static
    {
        $this->carImage = $carImage;

        return $this;
    }

    public function getBackgroundColor(): ?string
    {
        return $this->backgroundColor;
    }

    public function setBackgroundColor(?string $backgroundColor): static
    {
        $this->backgroundColor = $backgroundColor;

        return $this;
    }

    public function getFullTeamName(): ?string
    {
        return $this->fullTeamName;
    }

    public function setFullTeamName(string $fullTeamName): static
    {
        $this->fullTeamName = $fullTeamName;

        return $this;
    }

    public function getBase(): ?string
    {
        return $this->Base;
    }

    public function setBase(string $Base): static
    {
        $this->Base = $Base;

        return $this;
    }

    public function getTeamChief(): ?string
    {
        return $this->TeamChief;
    }

    public function setTeamChief(string $TeamChief): static
    {
        $this->TeamChief = $TeamChief;

        return $this;
    }

    public function getTechnicalChief(): ?string
    {
        return $this->TechnicalChief;
    }

    public function setTechnicalChief(string $TechnicalChief): static
    {
        $this->TechnicalChief = $TechnicalChief;

        return $this;
    }

    public function getChassis(): ?string
    {
        return $this->Chassis;
    }

    public function setChassis(string $Chassis): static
    {
        $this->Chassis = $Chassis;

        return $this;
    }

    public function getPowerUnit(): ?string
    {
        return $this->PowerUnit;
    }

    public function setPowerUnit(string $PowerUnit): static
    {
        $this->PowerUnit = $PowerUnit;

        return $this;
    }

    public function getReserveDriver(): ?string
    {
        return $this->ReserveDriver;
    }

    public function setReserveDriver(string $ReserveDriver): static
    {
        $this->ReserveDriver = $ReserveDriver;

        return $this;
    }

    public function getFirstTeamEntry(): ?string
    {
        return $this->FirstTeamEntry;
    }

    public function setFirstTeamEntry(string $FirstTeamEntry): static
    {
        $this->FirstTeamEntry = $FirstTeamEntry;

        return $this;
    }

    public function getImageBiography(): ?string
    {
        return $this->image_biography;
    }

    public function setImageBiography(string $image_biography): static
    {
        $this->image_biography = $image_biography;

        return $this;
    }

    public function getFooterImage(): ?string
    {
        return $this->footerImage;
    }

    public function setFooterImage(string $footerImage): static
    {
        $this->footerImage = $footerImage;

        return $this;
    }
}
