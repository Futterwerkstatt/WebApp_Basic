<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user_basic")
 */
class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     *
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $first_name;

    /**
     * @ORM\Column(type="string")
     */
    protected $last_name;

    /**
     * @var int
     *
     * @ORM\Column(name="vacation", type="integer", nullable=true)
     */
    private $vacation;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Group")
     * @ORM\JoinTable(name="fos_user_user_group",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     * )
     */
    protected $groups;

    /**
     * @var string
     *
     * @ORM\Column(name="biography", type="text", nullable=true)
     */
    private $biography;
    
    /**
     * @ORM\OneToOne(targetEntity="UserOptions", cascade={"persist", "merge", "remove"})
     */
    private $userOptions;


    /**
     *@ORM\OneToMany(targetEntity="AppBundle\Entity\Holiday", mappedBy="user", indexBy="id")
     */
    private $holiday;


    /*
     *
     */
    public function __construct() {
        parent::__construct();
        // your own logic
    }

    /**
     * Set biography
     *
     * @param string $biography
     *
     * @return User
     */
    public function setBiography($biography)
    {
        $this->biography = $biography;

        return $this;
    }

    /**
     * Get biography
     *
     * @return string
     */
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * Set userOptions
     *
     * @param \AppBundle\Entity\UserOptions $userOptions
     *
     * @return User
     */
    public function setUserOptions(\AppBundle\Entity\UserOptions $userOptions = null)
    {
        $this->userOptions = $userOptions;

        return $this;
    }

    /**
     * Get userOptions
     *
     * @return \AppBundle\Entity\UserOptions
     */
    public function getUserOptions()
    {
        return $this->userOptions;
    }

    /**
     * @return mixed
     */
    public function getHoliday()
    {
        return $this->holiday;
    }

    /**
     * @param mixed $holiday
     */
    public function setHoliday($holiday)
    {
        $this->holiday = $holiday;
    }

    /**
     * @return mixed
     */
    public function getVacation()
    {
        return $this->vacation;
    }

    /**
     * @param mixed $vacation
     */
    public function setVacation($vacation)
    {
        $this->vacation = $vacation;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

}
