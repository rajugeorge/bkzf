<?php

namespace App\Entity;

use App\Repository\StudiesJsonRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StudiesJsonRepository::class)
 */
class StudiesJson
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $json;

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

    public function getJson(): ?string
    {
        return $this->json;
    }

    public function setJson(?string $json): self
    {
        $this->json = $json;

        return $this;
    }
}
