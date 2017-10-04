<?php

namespace Bundles\CallMeBundle\Entity;

/**
 * Letter
 */
class Letter
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $comment;
    
    /**
     * @var boolean
     */
    private $done = false;

    public function __toString()
    {
        return $this->name?$this->name:'New';
    }

    public function loadClientData()
    {
        if (!$this->client) {
            return;
        }
        
        if (!$this->name) {
            $this->name = $this->client->getFirstName() . ' ' . $this->client->getLastName();
        }
    }
    
    /**
     * @var string
     */
    private $name;

    /**
     * @var \Bundles\CallMeBundle\Entity\Subject
     */
    private $subject;


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
     * @return Letter
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
     * Set comment
     *
     * @param string $comment
     *
     * @return Letter
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set done
     *
     * @param boolean $done
     *
     * @return Letter
     */
    public function setDone($done)
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
     * Set client
     *
     * @param \Bundles\UserBundle\Entity\Client $client
     *
     * @return Letter
     */
    public function setClient(\Bundles\UserBundle\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \Bundles\UserBundle\Entity\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set subject
     *
     * @param \Bundles\CallMeBundle\Entity\Subject $subject
     *
     * @return Letter
     */
    public function setSubject(\Bundles\CallMeBundle\Entity\Subject $subject = null)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return \Bundles\CallMeBundle\Entity\Subject
     */
    public function getSubject()
    {
        return $this->subject;
    }
}
