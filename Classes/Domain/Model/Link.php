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
 * Link
 */
class Link extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * @var DateTime
     */
    protected $crdate = null;

    /**
     * @var DateTime
     */
    protected $tstamp = null;

    /**
     * @var \CGB\Relax5core\Domain\Model\Company $company
     */
    protected $company = null;

    /**
     * @var \CGB\Relax5core\Domain\Model\Person $person
     */
    protected $person = null;

    /**
     * Division
     *
     * @var string
     */
    protected $division = '';

    /**
     * Role
     *
     * @var string
     */
    protected $role = '';

    /**
     * Role Title
     *
     * @var string
     */
    protected $roleTitle = '';

    /**
     * Salutation
     *
     * @var string
     */
    protected $salutation = '';

    /**
     * Allow Mail
     *
     * @var bool
     */
    protected $allowMail = false;

    /**
     * Address Label
     *
     * @var string
     */
    protected $addressLabel = '';

    /**
     * Person Sorting
     *
     * @var int
     */
    protected $personSorting = 0;

    /**
     * Company Sorting
     *
     * @var int
     */
    protected $companySorting = 0;

    /**
     * Person Priority
     *
     * @var int
     */
    protected $personPriority = 0;

    /**
     * Company Priority
     *
     * @var int
     */
    protected $companyPriority = 0;

    /**
     * Description
     *
     * @var string
     */
    protected $description = '';

    /**
     * Permissions
     *
     * @var int
     */
    protected $permissions = 0;

    /**
     * owner
     *
     * @var \CGB\Relax5core\Domain\Model\Owner
     * @lazy
     */
    protected $owner = null;

    /**
     * usergroup
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup
     * @lazy
     */
    protected $usergroup = null;

    /**
     * Addresses
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Address>
     * @cascade remove
     * @lazy
     */
    protected $addresses = null;

    /**
     * Contacts
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Contact>
     * @cascade remove
     * @lazy
     */
    protected $contacts = null;

    /**
     * Categories
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Category>
     * @lazy
     */
    protected $categories = null;

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->addresses = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->contacts = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->categories = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the division
     *
     * @return string $division
     */
    public function getDivision()
    {
        return $this->division;
    }

    /**
     * Sets the division
     *
     * @param string $division
     * @return void
     */
    public function setDivision($division)
    {
        $this->division = $division;
    }

    /**
     * Returns the role
     *
     * @return string $role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Sets the role
     *
     * @param string $role
     * @return void
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * Returns the roleTitle
     *
     * @return string $roleTitle
     */
    public function getRoleTitle()
    {
        return $this->roleTitle;
    }

    /**
     * Sets the roleTitle
     *
     * @param string $roleTitle
     * @return void
     */
    public function setRoleTitle($roleTitle)
    {
        $this->roleTitle = $roleTitle;
    }

    /**
     * Returns the salutation
     *
     * @return string $salutation
     */
    public function getSalutation()
    {
        return $this->salutation;
    }

    /**
     * Sets the salutation
     *
     * @param string $salutation
     * @return void
     */
    public function setSalutation($salutation)
    {
        $this->salutation = $salutation;
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
     * Returns the addressLabel
     *
     * @return string $addressLabel
     */
    public function getAddressLabel()
    {
        return $this->addressLabel;
    }

    /**
     * Sets the addressLabel
     *
     * @param string $addressLabel
     * @return void
     */
    public function setAddressLabel($addressLabel)
    {
        $this->addressLabel = $addressLabel;
    }

    /**
     * Returns the personSorting
     *
     * @return int $personSorting
     */
    public function getPersonSorting()
    {
        return $this->personSorting;
    }

    /**
     * Sets the personSorting
     *
     * @param int $personSorting
     * @return void
     */
    public function setPersonSorting($personSorting)
    {
        $this->personSorting = $personSorting;
    }

    /**
     * Returns the companySorting
     *
     * @return int $companySorting
     */
    public function getCompanySorting()
    {
        return $this->companySorting;
    }

    /**
     * Sets the companySorting
     *
     * @param int $companySorting
     * @return void
     */
    public function setCompanySorting($companySorting)
    {
        $this->companySorting = $companySorting;
    }

    /**
     * Returns the personPriority
     *
     * @return int $personPriority
     */
    public function getPersonPriority()
    {
        return $this->personPriority;
    }

    /**
     * Sets the personPriority
     *
     * @param int $personPriority
     * @return void
     */
    public function setPersonPriority($personPriority)
    {
        $this->personPriority = $personPriority;
    }

    /**
     * Returns the companyPriority
     *
     * @return int $companyPriority
     */
    public function getCompanyPriority()
    {
        return $this->companyPriority;
    }

    /**
     * Sets the companyPriority
     *
     * @param int $companyPriority
     * @return void
     */
    public function setCompanyPriority($companyPriority)
    {
        $this->companyPriority = $companyPriority;
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
     * @return int $permissions
     */
    public function getPermissions()
    {
        $permissions = 0;
        if ($this->getPerson()) {
            $permissions = $permissions | octdec((string) $this->getPerson()->getPermissions());
        }
        if ($this->getCompany()) {
            $permissions = $permissions | octdec((string) $this->getCompany()->getPermissions());
        }
        return decoct((string) $permissions);
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
     * Returns the owner
     *
     * @return \CGB\Relax5core\Domain\Model\Owner $owner
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Sets the owner
     *
     * @param \CGB\Relax5core\Domain\Model\Owner $owner
     * @return void
     */
    public function setOwner(\CGB\Relax5core\Domain\Model\Owner $owner)
    {
        $this->owner = $owner;
    }

    /**
     * Returns the usergroup
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup $usergroup
     */
    public function getUsergroup()
    {
        return $this->usergroup;
    }

    /**
     * Sets the usergroup
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup $usergroup
     * @return void
     */
    public function setUsergroup(\TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup $usergroup)
    {
        $this->usergroup = $usergroup;
    }

    /**
     * Adds a Address
     *
     * @param \CGB\Relax5core\Domain\Model\Address $address
     * @return void
     */
    public function addAddress(\CGB\Relax5core\Domain\Model\Address $address)
    {
        $this->addresses->attach($address);
    }

    /**
     * Removes a Address
     *
     * @param \CGB\Relax5core\Domain\Model\Address $addressToRemove The Address to be removed
     * @return void
     */
    public function removeAddress(\CGB\Relax5core\Domain\Model\Address $addressToRemove)
    {
        $this->addresses->detach($addressToRemove);
    }

    /**
     * Returns the addresses
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Address> $addresses
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * Sets the addresses
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Address> $addresses
     * @return void
     */
    public function setAddresses(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $addresses)
    {
        $this->addresses = $addresses;
    }

    /**
     * Adds a Contact
     *
     * @param \CGB\Relax5core\Domain\Model\Contact $contact
     * @return void
     */
    public function addContact(\CGB\Relax5core\Domain\Model\Contact $contact)
    {
        $this->contacts->attach($contact);
    }

    /**
     * Removes a Contact
     *
     * @param \CGB\Relax5core\Domain\Model\Contact $contactToRemove The Contact to be removed
     * @return void
     */
    public function removeContact(\CGB\Relax5core\Domain\Model\Contact $contactToRemove)
    {
        $this->contacts->detach($contactToRemove);
    }

    /**
     * Returns the contacts
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Contact> $contacts
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * Sets the contacts
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Contact> $contacts
     * @return void
     */
    public function setContacts(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $contacts)
    {
        $this->contacts = $contacts;
    }

    /**
     * @return \CGB\Relax5core\Domain\Model\Company
     */
    function getCompany()
    {
        return $this->company;
    }

    /**
     * @param \CGB\Relax5core\Domain\Model\Company $company
     */
    function setCompany(\CGB\Relax5core\Domain\Model\Company $company)
    {
        $this->company = $company;
    }

    /**
     * @return \CGB\Relax5core\Domain\Model\Person
     */
    function getPerson()
    {
        return $this->person;
    }

    /**
     * @param \CGB\Relax5core\Domain\Model\Person $person
     */
    function setPerson(\CGB\Relax5core\Domain\Model\Person $person)
    {
        $this->person = $person;
    }

    /**
     * Returns the createdate
     *
     * @return DateTime $crdate
     */
    public function getCrdate()
    {
        return $this->crdate;
    }

    /**
     * Returns the tstamp
     *
     * @return DateTime $tstamp
     */
    public function getTstamp()
    {
        return $this->tstamp;
    }

    /**
     * @return string
     */
    public function getItemtype()
    {
        return strtolower((new \ReflectionClass($this))->getShortName());
    }

    /**
     * Adds a Category
     *
     * @param \CGB\Relax5core\Domain\Model\Category $category
     * @return void
     */
    public function addCategory(\CGB\Relax5core\Domain\Model\Category $category)
    {
        $this->categories->attach($category);
    }

    /**
     * Removes a Category
     *
     * @param \CGB\Relax5core\Domain\Model\Category $categoryToRemove The Category to be removed
     * @return void
     */
    public function removeCategory(\CGB\Relax5core\Domain\Model\Category $categoryToRemove)
    {
        $this->categories->detach($categoryToRemove);
    }

    /**
     * Returns the categories
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Category> $categories
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Returns the categoriesSorted
     *
     * @return array $categories
     */
    public function getCategoriesSorted()
    {
        $categories = [];
        foreach($this->categories as $category) {
            $categories[$category->getCategory()] = $category;
        }
        ksort($categories);
        return $categories;
    }
    
    /**
     * Sets the categories
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Category> $categories
     * @return void
     */
    public function setCategories(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $categories)
    {
        $this->categories = $categories;
    }
}
