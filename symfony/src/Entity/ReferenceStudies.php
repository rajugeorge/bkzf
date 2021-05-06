<?php

namespace App\Entity;

use App\Repository\ReferenceStudiesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReferenceStudiesRepository::class)
 */
class ReferenceStudies
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
    private $parentStudiesId;

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

    public function getParentStudiesId(): ?int
    {
        return $this->parentStudiesId;
    }

    public function setParentStudiesId(int $parentStudiesId): self
    {
        $this->parentStudiesId = $parentStudiesId;

        return $this;
    }
}
