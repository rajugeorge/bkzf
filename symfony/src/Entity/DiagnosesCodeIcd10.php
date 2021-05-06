<?php

namespace App\Entity;

use App\Repository\DiagnosesCodeIcd10Repository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * @ORM\Entity(repositoryClass=DiagnosesCodeIcd10Repository::class)
 */
class DiagnosesCodeIcd10
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $code;

    /**
     * @ORM\Column(type="integer")
     */
    private $studiesId;

    /**
     * Many codes have one study. This is the owning side.
     * @ManyToOne(targetEntity="Studies", inversedBy="diagnoses_code_icd10")
     * @JoinColumn(name="studies_id", referencedColumnName="id")
     */
    private $studies;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getStudiesId(): ?int
    {
        return $this->studiesId;
    }

    // public function setStudiesId(int $studiesId): self
    // {
    //     $this->studiesId = $studiesId;

    //     return $this;
    // }

    public function getStudies(): ?Studies
    {
        return $this->studies;
    }

    public function setStudies(?Studies $studies): self
    {
        $this->studies = $studies;

        return $this;
    }
}
