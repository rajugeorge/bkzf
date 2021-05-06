<?php

namespace App\Entity;

use App\Repository\MutationsRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * @ORM\Entity(repositoryClass=MutationsRepository::class)
 */
class Mutations
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
    private $mutation;

    /**
     * @ORM\Column(type="integer")
     */
    private $studiesId;

    /**
     * Many Mutations have one study. This is the owning side.
     * @ManyToOne(targetEntity="Studies", inversedBy="mutations")
     * @JoinColumn(name="studies_id", referencedColumnName="id")
     */
    private $studies;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMutation(): ?string
    {
        return $this->mutation;
    }

    public function setMutation(string $mutation): self
    {
        $this->mutation = $mutation;

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
