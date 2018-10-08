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
 * AddressCatalogue
 */
class AddressCatalogue extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Contry Code
     *
     * @var string
     */
    protected $countryCode = '';

    /**
     * Street Code
     *
     * @var string
     */
    protected $streetCode = '';

    /**
     * Community Code
     *
     * @var string
     */
    protected $communityCode = '';

    /**
     * Community Name
     *
     * @var string
     */
    protected $communityName = '';

    /**
     * Address
     *
     * @var string
     * @validate NotEmpty
     */
    protected $address = '';

    /**
     * Zip
     *
     * @var string
     */
    protected $zip = '';

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
     * Returns the streetCode
     *
     * @return string $streetCode
     */
    public function getStreetCode()
    {
        return $this->streetCode;
    }

    /**
     * Sets the streetCode
     *
     * @param string $streetCode
     * @return void
     */
    public function setStreetCode($streetCode)
    {
        $this->streetCode = $streetCode;
    }

    /**
     * Returns the communityCode
     *
     * @return string $communityCode
     */
    public function getCommunityCode()
    {
        return $this->communityCode;
    }

    /**
     * Sets the communityCode
     *
     * @param string $communityCode
     * @return void
     */
    public function setCommunityCode($communityCode)
    {
        $this->communityCode = $communityCode;
    }

    /**
     * Returns the communityName
     *
     * @return string $communityName
     */
    public function getCommunityName()
    {
        return $this->communityName;
    }

    /**
     * Sets the communityName
     *
     * @param string $communityName
     * @return void
     */
    public function setCommunityName($communityName)
    {
        $this->communityName = $communityName;
    }

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
