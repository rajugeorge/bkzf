<?php

namespace App\Entity;

use App\Repository\QueueTableRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QueueTableRepository::class)
 */
class QueueTable
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
     * @ORM\Column(type="boolean")
     */
    private $isrun = false;

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

    public function getIsrun(): ?bool
    {
        return $this->isrun;
    }

    public function setIsrun(bool $isrun): self
    {
        $this->isrun = $isrun;

        return $this;
    }
}
