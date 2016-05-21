<?php
/**
 * Created by IntelliJ IDEA.
 * User: dracarys
 * Date: 2016-04-17
 * Time: 18:06
 */

namespace Jessica\Portfolio\DataBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Jessica\Portfolio\UserBundle\Entity\PortfolioUser;

/**
 * Class PortfolioProfileType
 * @package Jessica\Portfolio\DataBundle\Entity
 *
 * @ORM\Entity()
 * @ORM\Table(name="portfolio_profile_types")
 */
class PortfolioProfileType
{
    /**
     * @var
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var
     *
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @var
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $comments;

    /**
     * @var
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @var
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $modified;

    /**
     * @var
     *
     * @Gedmo\Blameable(on="create")
     * @ORM\ManyToOne(targetEntity="Jessica\Portfolio\UserBundle\Entity\PortfolioUser")
     * @ORM\JoinColumn(name="created_by", referencedColumnName="id")
     */
    private $createdBy;

    /**
     * @var
     *
     * @Gedmo\Blameable(on="update")
     * @ORM\ManyToOne(targetEntity="Jessica\Portfolio\UserBundle\Entity\PortfolioUser")
     * @ORM\JoinColumn(name="modified_by", referencedColumnName="id")
     */
    private $modifiedBy;

    public function __toString()
    {
        return $this->name;
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
     * Set name
     *
     * @param string $name
     * @return PortfolioProfileType
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
     * Set description
     *
     * @param string $description
     * @return PortfolioProfileType
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
     * Set comments
     *
     * @param string $comments
     * @return PortfolioProfileType
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return PortfolioProfileType
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set modified
     *
     * @param \DateTime $modified
     * @return PortfolioProfileType
     */
    public function setModified($modified)
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * Get modified
     *
     * @return \DateTime 
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * Set createdBy
     *
     * @param \Jessica\Portfolio\UserBundle\Entity\PortfolioUser $createdBy
     * @return PortfolioProfileType
     */
    public function setCreatedBy(\Jessica\Portfolio\UserBundle\Entity\PortfolioUser $createdBy = null)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \Jessica\Portfolio\UserBundle\Entity\PortfolioUser 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set modifiedBy
     *
     * @param \Jessica\Portfolio\UserBundle\Entity\PortfolioUser $modifiedBy
     * @return PortfolioProfileType
     */
    public function setModifiedBy(\Jessica\Portfolio\UserBundle\Entity\PortfolioUser $modifiedBy = null)
    {
        $this->modifiedBy = $modifiedBy;

        return $this;
    }

    /**
     * Get modifiedBy
     *
     * @return \Jessica\Portfolio\UserBundle\Entity\PortfolioUser 
     */
    public function getModifiedBy()
    {
        return $this->modifiedBy;
    }
}
