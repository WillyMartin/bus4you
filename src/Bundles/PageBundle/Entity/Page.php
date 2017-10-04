<?php

namespace Bundles\PageBundle\Entity;

use Knp\DoctrineBehaviors\Model\Sluggable\Transliterator;

/**
 * Page
 */
class Page
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var string
     */
    private $description;

    public function __toString()
    {
        return $this->slug ? $this->slug : 'New';
    }
    
    public function generateSlug($values)
    {
        if($this->slug) return true;
        
        $usableValues = [];
        foreach ($values as $fieldName => $fieldValue) {
            if (!empty($fieldValue)) {
                $usableValues[] = $fieldValue;
            }
        }

        if (count($usableValues) < 1) {
            throw new \UnexpectedValueException(
                'Sluggable expects to have at least one usable (non-empty) field from the following: [ ' . implode(array_keys($values), ',') .' ]'
            );
        }

        // generate the slug itself
        $sluggableText = implode(' ', $usableValues);

        $transliterator = new Transliterator;
        $sluggableText = $transliterator->transliterate($sluggableText, '-');

        $urlized = strtolower( trim( preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $sluggableText ), '-' ) );
        $urlized = preg_replace("/[\/_|+ -]+/", '-', $urlized);

        $this->setSlug($urlized);
        
   //     return $urlized;
    }
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
     * Set title
     *
     * @param string $title
     *
     * @return Page
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Page
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Page
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
     * @var integer
     */
    private $itemId;

    /**
     * @var integer
     */
    private $entityId;


    /**
     * Set itemId
     *
     * @param integer $itemId
     *
     * @return Page
     */
    public function setItemId($itemId)
    {
        $this->itemId = $itemId;

        return $this;
    }

    /**
     * Get itemId
     *
     * @return integer
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * Set entityId
     *
     * @param integer $entityId
     *
     * @return Page
     */
    public function setEntityId($entityId)
    {
        $this->entityId = $entityId;

        return $this;
    }

    /**
     * Get entityId
     *
     * @return integer
     */
    public function getEntityId()
    {
        return $this->entityId;
    }
    /**
     * @var string
     */
    private $keywords;


    /**
     * Set keywords
     *
     * @param string $keywords
     *
     * @return Page
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * Get keywords
     *
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }
}
