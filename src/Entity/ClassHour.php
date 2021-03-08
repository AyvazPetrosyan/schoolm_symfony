<?php

namespace App\Entity;

use App\Repository\ClassHourRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClassHourRepository::class)
 */
class ClassHour
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
    private $titleRu;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $titleEn;

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

    public function getTitleRu(): ?string
    {
        return $this->titleRu;
    }

    public function setTitleRu(?string $titleRu): self
    {
        $this->titleRu = $titleRu;

        return $this;
    }

    public function getTitleEn(): ?string
    {
        return $this->titleEn;
    }

    public function setTitleEn(?string $titleEn): self
    {
        $this->titleEn = $titleEn;

        return $this;
    }
}
