<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\OneToOne;

/**
 * Room
 *
 * @ORM\Table(name="room")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RoomRepository")
 */
class Room {

    use IdTrait;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=false)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Reservation", mappedBy="room")
     */
    private $reservation;

    /**
     * @var double
     *
     * @ORM\Column(type="float", nullable=false)
     */
    private $squareMeters;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=false)
     */
    private $persons;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=false)
     */
    private $description;

    //
    // Getter/Setter   -------------------------------------------------------------
    //
    /**
     * Set type
     *
     * @param string $type
     *
     * @return Room
     */
    public function setType($type) {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType() {
        return $this->type;
    }

    /**
     * Set reservation
     *
     * @param \AppBundle\Entity\Reservation $reservation
     *
     * @return Room
     */
    public function setReservation(\AppBundle\Entity\Reservation $reservation = null)
    {
        $this->reservation = $reservation;

        return $this;
    }

    /**
     * Get reservation
     *
     * @return \AppBundle\Entity\Reservation
     */
    public function getReservation()
    {
        return $this->reservation;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reservation = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set squareMeters
     *
     * @param float $squareMeters
     *
     * @return Room
     */
    public function setSquareMeters($squareMeters)
    {
        $this->squareMeters = $squareMeters;

        return $this;
    }

    /**
     * Get squareMeters
     *
     * @return float
     */
    public function getSquareMeters()
    {
        return $this->squareMeters;
    }

    /**
     * Set persons
     *
     * @param string $persons
     *
     * @return Room
     */
    public function setPersons($persons)
    {
        $this->persons = $persons;

        return $this;
    }

    /**
     * Get persons
     *
     * @return string
     */
    public function getPersons()
    {
        return $this->persons;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Room
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
     * Add reservation
     *
     * @param \AppBundle\Entity\Reservation $reservation
     *
     * @return Room
     */
    public function addReservation(\AppBundle\Entity\Reservation $reservation)
    {
        $this->reservation[] = $reservation;

        return $this;
    }

    /**
     * Remove reservation
     *
     * @param \AppBundle\Entity\Reservation $reservation
     */
    public function removeReservation(\AppBundle\Entity\Reservation $reservation)
    {
        $this->reservation->removeElement($reservation);
    }
}
