<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\LectureRepository")
 */
class Lecture
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    public int $id;

    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    public int $universityId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    public string $description;

    /**
     * @var Collection
     * @ORM\ManyToMany(targetEntity="App\Entity\Teacher", inversedBy="lectures")
     * @ORM\JoinTable(
     *     name="lecture_teacher",
     *     joinColumns={
     *         @ORM\JoinColumn(name="lecture_id", referencedColumnName="id"),
     *         @ORM\JoinColumn(name="lecture_university_id", referencedColumnName="university_id"),
     *     },
     *     inverseJoinColumns={
     *         @ORM\JoinColumn(name="teacher_id", referencedColumnName="id"),
     *         @ORM\JoinColumn(name="teacher_university_id", referencedColumnName="university_id"),
     *     }
     * )
     */
    public $lecturers;

    public function __construct()
    {
        $this->lecturers = new ArrayCollection();
    }

    /**
     * @return Collection|Teacher[]
     */
    public function getLecturers(): Collection
    {
        return $this->lecturers;
    }
}
