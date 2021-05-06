<?php

namespace App\Entity;

use App\Repository\StudyLocationsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StudyLocationsRepository::class)
 */
class StudyLocations
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $studiesId;

    /**
     * @ORM\Column(type="integer")
     */
    private $hospitalLocationsId;

    /**
     * @ORM\Column(type="string", length=255, columnDefinition="enum('active', 'isplanning', 'closed')")
     */
    private $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStudiesId(): ?int
    {
        return $this->studiesId;
    }

    public function setStudiesId(int $studiesId): self
    {
        $this->studiesId = $studiesId;

        return $this;
    }

    public function getHospitalLocationsId(): ?int
    {
        return $this->hospitalLocationsId;
    }

    public function setHospitalLocationsId(int $hospitalLocationsId): self
    {
        $this->hospitalLocationsId = $hospitalLocationsId;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

}
