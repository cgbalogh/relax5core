<?php
namespace CGB\Relax5core\Domain\Model;

/***
 *
 * This file is part of the "relax5core" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 Christoph Balogh <cb@lustige-informatik.at>
 *
 ***/

/**
 * Address
 */
class Address extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Priority
     *
     * @var int
     */
    protected $priority = 0;

    /**
     * @var \CGB\Relax5core\Domain\Model\Person
     * @validatordontdive
     * @datatablesdontdive
     */
    protected $person = null;

    /**
     * @var \CGB\Relax5core\Domain\Model\Link
     * @validatordontdive
     * @datatablesdontdive
     */
    protected $link = null;

    /**
     * @var \CGB\Relax5core\Domain\Model\Company
     * @validatordontdive
     * @datatablesdontdive
     */
    protected $company = null;

    /**
     * sorting
     *
     * @var int
     */
    protected $sorting = 0;

    /**
     * Address
     *
     * @var string
     */
    protected $address = '';

    /**
     * Number
     *
     * @var int
     */
    protected $number = 0;

    /**
     * Number Additions
     *
     * @var string
     */
    protected $numberAdditions = '';

    /**
     * Zip
     *
     * @var string
     */
    protected $zip = '';

    /**
     * City
     *
     * @var string
     */
    protected $city = '';

    /**
     * State
     *
     * @var string
     */
    protected $state = '';

    /**
     * Country
     *
     * @var string
     */
    protected $country = '';

    /**
     * Lat
     *
     * @var float
     */
    protected $lat = 0.0;

    /**
     * Lon
     *
     * @var float
     */
    protected $lon = '';

    /**
     * Geo Only
     *
     * @var bool
     */
    protected $geoOnly = false;

    /**
     * Description
     *
     * @var string
     */
    protected $description = '';

    /**
     * Allow Mail
     *
     * @var bool
     */
    protected $allowMail = false;

    /**
     * Additional Info
     *
     * @var string
     */
    protected $additionalInfo = '';

    /**
     * Verified
     *
     * @var \DateTime
     */
    protected $verified = null;

    /**
     * Permissions
     *
     * @var int
     */
    protected $permissions = 0;

    /**
     * type
     *
     * @var \CGB\Relax5core\Domain\Model\Type
     */
    protected $type = null;

    /**
     * Zoom
     *
     * @var int
     */
    protected $zoom = 0;

    /**
     * Map Type
     *
     * @var string
     */
    protected $mapType = '';

    /**
     * Returns the address
     *
     * @return string $address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Sets the address
     *
     * @param string $address
     * @return void
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @dontlog
     * @return string
     */
    public function getAddressCompound()
    {
        $number = $this->number > 0 ? $this->number : '';
        return "{$this->country} {$this->zip} {$this->city} {$this->address} {$number}{$this->numberAdditions}";
    }

    /**
     * Returns the number
     *
     * @return string $number
     */
    public function getNumber()
    {
        return $this->number > 0 ? (string) $this->number : '';
    }

    /**
     * Sets the number
     *
     * @param int $number
     * @return void
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * Returns the numberAdditions
     *
     * @return string $numberAdditions
     */
    public function getNumberAdditions()
    {
        return $this->numberAdditions;
    }

    /**
     * Sets the numberAdditions
     *
     * @param string $numberAdditions
     * @return void
     */
    public function setNumberAdditions($numberAdditions)
    {
        $this->numberAdditions = $numberAdditions;
    }

    /**
     * Returns the zip
     *
     * @return string $zip
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Sets the zip
     *
     * @param string $zip
     * @return void
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    /**
     * Returns the city
     *
     * @return string $city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Sets the city
     *
     * @param string $city
     * @return void
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * Returns the state
     *
     * @return string $state
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Sets the state
     *
     * @param string $state
     * @return void
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * Returns the country
     *
     * @return string $country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Sets the country
     *
     * @param string $country
     * @return void
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * Returns the lat
     *
     * @return float $lat
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Sets the lat
     *
     * @param float $lat
     * @return void
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    }

    /**
     * Returns the geoOnly
     *
     * @return bool $geoOnly
     */
    public function getGeoOnly()
    {
        return $this->geoOnly;
    }

    /**
     * Sets the geoOnly
     *
     * @param bool $geoOnly
     * @return void
     */
    public function setGeoOnly($geoOnly)
    {
        $this->geoOnly = $geoOnly;
    }

    /**
     * Returns the boolean state of geoOnly
     *
     * @return bool
     */
    public function isGeoOnly()
    {
        return $this->geoOnly;
    }

    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Returns the allowMail
     *
     * @return bool $allowMail
     */
    public function getAllowMail()
    {
        return $this->allowMail;
    }

    /**
     * Sets the allowMail
     *
     * @param bool $allowMail
     * @return void
     */
    public function setAllowMail($allowMail)
    {
        $this->allowMail = $allowMail;
    }

    /**
     * Returns the boolean state of allowMail
     *
     * @return bool
     */
    public function isAllowMail()
    {
        return $this->allowMail;
    }

    /**
     * Returns the priority
     *
     * @return int $priority
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Sets the priority
     *
     * @param int $priority
     * @return void
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    /**
     * Returns the permissions
     *
     * @return int $permissions
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * Sets the permissions
     *
     * @param int $permissions
     * @return void
     */
    public function setPermissions($permissions)
    {
        $this->permissions = $permissions;
    }

    /**
     * Returns the additionalInfo
     *
     * @return string $additionalInfo
     */
    public function getAdditionalInfo()
    {
        return $this->additionalInfo;
    }

    /**
     * Sets the additionalInfo
     *
     * @param string $additionalInfo
     * @return void
     */
    public function setAdditionalInfo($additionalInfo)
    {
        $this->additionalInfo = $additionalInfo;
    }

    /**
     * Returns the lon
     *
     * @return float lon
     */
    public function getLon()
    {
        return $this->lon;
    }

    /**
     * Sets the lon
     *
     * @param string $lon
     * @return void
     */
    public function setLon($lon)
    {
        $this->lon = $lon;
    }

    /**
     * @return \DateTime
     */
    function getVerified()
    {
        return $this->verified;
    }

    /**
     * @return \CGB\Relax5core\Domain\Model\Type
     */
    function getType()
    {
        return $this->type;
    }

    /**
     * @param \DateTime $verified
     */
    function setVerified($verified)
    {
        $this->verified = $verified;
    }

    /**
     * @param \CGB\Relax5core\Domain\Model\Type $type
     */
    function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return \CGB\Relax5core\Domain\Model\Person
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @return \CGB\Relax5core\Domain\Model\Link
     */
    function getLink()
    {
        return $this->link;
    }

    /**
     * @return \CGB\Relax5core\Domain\Model\Company
     */
    function getCompany()
    {
        return $this->company;
    }

    /**
     * @return int
     */
    function getSorting()
    {
        return $this->sorting;
    }

    /**
     * @param int $sorting
     */
    function setSorting($sorting)
    {
        $this->sorting = $sorting;
    }

    /**
     * getParent
     * VIRTUAL: returns the parent of the address record
     *
     * @return type
     */
    function getParent()
    {
        if ($this->person) {
            return $this->person;
        } elseif ($this->company) {
            return $this->company;
        } elseif ($this->link) {
            return $this->link;
        }
        return null;
    }

    /**
     * getParentScope
     * VIRTUAL: returns the parent scope of the address record
     *
     * @return type
     */
    function getParentScope()
    {
        if ($this->person) {
            return 1;
        } elseif ($this->company) {
            return 2;
        } elseif ($this->link) {
            return 3;
        }
        return 0;
    }

    /**
     * Returns the zoom
     *
     * @return int $zoom
     */
    public function getZoom()
    {
        return $this->zoom;
    }

    /**
     * Sets the zoom
     *
     * @param int $zoom
     * @return void
     */
    public function setZoom($zoom)
    {
        $this->zoom = $zoom;
    }

    /**
     * Returns the mapType
     *
     * @return string $mapType
     */
    public function getMapType()
    {
        return $this->mapType;
    }

    /**
     * Sets the mapType
     *
     * @param string $mapType
     * @return void
     */
    public function setMapType($mapType)
    {
        $this->mapType = $mapType;
    }
}
