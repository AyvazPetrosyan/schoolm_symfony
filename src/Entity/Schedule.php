<?php

namespace App\Entity;

use App\Repository\ScheduleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ScheduleRepository::class)
 */
class Schedule
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
    private $classId;

    /**
     * @ORM\Column(type="integer")
     */
    private $weekDayId;

    /**
     * @ORM\Column(type="integer")
     */
    private $classHourId;

    /**
     * @ORM\Column(type="integer")
     */
    private $subjectId;

    /**
     * @ORM\Column(type="integer")
     */
    private $stadyYearId;

    /**
     * @ORM\Column(type="boolean")
     */
    private $status;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getWeekDayId(): ?int
    {
        return $this->weekDayId;
    }

    public function setWeekDayId(int $weekDayId): self
    {
        $this->weekDayId = $weekDayId;

        return $this;
    }

    public function getClassHourId(): ?int
    {
        return $this->classHourId;
    }

    public function setClassHourId(int $classHourId): self
    {
        $this->classHourId = $classHourId;

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
