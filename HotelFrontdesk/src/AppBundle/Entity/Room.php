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
     * @ORM\Column(type="string", length=10, nullable=false)
     */
    private $type;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=false, options={"default"=false})
     */
    private $occupied = 0;

    /**
     * @OneToOne(targetEntity="AppBundle\Entity\Reservation", inversedBy="room")
     * @JoinColumn(name="reservation_id", referencedColumnName="id")
     */
    private $reservation;

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
     * Set occupied
     *
     * @param boolean $occupied
     *
     * @return Room
     */
    public function setOccupied($occupied) {
        $this->occupied = $occupied;

        return $this;
    }

    /**
     * Get occupied
     *
     * @return boolean
     */
    public function getOccupied() {
        return $this->occupied;
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
}
