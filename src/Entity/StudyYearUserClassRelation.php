<?php

namespace App\Entity;

use App\Repository\StudyYearUserClassRelationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StudyYearUserClassRelationRepository::class)
 */
class StudyYearUserClassRelation
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
    private $userId;

    /**
     * @ORM\Column(type="integer")
     */
    private $classId;

    /**
     * @ORM\Column(type="integer")
     */
    private $stadyYearId;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getClassId(): ?int
    {
        return $this->classId;
    }

    public function setClassId(int $classId): self
    {
        $this->classId = $classId;

        return $this;
    }

    public function getStadyYearId(): ?int
    {
        return $this->stadyYearId;
    }

    public function setStadyYearId(int $stadyYearId): self
    {
        $this->stadyYearId = $stadyYearId;

        return $this;
    }
}
