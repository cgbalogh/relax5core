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
     * Country Code
     *
     * @var string
     */
    protected $countryCode = '';

    /**
     * Address
     *
     * @var string
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
     * verified
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
