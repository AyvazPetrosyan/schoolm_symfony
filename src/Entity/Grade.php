<?php

namespace App\Entity;

use App\Repository\GradeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GradeRepository::class)
 */
class Grade
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $titleAm;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $gradeRu;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $gradeEn;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $color;

    /**
     * @ORM\Column(type="boolean")
     */
    private $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleAm(): ?string
    {
        return $this->titleAm;
    }

    public function setTitleAm(string $titleAm): self
    {
        $this->titleAm = $titleAm;

        return $this;
    }

    public function getGradeRu(): ?string
    {
        return $this->gradeRu;
    }

    public function setGradeRu(?string $gradeRu): self
    {
        $this->gradeRu = $gradeRu;

        return $this;
    }

    public function getGradeEn(): ?string
    {
        return $this->gradeEn;
    }

    public function setGradeEn(?string $gradeEn): self
    {
        $this->gradeEn = $gradeEn;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }
}
