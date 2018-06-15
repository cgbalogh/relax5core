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
 * Contact
 */
class Contact extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * @var \CGB\Relax5core\Domain\Model\Person
     * @validatordontdive
     */
    protected $person = null;

    /**
     * @var \CGB\Relax5core\Domain\Model\Link
     * @validatordontdive
     */
    protected $link = null;

    /**
     * @var \CGB\Relax5core\Domain\Model\Company
     * @validatordontdive
     */
    protected $company = null;

    /**
     * sorting
     *
     * @var int
     */
    protected $sorting = 0;

    /**
     * Contact
     *
     * @var string
     */
    protected $contact = '';

    /**
     * Deny
     *
     * @var string
     */
    protected $deny = '';

    /**
     * Description
     *
     * @var string
     */
    protected $description = '';

    /**
     * Permissions
     *
     * @var string
     */
    protected $permissions = '';

    /**
     * Priority
     *
     * @var int
     */
    protected $priority = 0;

    /**
     * Type
     *
     * @var \CGB\Relax5core\Domain\Model\Type
     */
    protected $type = null;

    /**
     *
     * @var string 
     */
    protected $countrycode;
    
    /**
     *
     * @var string 
     */
    protected $areacode;
    
    /**
     *
     * @var string 
     */
    protected $number;
    
    /**
     *
     * @var string 
     */
    protected $extension;
    
    /**
     * Returns the contact
     *
     * @return string $contact
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Sets the contact
     *
     * @param string $contact
     * @return void
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
    }

    /**
     * Returns the deny
     *
     * @return string $deny
     */
    public function getDeny()
    {
        return $this->deny;
    }

    /**
     * Sets the deny
     *
     * @param string $deny
     * @return void
     */
    public function setDeny($deny)
    {
        $this->deny = $deny;
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
     * Returns the permissions
     *
     * @return string $permissions
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * Sets the permissions
     *
     * @param string $permissions
     * @return void
     */
    public function setPermissions($permissions)
    {
        $this->permissions = $permissions;
    }

    /**
     * Returns the type
     *
     * @return \CGB\Relax5core\Domain\Model\Type $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the type
     *
     * @param \CGB\Relax5core\Domain\Model\Type $type
     * @return void
     */
    public function setType($type)
    {
        $this->type = $type;
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
     * @return string
     */
    public function getCountrycode()
    {
        if (preg_match_all('/^\\+([0-9]*)\\(([0-9]*)\\)([0-9]*)\\-?(.*)$/', str_replace(' ', '', $this->contact), $matches)) {
            return $matches[1][0];
        } else {
            return $this->countrycode;
        }
    }

    /**
     * @return string
     */
    public function getAreacode()
    {
        if (preg_match_all('/^\\+([0-9]*)\\(([0-9]*)\\)([0-9]*)\\-?(.*)$/', str_replace(' ', '', $this->contact), $matches)) {
            return $matches[2][0];
        } else {
            return $this->areacode;
        }
    }

    /**
     * @param string $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        if (preg_match_all('/^\\+([0-9]*)\\(([0-9]*)\\)([0-9]*)\\-?(.*)$/', str_replace(' ', '', $this->contact), $matches)) {
            return $matches[3][0];
        } elseif ($this->number) {
            return $this->number;
        } else {
            return $this->contact;
        }
    }

    /**
     * 
     * @return string
     */
    public function getNumberRaw() {
        return $this->number;
    }
    
    /**
     * @param string $countrycode
     */
    public function setCountrycode($countrycode)
    {
        $this->countrycode = $countrycode;
    }

    /**
     * @param string $areacode
     */
    public function setAreacode($areacode)
    {
        $this->areacode = $areacode;
    }

    /**
     * @param string $extension
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;
    }

    /**
     * @return string
     */
    public function getExtension()
    {
        if (preg_match_all('/^\\+([0-9]*)\\(([0-9]*)\\)([0-9]*)\\-?(.*)$/', str_replace(' ', '', $this->contact), $matches)) {
            return $matches[4][0];
        } else {
            $this->extension;
        }
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
            return 4;
        } elseif ($this->company) {
            return 5;
        } elseif ($this->link) {
            return 6;
        }
        return 0;
    }
}
