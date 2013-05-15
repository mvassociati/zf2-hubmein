<?php

namespace Events\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Events\Entity\Event
 *
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="Events\Entity\Repository\EventRepository")
 *
 */
class Event {

	private static $i_instanced = 1;
	
	/**
	 * @var integer $id
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="SEQUENCE")
	 * @ORM\SequenceGenerator(sequenceName="event_id_seq", allocationSize=1, initialValue=1)
	 */
    private $id;

    /**
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string $abstract
     *
     * @ORM\Column(name="abstract", type="string", length=255, nullable=false)
     */
    private $abstract;

    /**
     * @var \DateTime $datefrom
     *
     * @ORM\Column(name="datefrom", type="datetime", nullable=false)
     */
    private $dateFrom;

    /**
     * @var \DateTime $dateto
     *
     * @ORM\Column(name="dateto", type="datetime", nullable=false)
     */
    private $dateTo;
	
    /**
     * @var string $city
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=false)
     */
    private $city;

    /**
     * @var string $venue
     *
     * @ORM\Column(name="venue", type="string", length=255, nullable=false)
     */
    private $venue;

    /**
     * @var string $averagedayfee
     *
     * @ORM\Column(name="averagedayfee", type="integer", nullable=true)
     */
    private $averageDayFee;

    /**
     * @var string $mainsitelink
     *
     * @ORM\Column(name="mainsitelink", type="string", length=255, nullable=false)
     */
    private $mainSiteLink;

    /**
     * @var Events\Entity\Country
     *
     * @ORM\ManyToOne(targetEntity="Events\Entity\Country", cascade={"persist", "remove"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     * })
     */
    private $country;
	
    public function exchangeArray($data)
    {
        $this->fillWith($data);
    } 
    
    public static function createFromArray($data) {
        $event = new Event();
        $event->fillWith($data);
    
        return $event;
    }
    
    private function setId($i_id) {
    	$this->id = $i_id;
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
     */
    public function setTitle($title)
    {
        $this->title = $title;
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
     * Set abstract
     *
     * @param text $abstract
     */
    public function setAbstract($abstract)
    {
        $this->abstract = $abstract;
    }

    /**
     * Get abstract
     *
     * @return text 
     */
    public function getAbstract()
    {
        return $this->abstract;
    }

    /**
     * Set datefrom
     *
     * @param date $datefrom
     */
    public function setDatefrom($dateFrom)
    {
        $this->dateFrom = $dateFrom;
    }

    /**
     * Get datefrom
     *
     * @return date 
     */
    public function getDateFrom()
    {
        return $this->dateFrom;
    }

    /**
     * Set dateto
     *
     * @param date $dateto
     */
    public function setDateto($dateTo)
    {
        $this->dateTo = $dateTo;
    }

    /**
     * Get earlyBirdUntil
     *
     * @return date 
     */
    public function getEarlyBirdUntil()
    {
        return $this->earlyBirdUntil;
    }
	
	/**
     * Set earlyBirdUntil
     *
     * @param date $earlyBirdUntil
     */
    public function setEarlyBirdUntil($earlyBirdUntil)
    {
        $this->earlyBirdUntil = $earlyBirdUntil;
    }

    /**
     * Get dateto
     *
     * @return date 
     */
    public function getDateTo()
    {
        return $this->dateTo;
    }
	
    /**
     * Set city
     *
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
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
     * Set address
     *
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
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
     * Set venue
     *
     * @param string $venue
     */
    public function setVenue($venue)
    {
        $this->venue = $venue;
    }

    /**
     * Get venue
     *
     * @return string 
     */
    public function getVenue()
    {
        return $this->venue;
    }

    /**
     * Set averagedayfee
     *
     * @param integer $averagedayfee
     */
    public function setAveragedayfee($averagedayfee)
    {
        $this->averageDayFee = $averagedayfee;
    }

    /**
     * Get averagedayfee
     *
     * @return integer 
     */
    public function getAveragedayfee()
    {
        return $this->averageDayFee;
    }

    /**
     * Set mainsitelink
     *
     * @param string $mainsitelink
     */
    public function setMainsitelink($mainsitelink)
    {
        $this->mainSiteLink = $mainsitelink;
    }

    /**
     * Get mainsitelink
     *
     * @return string 
     */
    public function getMainsitelink()
    {
        return $this->mainSiteLink;
    }

    
    /**
     * Get country slug
     *
     * @return string Returns country slug
     */
    public function getCountryslug()
    {
    	return $this->country->getSlug();
    }
        
    /*
     * Get country name
     * 
     * @return string 
     */
    public function getCountryName() {
    	return $this->country->getName();
    }

	
    public function fillWith($data){
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->title = (isset($data['title'])) ? $data['title'] : null;
        $this->abstract = (isset($data['abstract'])) ? $data['abstract'] : null;
        $this->dateFrom = (isset($data['datefrom'])) ? \DateTime::createFromFormat('d/m/Y', $data['datefrom']) : null;
        $this->dateTo = (isset($data['dateto'])) ? \DateTime::createFromFormat('d/m/Y', $data['dateto']) : null;
        $this->city = (isset($data['city'])) ? $data['city'] : null;
        $this->country = (isset($data['country'])) ? $data['country'] : null;
        $this->venue = (isset($data['venue'])) ? $data['venue'] : null;
        $this->averageDayFee = (is_numeric($data['averagedayfee'])) ? $data['averagedayfee'] : null;
        $this->mainSiteLink = (isset($data['mainsitelink'])) ? $data['mainsitelink'] : null;
        $this->slug = (isset($data['slug'])) ? $data['slug'] : null;
    }
    
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
    
}
