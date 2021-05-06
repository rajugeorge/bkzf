<?php

namespace App\Entity;

use App\Repository\StudyCategoriesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StudyCategoriesRepository::class)
 */
class StudyCategories
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
    private $categoryDiseasesId;

    /**
     * @ORM\Column(type="integer")
     */
    private $studiesId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategoryDiseasesId(): ?int
    {
        return $this->categoryDiseasesId;
    }

    public function setCategoryDiseasesId(int $categoryDiseasesId): self
    {
        $this->categoryDiseasesId = $categoryDiseasesId;

        return $this;
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
}
