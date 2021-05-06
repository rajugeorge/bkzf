<?php

namespace App\Entity;

use App\Repository\HospitalLocationsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * @ORM\Entity(repositoryClass=HospitalLocationsRepository::class)
 */
class HospitalLocations
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
    private $universityHospitalsId;

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
    
    private $isactive;

    /**
     * Many Locations have one university. This is the owning side.
     * @ManyToOne(targetEntity="UniversityHospitals", inversedBy="hospitalLocations")
     * @JoinColumn(name="university_hospitals_id", referencedColumnName="id")
     */
    private $universityHospitals;

    /**
     * Many Locations have Many Studies.
     * @ManyToMany(targetEntity="Studies")
     * @JoinTable(name="study_locations",
     *      joinColumns={@JoinColumn(name="hospital_locations_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="studies_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $studies;

    public function __construct()
    {
        $this->studies = new ArrayCollection();
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

    public function getUniversityHospitalsId(): ?int
    {
        return $this->universityHospitalsId;
    }

    public function setUniversityHospitalsId(int $universityHospitalsId): self
    {
        $this->universityHospitalsId = $universityHospitalsId;

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

    public function setUpdatedDate(\DateTimeInterface $updatedDate): self
    {
        $this->updatedDate = $updatedDate;

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

    public function getUniversityHospitals(): ?UniversityHospitals
    {
        return $this->universityHospitals;
    }

    public function setUniversityHospitals(?UniversityHospitals $universityHospitals): self
    {
        $this->universityHospitals = $universityHospitals;

        return $this;
    }

    /**
    ## * @return Collection|Studies[]
     */
    /*public function getStudies(): Collection
    {
        return $this->studies;
    }*/

    public function addStudy(Studies $study): self
    {
        if (!$this->studies->contains($study)) {
            $this->studies[] = $study;
        }

        return $this;
    }

    public function removeStudy(Studies $study): self
    {
        $this->studies->removeElement($study);

        return $this;
    }
}
