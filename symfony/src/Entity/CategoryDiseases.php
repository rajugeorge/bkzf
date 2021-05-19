<?php

namespace App\Entity;

use App\Repository\CategoryDiseasesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;

/**
 * @ORM\Entity(repositoryClass=CategoryDiseasesRepository::class)
 */
class CategoryDiseases
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $categoryDiseasesId;

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
     * One Category has Many Categories.
     * @OneToMany(targetEntity="CategoryDiseases", mappedBy="parent")
     */
    private $children;

    /**
     * Many Categories have One Category.
     * @ManyToOne(targetEntity="CategoryDiseases", inversedBy="children")
     * @JoinColumn(name="category_diseases_id", referencedColumnName="id")
     */
    private $parent;

    /**
     * Many Category have Many Studies.
     * @ManyToMany(targetEntity="Studies")
     * @JoinTable(name="study_categories",
     *      joinColumns={@JoinColumn(name="category_diseases_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="studies_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $studies;

    public function __construct()
    {
        $this->children = new ArrayCollection();
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

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
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

    /**
     * @return Collection|CategoryDiseases[]
     */
    public function getChildren(): Collection
    {
        return $this->children;
    }

    public function addChild(CategoryDiseases $child): self
    {
        if (!$this->children->contains($child)) {
            $this->children[] = $child;
            $child->setParent($this);
        }

        return $this;
    }

    public function removeChild(CategoryDiseases $child): self
    {
        if ($this->children->removeElement($child)) {
            // set the owning side to null (unless already changed)
            if ($child->getParent() === $this) {
                $child->setParent(null);
            }
        }

        return $this;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

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
