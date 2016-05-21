<?php
/**
 * Created by IntelliJ IDEA.
 * User: dracarys
 * Date: 2016-04-14
 * Time: 11:32
 */

namespace Jessica\Portfolio\DataBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Jessica\Portfolio\UserBundle\Entity\PortfolioUser;

/**
 * Class ProfilePosition
 * @package Jessica\Portfolio\DataBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="profile_position_entries")
 */
class ProfilePositionEntry
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
     * @ORM\ManyToOne(targetEntity="PortfolioProfile")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $profile;

    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="PositionEntry")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $positionEntry;

    /**
     * @var
     *
     * @ORM\Column(type="integer")
     */
    private $displayOrder;

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
     * Set displayOrder
     *
     * @param integer $displayOrder
     * @return ProfilePosition
     */
    public function setDisplayOrder($displayOrder)
    {
        $this->displayOrder = $displayOrder;

        return $this;
    }

    /**
     * Get displayOrder
     *
     * @return integer 
     */
    public function getDisplayOrder()
    {
        return $this->displayOrder;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return ProfilePosition
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
     * @return ProfilePosition
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
     * Set profile
     *
     * @param \Jessica\Portfolio\DataBundle\Entity\PortfolioProfile $profile
     * @return ProfilePosition
     */
    public function setProfile(\Jessica\Portfolio\DataBundle\Entity\PortfolioProfile $profile = null)
    {
        $this->profile = $profile;

        return $this;
    }

    /**
     * Get profile
     *
     * @return \Jessica\Portfolio\DataBundle\Entity\PortfolioProfile 
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * Set positionEntry
     *
     * @param \Jessica\Portfolio\DataBundle\Entity\PositionEntry $positionEntry
     * @return ProfilePosition
     */
    public function setPositionEntry(\Jessica\Portfolio\DataBundle\Entity\PositionEntry $positionEntry = null)
    {
        $this->positionEntry = $positionEntry;

        return $this;
    }

    /**
     * Get positionEntry
     *
     * @return \Jessica\Portfolio\DataBundle\Entity\PositionEntry 
     */
    public function getPositionEntry()
    {
        return $this->positionEntry;
    }

    /**
     * Set createdBy
     *
     * @param \Jessica\Portfolio\UserBundle\Entity\PortfolioUser $createdBy
     * @return ProfilePosition
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
     * @return ProfilePosition
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
     * @return ProfilePositionEntry
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
