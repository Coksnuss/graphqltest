<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\TeacherRepository")
 */
class Teacher
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
    public string $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Lecture", mappedBy="lecturers")
     */
    public Collection $lectures;

    public function __construct()
    {
        $this->lectures = new ArrayCollection();
    }

    /**
     * @return Collection|Lecture[]
     */
    public function getLectures(): Collection
    {
        return $this->lectures;
    }
}
