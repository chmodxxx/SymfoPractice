<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Post
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="postName", type="string", length=255)
     */
    private $postName;

    /**
     * @var string
     *
     * @ORM\Column(name="postDescription", type="string", length=255)
     */
    private $postDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="postDate", type="string", length=255)
     */
    private $postDate;

    /**
     * @var string
     *
     * @ORM\Column(name="postFiles", type="string", length=255, nullable=true)
     */
    private $postFiles;


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
     * Set postName
     *
     * @param string $postName
     * @return Post
     */
    public function setPostName($postName)
    {
        $this->postName = $postName;

        return $this;
    }

    /**
     * Get postName
     *
     * @return string 
     */
    public function getPostName()
    {
        return $this->postName;
    }

    /**
     * Set postDescription
     *
     * @param string $postDescription
     * @return Post
     */
    public function setPostDescription($postDescription)
    {
        $this->postDescription = $postDescription;

        return $this;
    }

    /**
     * Get postDescription
     *
     * @return string 
     */
    public function getPostDescription()
    {
        return $this->postDescription;
    }

    /**
     * Set postDate
     *
     * @param string $postDate
     * @return Post
     */
    public function setPostDate($postDate)
    {
        $this->postDate = $postDate;

        return $this;
    }

    /**
     * Get postDate
     *
     * @return string 
     */
    public function getPostDate()
    {
        return $this->postDate;
    }

    /**
     * Set postFiles
     *
     * @param string $postFiles
     * @return Post
     */
    public function setPostFiles($postFiles)
    {
        $this->postFiles = $postFiles;

        return $this;
    }

    /**
     * Get postFiles
     *
     * @return string 
     */
    public function getPostFiles()
    {
        return $this->postFiles;
    }
}
