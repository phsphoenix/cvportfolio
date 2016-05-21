<?php
/**
 * Created by IntelliJ IDEA.
 * User: dracarys
 * Date: 2016-04-22
 * Time: 12:10
 */

namespace Jessica\Portfolio\DataBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Jessica\Portfolio\UserBundle\Entity\PortfolioUser;

/**
 * Class PersonalContactInformation
 * @package Jessica\Portfolio\DataBundle\Entity
 *
 * @ORM\Entity()
 * @ORM\Table(name="personal_contact_information")
 */
class PersonalContactInformation
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
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $user;

    /**
     * @var
     *
     * @ORM\Column(type="string")
     */
    private $firstName;

    /**
     * @var
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $middleName;

    /**
     * @var
     *
     * @ORM\Column(type="string")
     */
    private $lastName;

    private $portrait;

    /**
     * @var
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $address1;

    /**
     * @var
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $address2;

    /**
     * @var
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $address3;

    /**
     * @var
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $zip;

    /**
     * @var
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $city;

    /**
     * @var
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $state;

    /**
     * @var
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $country;

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
    private $homepage;

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
    private $bitbucket;

    /**
     * @var
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $github;

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
     * Set firstName
     *
     * @param string $firstName
     * @return PersonalContactInformation
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set middleName
     *
     * @param string $middleName
     * @return PersonalContactInformation
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;

        return $this;
    }

    /**
     * Get middleName
     *
     * @return string 
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return PersonalContactInformation
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set address1
     *
     * @param string $address1
     * @return PersonalContactInformation
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;

        return $this;
    }

    /**
     * Get address1
     *
     * @return string 
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * Set address2
     *
     * @param string $address2
     * @return PersonalContactInformation
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * Get address2
     *
     * @return string 
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Set address3
     *
     * @param string $address3
     * @return PersonalContactInformation
     */
    public function setAddress3($address3)
    {
        $this->address3 = $address3;

        return $this;
    }

    /**
     * Get address3
     *
     * @return string 
     */
    public function getAddress3()
    {
        return $this->address3;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return PersonalContactInformation
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
     * @return PersonalContactInformation
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
     * @return PersonalContactInformation
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
     * Set homepage
     *
     * @param string $homepage
     * @return PersonalContactInformation
     */
    public function setHomepage($homepage)
    {
        $this->homepage = $homepage;

        return $this;
    }

    /**
     * Get homepage
     *
     * @return string 
     */
    public function getHomepage()
    {
        return $this->homepage;
    }

    /**
     * Set facebook
     *
     * @param string $facebook
     * @return PersonalContactInformation
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
     * @return PersonalContactInformation
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
     * Set linkedIn
     *
     * @param string $linkedIn
     * @return PersonalContactInformation
     */
    public function setLinkedIn($linkedIn)
    {
        $this->linkedIn = $linkedIn;

        return $this;
    }

    /**
     * Get linkedIn
     *
     * @return string 
     */
    public function getLinkedIn()
    {
        return $this->linkedIn;
    }

    /**
     * Set bitbucket
     *
     * @param string $bitbucket
     * @return PersonalContactInformation
     */
    public function setBitbucket($bitbucket)
    {
        $this->bitbucket = $bitbucket;

        return $this;
    }

    /**
     * Get bitbucket
     *
     * @return string 
     */
    public function getBitbucket()
    {
        return $this->bitbucket;
    }

    /**
     * Set github
     *
     * @param string $github
     * @return PersonalContactInformation
     */
    public function setGithub($github)
    {
        $this->github = $github;

        return $this;
    }

    /**
     * Get github
     *
     * @return string 
     */
    public function getGithub()
    {
        return $this->github;
    }

    /**
     * Set comments
     *
     * @param string $comments
     * @return PersonalContactInformation
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
     * @return PersonalContactInformation
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
     * @return PersonalContactInformation
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
     * @return PersonalContactInformation
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
     * Set createdBy
     *
     * @param \Jessica\Portfolio\UserBundle\Entity\PortfolioUser $createdBy
     * @return PersonalContactInformation
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
     * @return PersonalContactInformation
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
     * Set zip
     *
     * @param string $zip
     * @return PersonalContactInformation
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Get zip
     *
     * @return string 
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return PersonalContactInformation
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set state
     *
     * @param string $state
     * @return PersonalContactInformation
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return PersonalContactInformation
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }
}
