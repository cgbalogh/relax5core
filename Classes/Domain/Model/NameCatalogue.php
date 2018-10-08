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
 * NameCatalogue
 */
class NameCatalogue extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Name
     *
     * @var string
     * @validate NotEmpty
     */
    protected $name = '';

    /**
     * Gender
     *
     * @var int
     */
    protected $gender = 0;

    /**
     * Verified
     *
     * @var bool
     */
    protected $verified = false;

    /**
     * Returns the name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the gender
     *
     * @return int $gender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Sets the gender
     *
     * @param int $gender
     * @return void
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
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
