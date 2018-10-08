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
 * ZipCatalogue
 */
class ZipCatalogue extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Country Code
     *
     * @var string
     */
    protected $countryCode = '';

    /**
     * Zip
     *
     * @var string
     * @validate NotEmpty
     */
    protected $zip = '';

    /**
     * City
     *
     * @var string
     */
    protected $city = '';

    /**
     * Area Code
     *
     * @var string
     */
    protected $areaCode = '';

    /**
     * State
     *
     * @var string
     */
    protected $state = '';

    /**
     * Verified
     *
     * @var bool
     */
    protected $verified = false;

    /**
     * Returns the countryCode
     *
     * @return string $countryCode
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * Sets the countryCode
     *
     * @param string $countryCode
     * @return void
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
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
     * Returns the areaCode
     *
     * @return string $areaCode
     */
    public function getAreaCode()
    {
        return $this->areaCode;
    }

    /**
     * Sets the areaCode
     *
     * @param string $areaCode
     * @return void
     */
    public function setAreaCode($areaCode)
    {
        $this->areaCode = $areaCode;
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
     * Returns the verified
     *
     * @return bool $verified
     */
    public function getVerified()
    {
        return $this->verified;
    }

    /**
     * Sets the verified
     *
     * @param bool $verified
     * @return void
     */
    public function setVerified($verified)
    {
        $this->verified = $verified;
    }

    /**
     * Returns the boolean state of verified
     *
     * @return bool
     */
    public function isVerified()
    {
        return $this->verified;
    }
}
