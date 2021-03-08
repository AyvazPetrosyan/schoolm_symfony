<?php

namespace App\Entity;

use App\Repository\UserSubjectRelationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserSubjectRelationRepository::class)
 */
class UserSubjectRelation
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
    private $subjectId;

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

    public function getSubjectId(): ?int
    {
        return $this->subjectId;
    }

    public function setSubjectId(int $subjectId): self
    {
        $this->subjectId = $subjectId;

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
