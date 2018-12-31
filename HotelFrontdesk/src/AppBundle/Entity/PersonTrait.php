<?php


namespace AppBundle\Entity;


trait PersonTrait {

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable=false)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable=false)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $street;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", length=4, nullable=true)
     */
    private $zip;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $country;

}