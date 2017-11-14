<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Holiday
 *
 * @ORM\Table(name="holiday")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\HolidayRepository")
 */

class Holiday
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="holiday")
     * @ORM\JoinColumn(name="userid", referencedColumnName="id")
     */
    private $user;

    /*
    /**
     * @var int
     *
     * @ORM\Column(name="userid", type="integer")
     */
    //private $userid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="holiday_from", type="datetime")
     */
    private $holidayFrom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="holiday_to", type="datetime")
     */
    private $holidayTo;

    /**
     * @var int
     *
     * @ORM\Column(name="days", type="integer")
     */
    private $days;

    /**
     * @var int
     *
     * @ORM\Column(name="accept", type="integer")
     */
    private $accept;

    /**
     * @var int
     *
     * @ORM\Column(name="open", type="integer")
     */
    private $open;

    /**
     * @var int
     *
     * @ORM\Column(name="closed", type="integer")
     */
    private $closed;

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
     * Set userid
     *
     * @param integer $userid
     *
     * @return Holiday
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return int
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set holidayFrom
     *
     * @param \DateTime $holidayFrom
     *
     * @return Holiday
     */
    public function setHolidayFrom($holidayFrom)
    {
        $this->holidayFrom = $holidayFrom;

        return $this;
    }

    /**
     * Get holidayFrom
     *
     * @return \DateTime
     */
    public function getHolidayFrom()
    {
        return $this->holidayFrom;
    }

    /**
     * Set holidayTo
     *
     * @param \DateTime $holidayTo
     *
     * @return Holiday
     */
    public function setHolidayTo($holidayTo)
    {
        $this->holidayTo = $holidayTo;

        return $this;
    }

    /**
     * Get holidayTo
     *
     * @return \DateTime
     */
    public function getHolidayTo()
    {
        return $this->holidayTo;
    }

    /**
     * Set accept
     *
     * @param integer $accept
     *
     * @return Holiday
     */
    public function setAccept($accept)
    {
        $this->accept = $accept;

        return $this;
    }

    /**
     * Get accept
     *
     * @return int
     */
    public function getAccept()
    {
        return $this->accept;
    }

    /**
     * Set open
     *
     * @param integer $open
     *
     * @return Holiday
     */
    public function setOpen($open)
    {
        $this->open = $open;

        return $this;
    }

    /**
     * Get open
     *
     * @return int
     */
    public function getOpen()
    {
        return $this->open;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return int
     */
    public function getClosed()
    {
        return $this->closed;
    }

    /**
     * @param int $closed
     */
    public function setClosed($closed)
    {
        $this->closed = $closed;
    }

    /**
     * @return int
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * @param int $days
     */
    public function setDays($days)
    {
        $this->days = $days;
    }
}

