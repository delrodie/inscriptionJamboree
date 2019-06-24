<?php

namespace AppBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * Paroisses
 *
 * @ORM\Table(name="paroisses")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ParoissesRepository")
 */
class Paroisses
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
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="group", type="text", nullable=true)
     */
    private $group;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Regions")
     * @ORM\JoinColumn(name="region_id", referencedColumnName="id")
     */
    private $region;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Districts")
     * @ORM\JoinColumn(name="disctrict_id", referencedColumnName="id")
     */
    private $district;


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
     * @return Paroisses
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
     * Set description
     *
     * @param string $description
     *
     * @return Paroisses
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set group
     *
     * @param string $group
     *
     * @return Paroisses
     */
    public function setGroup($group)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Get group
     *
     * @return string
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set region
     *
     * @param \AppBundle\Entity\Regions $region
     *
     * @return Paroisses
     */
    public function setRegion(\AppBundle\Entity\Regions $region = null)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return \AppBundle\Entity\Regions
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set district
     *
     * @param \AppBundle\Entity\Districts $district
     *
     * @return Paroisses
     */
    public function setDistrict(\AppBundle\Entity\Districts $district = null)
    {
        $this->district = $district;

        return $this;
    }

    /**
     * Get district
     *
     * @return \AppBundle\Entity\Districts
     */
    public function getDistrict()
    {
        return $this->district;
    }
}
