<?php
/**
 * Created by IntelliJ IDEA.
 * User: dracarys
 * Date: 2016-03-28
 * Time: 19:34
 */

namespace Jessica\Portfolio\DataBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Jessica\Portfolio\UserBundle\Entity\PortfolioUser;

/**
 * Class Organization
 * @package Jessica\Portfolio\DataBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="organizations")
 */
class Organization
{
    /**
     * @var
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="OrganizationType")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $type;

    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="Jessica\Portfolio\UserBundle\Entity\PortfolioUser")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $user;

    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="OrganizationSize")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $size;

    /**
     * @var
     *
     * @ORM\Column(type="string")
     */
    private $name;

    private $logo;

    /**
     * @var
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $founded;

    /**
     * @var
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $address;


    /**
     * @var
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $phone;

    /**
     * @var
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $mobile;

    /**
     * @var
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $email;

    /**
     * @var
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $website;

    /**
     * @var
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $facebook;

    /**
     * @var
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $twitter;

    /**
     * @var
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $linkedIn;

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
    private $presentation;

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
     * @return Organization
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
     * Set founded
     *
     * @param \DateTime $founded
     * @return Organization
     */
    public function setFounded($founded)
    {
        $this->founded = $founded;

        return $this;
    }

    /**
     * Get founded
     *
     * @return \DateTime 
     */
    public function getFounded()
    {
        return $this->founded;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Organization
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Organization
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
     * Set mobile
     *
     * @param string $mobile
     * @return Organization
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string 
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Organization
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
     * Set website
     *
     * @param string $website
     * @return Organization
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set facebook
     *
     * @param string $facebook
     * @return Organization
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Get facebook
     *
     * @return string 
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set twitter
     *
     * @param string $twitter
     * @return Organization
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * Get twitter
     *
     * @return string 
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Set linkedin
     *
     * @param string $linkedin
     * @return Organization
     */
    public function setLinkedIn($linkedIn)
    {
        $this->linkedIn = $linkedIn;

        return $this;
    }

    /**
     * Get linkedin
     *
     * @return string 
     */
    public function getLinkedIn()
    {
        return $this->linkedIn;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Organization
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
     * Set presentation
     *
     * @param string $presentation
     * @return Organization
     */
    public function setPresentation($presentation)
    {
        $this->presentation = $presentation;

        return $this;
    }

    /**
     * Get presentation
     *
     * @return string 
     */
    public function getPresentation()
    {
        return $this->presentation;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Organization
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
     * @return Organization
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
     * Set type
     *
     * @param \Jessica\Portfolio\DataBundle\Entity\OrganizationType $type
     * @return Organization
     */
    public function setType(\Jessica\Portfolio\DataBundle\Entity\OrganizationType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \Jessica\Portfolio\DataBundle\Entity\OrganizationType 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set user
     *
     * @param \Jessica\Portfolio\UserBundle\Entity\PortfolioUser $user
     * @return Organization
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
     * Set size
     *
     * @param \Jessica\Portfolio\DataBundle\Entity\OrganizationSize $size
     * @return Organization
     */
    public function setSize(\Jessica\Portfolio\DataBundle\Entity\OrganizationSize $size = null)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return \Jessica\Portfolio\DataBundle\Entity\OrganizationSize 
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set createdBy
     *
     * @param \Jessica\Portfolio\UserBundle\Entity\PortfolioUser $createdBy
     * @return Organization
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
     * @return Organization
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
