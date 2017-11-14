<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserOptions
 *
 * @ORM\Table(name="user_options")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserOptionsRepository")
 */
class UserOptions {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var bool
     *
     * @ORM\Column(name="notifications", type="boolean", nullable=true)
     */
    private $notifications;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * Constructor
     */
    public function __construct() {
        $this->updatedAt = new \DateTime;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set notifications
     *
     * @param boolean $notifications
     *
     * @return UserOptions
     */
    public function setNotifications($notifications) {
        $this->notifications = $notifications;

        return $this;
    }

    /**
     * Get notifications
     *
     * @return bool
     */
    public function getNotifications() {
        return $this->notifications;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return UserOptions
     */
    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt() {
        return $this->updatedAt;
    }

}
