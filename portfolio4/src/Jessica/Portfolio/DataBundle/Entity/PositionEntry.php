<?php
/**
 * Created by IntelliJ IDEA.
 * User: dracarys
 * Date: 2016-03-28
 * Time: 14:14
 */

namespace Jessica\Portfolio\DataBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Jessica\Portfolio\UserBundle\Entity\PortfolioUser;

/**
 * Class PositionEntry
 * @package Jessica\Portfolio\DataBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="position_entries")
 */
class PositionEntry
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
     * @ORM\ManyToOne(targetEntity="Jessica\Portfolio\UserBundle\Entity\PortfolioUser")
     * @@ORM\JoinColumn(referencedColumnName="id")
     */
    private $user;

    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="PositionType")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $type;

    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="Organization")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $organization;

    /**
     * @var
     *
     * @ORM\Column(type="datetime")
     */
    private $startDate;

    /**
     * @var
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $endDate;

    /**
     * @var
     *
     * @ORM\Column(type="text")
     */
    private $title;

    /**
     * @var
     *
     * @ORM\Column(type="text")
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
        return $this->title.', '.$this->organization.', '.$this->startDate->format('Y-m-d').' to '.', '.$this->endDate->format('Y-m-d');
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
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return PositionEntry
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return PositionEntry
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return PositionEntry
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
     * Set description
     *
     * @param string $description
     * @return PositionEntry
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
     * Set created
     *
     * @param \DateTime $created
     * @return PositionEntry
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
     * @return PositionEntry
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
     * Set user
     *
     * @param \Jessica\Portfolio\UserBundle\Entity\PortfolioUser $user
     * @return PositionEntry
     */
    public function setUser(\Jessica\Portfolio\UserBundle\Entity\PortfolioUser $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Jessica\Portfolio\UserBundle\Entity\PortfolioUser 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set type
     *
     * @param \Jessica\Portfolio\DataBundle\Entity\PositionType $type
     * @return PositionEntry
     */
    public function setType(\Jessica\Portfolio\DataBundle\Entity\PositionType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \Jessica\Portfolio\DataBundle\Entity\PositionType 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set organization
     *
     * @param \Jessica\Portfolio\DataBundle\Entity\Organization $organization
     * @return PositionEntry
     */
    public function setOrganization(\Jessica\Portfolio\DataBundle\Entity\Organization $organization = null)
    {
        $this->organization = $organization;

        return $this;
    }

    /**
     * Get organization
     *
     * @return \Jessica\Portfolio\DataBundle\Entity\Organization 
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * Set createdBy
     *
     * @param \Jessica\Portfolio\UserBundle\Entity\PortfolioUser $createdBy
     * @return PositionEntry
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
     * @return PositionEntry
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

    /**
     * Set comments
     *
     * @param string $comments
     * @return PositionEntry
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
}
