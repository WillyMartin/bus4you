<?php

namespace Bundles\CallMeBundle\Entity;

/**
 * CallMe
 */
class CallMe
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $phone;

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
    
    /**
     * @var string
     */
    private $name;


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
     * @return CallMe
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
     * Set phone
     *
     * @param string $phone
     *
     * @return CallMe
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
     * Set comment
     *
     * @param string $comment
     *
     * @return CallMe
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
     * @return CallMe
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
     * @var string
     */
    private $object;

    /**
     * Set object
     *
     * @param string $object
     *
     * @return CallMe
     */
    public function setObject($object)
    {
        $this->object = $object;

        return $this;
    }

    /**
     * Get object
     *
     * @return string
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @var \Bundles\CallMeBundle\Entity\Subject
     */
    private $subject;


    /**
     * Set subject
     *
     * @param \Bundles\CallMeBundle\Entity\Subject $subject
     *
     * @return CallMe
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
    /**
     * @var string
     */
    private $email;


    /**
     * Set email
     *
     * @param string $email
     *
     * @return CallMe
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
     * @var string
     */
    private $type_message;


    /**
     * Set typeMessage
     *
     * @param string $typeMessage
     *
     * @return CallMe
     */
    public function setTypeMessage($typeMessage)
    {
        $this->type_message = $typeMessage;

        return $this;
    }

    /**
     * Get typeMessage
     *
     * @return string
     */
    public function getTypeMessage()
    {
        return $this->type_message;
    }
    /**
     * @var string
     */
    private $message;


    /**
     * Set message
     *
     * @param string $message
     *
     * @return CallMe
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }
}
