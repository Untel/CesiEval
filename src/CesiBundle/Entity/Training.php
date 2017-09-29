<?php

namespace CesiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Training
 *
 * @ORM\Table(name="training")
 * @ORM\Entity(repositoryClass="CesiBundle\Repository\TrainingRepository")
 */
class Training
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="starting_date", type="datetime", nullable=true)
     */
    private $startingDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ending_date", type="datetime", nullable=true)
     */
    private $endingDate;

    /**
     * @var string
     *
     * @ORM\Column(name="teacher", type="string", length=255, nullable=true)
     */
    private $teacher;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Training
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set startingDate
     *
     * @param \DateTime $startingDate
     *
     * @return Training
     */
    public function setStartingDate($startingDate)
    {
        $this->startingDate = $startingDate;

        return $this;
    }

    /**
     * Get startingDate
     *
     * @return \DateTime
     */
    public function getStartingDate()
    {
        return $this->startingDate;
    }

    /**
     * Set endingDate
     *
     * @param \DateTime $endingDate
     *
     * @return Training
     */
    public function setEndingDate($endingDate)
    {
        $this->endingDate = $endingDate;

        return $this;
    }

    /**
     * Get endingDate
     *
     * @return \DateTime
     */
    public function getEndingDate()
    {
        return $this->endingDate;
    }

    /**
     * Set teacher
     *
     * @param string $teacher
     *
     * @return Training
     */
    public function setTeacher($teacher)
    {
        $this->teacher = $teacher;

        return $this;
    }

    /**
     * Get teacher
     *
     * @return string
     */
    public function getTeacher()
    {
        return $this->teacher;
    }
}

