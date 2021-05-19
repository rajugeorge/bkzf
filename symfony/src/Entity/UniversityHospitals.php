<?php

namespace App\Entity;

use App\Repository\UniversityHospitalsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;

/**
 * @ORM\Entity(repositoryClass=UniversityHospitalsRepository::class)
 */
class UniversityHospitals
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $phone;

    /**
     * @ORM\Column(type="text")
     */
    private $address;

    /**
     * @ORM\Column(type="integer")
     */
    private $pin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $latitude;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $longitude;

    /**
     * @ORM\Column(type="integer")
     */
    private $userId;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedDate;

    /**
     * @ORM\Column(type="boolean")
     */
    
    private $isactive = true;

    /**
     * One university has many locations. This is the inverse side.
     * @OneToMany(targetEntity="HospitalLocations", mappedBy="universityHospitals")
     */
    private $hospitalLocations;

    public function __construct()
    {
        $this->hospitalLocations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPin(): ?int
    {
        return $this->pin;
    }

    public function setPin(int $pin): self
    {
        $this->pin = $pin;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(string $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(string $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    /*public function getUpdatedDate(): ?\DateTimeInterface
    {
        return $this->updatedDate;
    }*/

    public function setUpdatedDate(): self
    {
        $this->updatedDate = new \DateTime("now");

        return $this;
    }

    public function getIsactive(): ?bool
    {
        return $this->isactive;
    }

    public function setIsactive(bool $isactive): self
    {
        $this->isactive = $isactive;

        return $this;
    }

    /**
    ## * @return Collection|HospitalLocations[]
     */
    /*public function getHospitalLocations(): Collection
    {
        return $this->hospitalLocations;
    }*/

    public function addHospitalLocation(HospitalLocations $hospitalLocation): self
    {
        if (!$this->hospitalLocations->contains($hospitalLocation)) {
            $this->hospitalLocations[] = $hospitalLocation;
            $hospitalLocation->setUniversityHospitals($this);
        }

        return $this;
    }

    public function removeHospitalLocation(HospitalLocations $hospitalLocation): self
    {
        if ($this->hospitalLocations->removeElement($hospitalLocation)) {
            // set the owning side to null (unless already changed)
            if ($hospitalLocation->getUniversityHospitals() === $this) {
                $hospitalLocation->setUniversityHospitals(null);
            }
        }

        return $this;
    }

}
