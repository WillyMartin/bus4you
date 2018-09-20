<?php

namespace Bundles\CallMeBundle\Entity;

/**
 * Trip
 */
class Trip
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $dispatch;

    /**
     * @var string
     */
    private $destination;

    /**
     * @var \DateTime
     */
    private $date_travel;

    /**
     * @var string
     */
    private $services;

    /**
     * @var integer
     */
    private $quantity_people;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $email;

    /**
     * @var boolean
     */
    private $done = false;

    /**
     * @var \DateTime
     */
    private $creation_time;


    /**
     * Get id
     *
     * @return integer
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
     * @return Trip
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
     * Set dispatch
     *
     * @param string $dispatch
     *
     * @return Trip
     */
    public function setDispatch($dispatch)
    {
        $this->dispatch = $dispatch;

        return $this;
    }

    /**
     * Get dispatch
     *
     * @return string
     */
    public function getDispatch()
    {
        return $this->dispatch;
    }

    /**
     * Set destination
     *
     * @param string $destination
     *
     * @return Trip
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * Get destination
     *
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Set dateTravel
     *
     * @param \DateTime $dateTravel
     *
     * @return Trip
     */
    public function setDateTravel($dateTravel)
    {
        $this->date_travel = $dateTravel;

        return $this;
    }

    /**
     * Get dateTravel
     *
     * @return \DateTime
     */
    public function getDateTravel()
    {
        return $this->date_travel;
    }

    /**
     * Set services
     *
     * @param string $services
     *
     * @return Trip
     */
    public function setServices($services)
    {
        $this->services = $services;

        return $this;
    }

    /**
     * Get services
     *
     * @return string
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * Set quantityPeople
     *
     * @param integer $quantityPeople
     *
     * @return Trip
     */
    public function setQuantityPeople($quantityPeople)
    {
        $this->quantity_people = $quantityPeople;

        return $this;
    }

    /**
     * Get quantityPeople
     *
     * @return integer
     */
    public function getQuantityPeople()
    {
        return $this->quantity_people;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Trip
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Trip
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
     * Set done
     *
     * @param boolean $done
     *
     * @return Trip
     */
    public function  setDone($done)
    {
        $this->done = $done;

        return $this;
    }

    /**
     * Get done
     *
     * @return boolean
     */
    public function getDone()
    {
        return $this->done;
    }

    /**
     * @return \DateTime
     */
    public function getCreationTime()
    {
        return $this->creation_time;
    }

    /**
     * @param \DateTime $creationTime
     */
    public function setCreationTime($creationTime)
    {
        $this->creation_time = $creationTime;
    }
}

