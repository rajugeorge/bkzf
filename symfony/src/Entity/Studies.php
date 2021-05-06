<?php

namespace App\Entity;

use App\Repository\StudiesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\JoinTable;
use App\Entity\StudyPhase;

/**
 * @ORM\Entity(repositoryClass=StudiesRepository::class)
 */
class Studies
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
    private $shortTitle;

    /**
     * @ORM\Column(type="text")
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $eudraCt;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nct;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $drks;

    /**
     * @ORM\Column(type="integer")
     */
    
    
    private $isactive;

    /**
     * @ORM\Column(type="datetime")
     */
    
    private $updatedTime;

    
    /**
     * @OneToOne(targetEntity="StudyPhase")
     * @JoinColumn(name="study_phase_id", referencedColumnName="id")
     */
    private $studyPhase;

    /**
     * @OneToOne(targetEntity="User")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * One studies has many diagnosesCodes. This is the inverse side.
     * @OneToMany(targetEntity="DiagnosesCodeIcd10", mappedBy="studies")
     */
    private $diagnosesCodeIcd10;

    /**
     * One studies has many mutations. This is the inverse side.
     * @OneToMany(targetEntity="Mutations", mappedBy="studies")
     */
    private $mutations;

    /**
     * Many Study have Many Categories.
     * @ManyToMany(targetEntity="CategoryDiseases")
     * @JoinTable(name="study_categories",
     *      joinColumns={@JoinColumn(name="studies_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="category_diseases_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $categoryDiseases;

        /**
     * Many Study have Many locations.
     * @ManyToMany(targetEntity="HospitalLocations")
     * @JoinTable(name="study_locations",
     *      joinColumns={@JoinColumn(name="studies_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="hospital_locations_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $hospitalLocations;

    public function __construct()
    {
        $this->diagnosesCodeIcd10 = new ArrayCollection();
        $this->mutations = new ArrayCollection();
        $this->categoryDiseases = new ArrayCollection();
        $this->hospitalLocations = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getShortTitle(): ?string
    {
        return $this->shortTitle;
    }

    public function setShortTitle(string $shortTitle): self
    {
        $this->shortTitle = $shortTitle;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    // public function getStudyPhaseId(): ?int
    // {
    //     return $this->studyPhaseId;
    // }

    // public function setStudyPhaseId(int $studyPhaseId): self
    // {
    //     $this->studyPhaseId = $studyPhaseId;

    //     return $this;
    // }

    public function getEudraCt(): ?string
    {
        return $this->eudraCt;
    }

    public function setEudraCt(string $eudraCt): self
    {
        $this->eudraCt = $eudraCt;

        return $this;
    }

    public function getNct(): ?string
    {
        return $this->nct;
    }

    public function setNct(string $nct): self
    {
        $this->nct = $nct;

        return $this;
    }

    public function getDrks(): ?string
    {
        return $this->drks;
    }

    public function setDrks(string $drks): self
    {
        $this->drks = $drks;

        return $this;
    }


    /*public function getUpdatedTime(): ?\DateTimeInterface
    {
        return $this->updatedTime;
    }*/

    public function setUpdatedTime(\DateTimeInterface $updatedTime): self
    {
        $this->updatedTime = $updatedTime;

        return $this;
    }

    public function getIsactive(): ?bool
    {
        return $this->isactive;
    }

    public function setIsactive(?bool $isactive): self
    {
        $this->isactive = $isactive;

        return $this;
    }

    public function getStudyPhase(): ?StudyPhase
    {
        return $this->studyPhase;
    }

    public function setStudyPhase(?StudyPhase $studyPhase): self
    {
        $this->studyPhase = $studyPhase;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|DiagnosesCodeIcd10[]
     */
    public function getDiagnosesCodeIcd10(): Collection
    {
        return $this->diagnosesCodeIcd10;
    }

    /*public function addDiagnosesCodeIcd10(DiagnosesCodeIcd10 $diagnosesCodeIcd10): self
    {
        if (!$this->diagnosesCodeIcd10->contains($diagnosesCodeIcd10)) {
            $this->diagnosesCodeIcd10[] = $diagnosesCodeIcd10;
            $diagnosesCodeIcd10->setStudies($this);
        }

        return $this;
    }*/

    public function removeDiagnosesCodeIcd10(DiagnosesCodeIcd10 $diagnosesCodeIcd10): self
    {
        if ($this->diagnosesCodeIcd10->removeElement($diagnosesCodeIcd10)) {
            // set the owning side to null (unless already changed)
            if ($diagnosesCodeIcd10->getStudies() === $this) {
                $diagnosesCodeIcd10->setStudies(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Mutations[]
     */
    public function getMutations(): Collection
    {
        return $this->mutations;
    }

    /*public function addMutation(Mutations $mutation): self
    {
        if (!$this->mutations->contains($mutation)) {
            $this->mutations[] = $mutation;
            $mutation->setStudies($this);
        }

        return $this;
    }*/

    public function removeMutation(Mutations $mutation): self
    {
        if ($this->mutations->removeElement($mutation)) {
            // set the owning side to null (unless already changed)
            if ($mutation->getStudies() === $this) {
                $mutation->setStudies(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CategoryDiseases[]
     */
    public function getCategoryDiseases(): Collection
    {
        return $this->categoryDiseases;
    }

    /*public function addCategoryDisease(CategoryDiseases $categoryDisease): self
    {
        if (!$this->categoryDiseases->contains($categoryDisease)) {
            $this->categoryDiseases[] = $categoryDisease;
        }

        return $this;
    }*/

    public function removeCategoryDisease(CategoryDiseases $categoryDisease): self
    {
        $this->categoryDiseases->removeElement($categoryDisease);

        return $this;
    }

    /**
     * @return Collection|HospitalLocations[]
     */
    public function getHospitalLocations(): Collection
    {
        return $this->hospitalLocations;
    }

    /*public function addHospitalLocation(HospitalLocations $hospitalLocation): self
    {
        if (!$this->hospitalLocations->contains($hospitalLocation)) {
            $this->hospitalLocations[] = $hospitalLocation;
        }

        return $this;
    }*/

    public function removeHospitalLocation(HospitalLocations $hospitalLocation): self
    {
        $this->hospitalLocations->removeElement($hospitalLocation);

        return $this;
    }

}
