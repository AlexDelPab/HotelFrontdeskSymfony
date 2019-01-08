<?php


namespace AppBundle\Entity;


trait IdTrait {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    //
    // Getter/Setter   -------------------------------------------------------------
    //
    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }
}