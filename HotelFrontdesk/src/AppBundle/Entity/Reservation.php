<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\OneToOne;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReservationRepository")
 */
class Reservation {

    use IdTrait;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $occupiedFrom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $occupiedTo;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=false)
     */
    private $guests;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Room", inversedBy="reservation")
     * @ORM\JoinColumn(name="room_id", referencedColumnName="id")
     */
    private $room;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $note;

    /**
     * Constructor
     */
    public function __construct() {
        $this->guests = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set occupiedFrom
     *
     * @param \DateTime $occupiedFrom
     *
     * @return Reservation
     */
    public function setOccupiedFrom($occupiedFrom) {
        $this->occupiedFrom = $occupiedFrom;

        return $this;
    }

    /**
     * Get occupiedFrom
     *
     * @return \DateTime
     */
    public function getOccupiedFrom() {
        return $this->occupiedFrom;
    }

    /**
     * Set occupiedTo
     *
     * @param \DateTime $occupiedTo
     *
     * @return Reservation
     */
    public function setOccupiedTo($occupiedTo) {
        $this->occupiedTo = $occupiedTo;

        return $this;
    }

    /**
     * Get occupiedTo
     *
     * @return \DateTime
     */
    public function getOccupiedTo() {
        return $this->occupiedTo;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Reservation
     */
    public function setStatus($status) {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * Add guest
     *
     * @param \AppBundle\Entity\Guest $guest
     *
     * @return Reservation
     */
    public function addGuest(\AppBundle\Entity\Guest $guest) {
        $this->guests[] = $guest;

        return $this;
    }

    /**
     * Remove guest
     *
     * @param \AppBundle\Entity\Guest $guest
     */
    public function removeGuest(\AppBundle\Entity\Guest $guest) {
        $this->guests->removeElement($guest);
    }

    /**
     * Get guests
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGuests() {
        return $this->guests;
    }

    /**
     * Set room
     *
     * @param \AppBundle\Entity\Room $room
     *
     * @return Reservation
     */
    public function setRoom(\AppBundle\Entity\Room $room = null) {
        $this->room = $room;

        return $this;
    }

    /**
     * Get room
     *
     * @return \AppBundle\Entity\Room
     */
    public function getRoom() {
        return $this->room;
    }

    /**
     * Set guests
     *
     * @param integer $guests
     *
     * @return Reservation
     */
    public function setGuests($guests)
    {
        $this->guests = $guests;

        return $this;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Reservation
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return Reservation
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }
}
