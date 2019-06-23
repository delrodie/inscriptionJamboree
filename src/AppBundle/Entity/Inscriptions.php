<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inscriptions
 *
 * @ORM\Table(name="inscriptions")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InscriptionsRepository")
 */
class Inscriptions
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
     * @ORM\Column(name="lastname", type="string", length=255, nullable=true)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255, nullable=true)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=255, nullable=true)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="birth_place", type="string", length=255, nullable=true)
     */
    private $birthPlace;

    /**
     * @var string
     *
     * @ORM\Column(name="birth_date", type="string", length=255, nullable=true)
     */
    private $birthDate;

    /**
     * @var string
     *
     * @ORM\Column(name="cel_phone_num", type="string", length=255, nullable=true)
     */
    private $celPhoneNum;

    /**
     * @var string
     *
     * @ORM\Column(name="cpm_payment_date", type="string", length=255, nullable=true)
     */
    private $cpmPaymentDate;

    /**
     * @var string
     *
     * @ORM\Column(name="cpm_trans_status", type="string", length=255, nullable=true)
     */
    private $cpmTransStatus;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Regions")
     * @ORM\JoinColumn(name="region_id", referencedColumnName="id")
     */
    private $region;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Districts")
     * @ORM\JoinColumn(name="district_id", referencedColumnName="id")
     */
    private $district;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Paroisses")
     * @ORM\JoinColumn(name="paroisse_id", referencedColumnName="id")
     */
    private $paroisse;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Branches")
     * @ORM\JoinColumn(name="branche_id", referencedColumnName="id")
     */
    private $branche;


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
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Inscriptions
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Inscriptions
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set gender
     *
     * @param string $gender
     *
     * @return Inscriptions
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set birthPlace
     *
     * @param string $birthPlace
     *
     * @return Inscriptions
     */
    public function setBirthPlace($birthPlace)
    {
        $this->birthPlace = $birthPlace;

        return $this;
    }

    /**
     * Get birthPlace
     *
     * @return string
     */
    public function getBirthPlace()
    {
        return $this->birthPlace;
    }

    /**
     * Set birthDate
     *
     * @param string $birthDate
     *
     * @return Inscriptions
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return string
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set celPhoneNum
     *
     * @param string $celPhoneNum
     *
     * @return Inscriptions
     */
    public function setCelPhoneNum($celPhoneNum)
    {
        $this->celPhoneNum = $celPhoneNum;

        return $this;
    }

    /**
     * Get celPhoneNum
     *
     * @return string
     */
    public function getCelPhoneNum()
    {
        return $this->celPhoneNum;
    }

    /**
     * Set cpmPaymentDate
     *
     * @param string $cpmPaymentDate
     *
     * @return Inscriptions
     */
    public function setCpmPaymentDate($cpmPaymentDate)
    {
        $this->cpmPaymentDate = $cpmPaymentDate;

        return $this;
    }

    /**
     * Get cpmPaymentDate
     *
     * @return string
     */
    public function getCpmPaymentDate()
    {
        return $this->cpmPaymentDate;
    }

    /**
     * Set cpmTransStatus
     *
     * @param string $cpmTransStatus
     *
     * @return Inscriptions
     */
    public function setCpmTransStatus($cpmTransStatus)
    {
        $this->cpmTransStatus = $cpmTransStatus;

        return $this;
    }

    /**
     * Get cpmTransStatus
     *
     * @return string
     */
    public function getCpmTransStatus()
    {
        return $this->cpmTransStatus;
    }

    /**
     * Set region
     *
     * @param \AppBundle\Entity\Regions $region
     *
     * @return Inscriptions
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
     * @return Inscriptions
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

    /**
     * Set paroisse
     *
     * @param \AppBundle\Entity\Paroisses $paroisse
     *
     * @return Inscriptions
     */
    public function setParoisse(\AppBundle\Entity\Paroisses $paroisse = null)
    {
        $this->paroisse = $paroisse;

        return $this;
    }

    /**
     * Get paroisse
     *
     * @return \AppBundle\Entity\Paroisses
     */
    public function getParoisse()
    {
        return $this->paroisse;
    }

    /**
     * Set branche
     *
     * @param \AppBundle\Entity\Branches $branche
     *
     * @return Inscriptions
     */
    public function setBranche(\AppBundle\Entity\Branches $branche = null)
    {
        $this->branche = $branche;

        return $this;
    }

    /**
     * Get branche
     *
     * @return \AppBundle\Entity\Branches
     */
    public function getBranche()
    {
        return $this->branche;
    }
}
