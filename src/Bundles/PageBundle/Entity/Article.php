<?php

namespace Bundles\PageBundle\Entity;

use Symfony\Component\HttpFoundation\File\UploadedFile;

use Knp\DoctrineBehaviors\Model as ORMBehaviors;
    
/**
 * Article
 */
class Article
{
    use \Bundles\PageBundle\Model\Pageable;
    use ORMBehaviors\Timestampable\Timestampable;
    
    public function __toString()
    {
        return $this->title?$this->title:'New';
    }

    public function __construct()
    {
        $this->setCreatedAt(new \DateTime);
    }

    public function getSlugFields()
    {
        return [$this->title];
    }
    
    public function getName()
    {
        return $this->title;
    }

    const SERVER_PATH_TO_IMAGE_FOLDER = '/uploads/images/news';
    
    /**
     * Unmapped property to handle file uploads
     */
    private $file;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }
    
    /**
     * Unmapped property to handle file uploads
     */
    private $file2;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile2(UploadedFile $file2 = null)
    {
        $this->file2 = $file2;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile2()
    {
        return $this->file2;
    }
    
        /**
     * Manages the copying of the file to the relevant place on the server
     */
    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFile()) {
            return;
        }

        $folderPath = __DIR__ . '/../../../../web'. self::SERVER_PATH_TO_IMAGE_FOLDER;
        // move takes the target directory and target path as params
        $this->getFile()->move(
            $folderPath,
            $this->getFile()->getClientOriginalName()
        );

        // set the path property to the path where you've saved the file
        $this->image = $this->getFile()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->setFile(null);
    }
    public function upload2()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFile2()) {
            return;
        }

        $folderPath = __DIR__ . '/../../../../web'. self::SERVER_PATH_TO_IMAGE_FOLDER;
        // move takes the target directory and target path as params
        $this->getFile2()->move(
            $folderPath,
            $this->getFile2()->getClientOriginalName()
        );

        // set the path property to the path where you've saved the file
        $this->imageIcon = $this->getFile2()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->setFile2(null);
    }
    
    public function lifecycleFileUpload() {
        $this->upload();
        $this->upload2();
    }
    
    public function getSrc()
    {
        return self::SERVER_PATH_TO_IMAGE_FOLDER .'/'. $this->image;
    }
    
    public function getIconSrc()
    {
        return self::SERVER_PATH_TO_IMAGE_FOLDER .'/'. $this->imageIcon;
    }
    
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
    private $image;

    /**
     * @var string
     */
    private $shortContent;

    /**
     * @var string
     */
    private $content;


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
     * @return Article
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
     * Set image
     *
     * @param string $image
     *
     * @return Article
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set shortContent
     *
     * @param string $shortContent
     *
     * @return Article
     */
    public function setShortContent($shortContent)
    {
        $this->shortContent = $shortContent;

        return $this;
    }

    /**
     * Get shortContent
     *
     * @return string
     */
    public function getShortContent()
    {
        return $this->shortContent;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Article
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }
    /**
     * @var string
     */
    private $imageIcon;


    /**
     * Set imageIcon
     *
     * @param string $imageIcon
     *
     * @return Article
     */
    public function setImageIcon($imageIcon)
    {
        $this->imageIcon = $imageIcon;

        return $this;
    }

    /**
     * Get imageIcon
     *
     * @return string
     */
    public function getImageIcon()
    {
        return $this->imageIcon;
    }
}
