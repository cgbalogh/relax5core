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
 * Person
 */
class Person extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
     * Last Name
     *
     * @var string
     * @validate NotEmpty
     */
    protected $lastName = '';

    /**
     * First Name
     *
     * @var string
     */
    protected $firstName = '';

    /**
     * Middle Name
     *
     * @var string
     */
    protected $middleName = '';

    /**
     * Title
     *
     * @var string
     */
    protected $title = '';

    /**
     * Gender
     *
     * @var int
     */
    protected $gender = 0;

    /**
     * Date Of Birth
     *
     * @var \DateTime
     */
    protected $dateOfBirth = null;

    /**
     * Marital State
     *
     * @var int
     */
    protected $maritalState = 0;

    /**
     * Image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @cascade remove
     */
    protected $image = null;

    /**
     * Salutation
     *
     * @var string
     */
    protected $salutation = '';

    /**
     * Comments
     *
     * @var string
     */
    protected $comments = '';

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
     * Permissions
     *
     * @var int
     */
    protected $permissions = 0;

    /**
     * Status
     *
     * @var \CGB\Relax5core\Domain\Model\Status
     * @lazy
     */
    protected $status = null;

    /**
     * Owner
     *
     * @var \CGB\Relax5core\Domain\Model\Owner
     * @lazy
     */
    protected $owner = null;

    /**
     * Usergroup
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup
     * @lazy
     */
    protected $usergroup = null;

    /**
     * Source
     *
     * @var \CGB\Relax5core\Domain\Model\Source
     * @lazy
     */
    protected $source = null;

    /**
     * Sourcedetail
     *
     * @var \CGB\Relax5core\Domain\Model\Sourcedetail
     * @lazy
     */
    protected $sourcedetail = null;

    /**
     * Relations
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Relation>
     * @cascade remove
     * @lazy
     */
    protected $relations = null;

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
     * Documents
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Document>
     * @cascade remove
     * @lazy
     */
    protected $documents = null;

    /**
     * Links
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Link>
     * @cascade remove
     * @lazy
     */
    protected $links = null;

    /**
     * Appointments
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Appointment>
     * @cascade remove
     * @lazy
     */
    protected $appointments = null;

    /**
     * Categories
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Category>
     * @lazy
     */
    protected $categories = null;

    /**
     * Selectors
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Selector>
     * @lazy
     */
    protected $selectors = null;

    /**
     * Returns the lastName
     *
     * @return string $lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Sets the lastName
     *
     * @param string $lastName
     * @return void
     */
    public function setLastName($lastName)
    {
        $this->lastName = trim($lastName);
    }

    /**
     * Returns the firstName
     *
     * @return string $firstName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Sets the firstName
     *
     * @param string $firstName
     * @return void
     */
    public function setFirstName($firstName)
    {
        $this->firstName = trim($firstName);
    }

    /**
     * Returns the middleName
     *
     * @return string $middleName
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * Sets the middleName
     *
     * @param string $middleName
     * @return void
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
    }

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
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
     * Returns the dateOfBirth
     *
     * @return \DateTime $dateOfBirth
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * Sets the dateOfBirth
     *
     * @param \DateTime $dateOfBirth
     * @return void
     */
    public function setDateOfBirth($dateOfBirth)
    {
        if ($dateOfBirth instanceof \DateTime) {
            $dateOfBirth->setTime(0, 0, 0);
        }
        $this->dateOfBirth = $dateOfBirth;
    }

    /**
     * Returns the maritalState
     *
     * @return int $maritalState
     */
    public function getMaritalState()
    {
        return $this->maritalState;
    }

    /**
     * Sets the maritalState
     *
     * @param int $maritalState
     * @return void
     */
    public function setMaritalState($maritalState)
    {
        $this->maritalState = $maritalState;
    }

    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
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
     * Returns the comments
     *
     * @return string $comments
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Sets the comments
     *
     * @param string $comments
     * @return void
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
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
     * Returns the status
     *
     * @return \CGB\Relax5core\Domain\Model\Status status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the status
     *
     * @param string $status
     * @return void
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Returns the owner
     *
     * @return \CGB\Relax5core\Domain\Model\Owner owner
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Sets the owner
     *
     * @param string $owner
     * @return void
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    /**
     * Returns the usergroup
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup usergroup
     */
    public function getUsergroup()
    {
        return $this->usergroup;
    }

    /**
     * Sets the usergroup
     *
     * @param string $usergroup
     * @return void
     */
    public function setUsergroup($usergroup)
    {
        $this->usergroup = $usergroup;
    }

    /**
     * Returns the source
     *
     * @return \CGB\Relax5core\Domain\Model\Source source
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Sets the source
     *
     * @param string $source
     * @return void
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * Returns the sourcedetail
     *
     * @return \CGB\Relax5core\Domain\Model\Sourcedetail sourcedetail
     */
    public function getSourcedetail()
    {
        return $this->sourcedetail;
    }

    /**
     * Sets the sourcedetail
     *
     * @param string $sourcedetail
     * @return void
     */
    public function setSourcedetail($sourcedetail)
    {
        $this->sourcedetail = $sourcedetail;
    }

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
        $this->relations = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->addresses = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->contacts = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->documents = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->links = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->appointments = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->categories = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->selectors = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Adds a
     *
     * @param \CGB\Relax5core\Domain\Model\Address $address
     * @return void
     */
    public function addAddress($address)
    {
        $this->addresses->attach($address);
    }

    /**
     * Removes a
     *
     * @param \CGB\Relax5core\Domain\Model\Address $addressToRemove The Address to be removed
     * @return void
     */
    public function removeAddress($addressToRemove)
    {
        $this->addresses->detach($addressToRemove);
    }

    /**
     * Returns the addresses
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Address> addresses
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
     * Adds a Document
     *
     * @param \CGB\Relax5core\Domain\Model\Document $document
     * @return void
     */
    public function addDocument(\CGB\Relax5core\Domain\Model\Document $document)
    {
        $this->documents->attach($document);
    }

    /**
     * Removes a Document
     *
     * @param \CGB\Relax5core\Domain\Model\Document $documentToRemove The Document to be removed
     * @return void
     */
    public function removeDocument(\CGB\Relax5core\Domain\Model\Document $documentToRemove)
    {
        $this->documents->detach($documentToRemove);
    }

    /**
     * Returns the documents
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Document> $documents
     */
    public function getDocuments()
    {
        return $this->documents;
    }

    /**
     * Sets the documents
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Document> $documents
     * @return void
     */
    public function setDocuments(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $documents)
    {
        $this->documents = $documents;
    }

    /**
     * Adds a Appointment
     *
     * @param \CGB\Relax5core\Domain\Model\Appointment $appointment
     * @return void
     */
    public function addAppointment(\CGB\Relax5core\Domain\Model\Appointment $appointment)
    {
        $this->appointments->attach($appointment);
    }

    /**
     * Removes a Appointment
     *
     * @param \CGB\Relax5core\Domain\Model\Appointment $appointmentToRemove The Appointment to be removed
     * @return void
     */
    public function removeAppointment(\CGB\Relax5core\Domain\Model\Appointment $appointmentToRemove)
    {
        $this->appointments->detach($appointmentToRemove);
    }

    /**
     * Returns the appointments
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Appointment> $appointments
     */
    public function getAppointments()
    {
        return $this->appointments;
    }

    /**
     * Sets the appointments
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Appointment> $appointments
     * @return void
     */
    public function setAppointments(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $appointments)
    {
        $this->appointments = $appointments;
    }

    /**
     * Adds a Link
     *
     * @param \CGB\Relax5core\Domain\Model\Link $link
     * @return void
     */
    public function addLink($link)
    {
        $this->links->attach($link);
    }

    /**
     * Removes a Link
     *
     * @param \CGB\Relax5core\Domain\Model\Link $linkToRemove The Link to be removed
     * @return void
     */
    public function removeLink($linkToRemove)
    {
        $this->links->detach($linkToRemove);
    }

    /**
     * Returns the links
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Link> links
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * Sets the links
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Link> $links
     * @return void
     */
    public function setLinks(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $links)
    {
        $this->links = $links;
    }

    /**
     * Adds a
     *
     * @param \CGB\Relax5core\Domain\Model\Relation $relation
     * @return void
     */
    public function addRelation($relation)
    {
        $this->relations->attach($relation);
    }

    /**
     * Removes a
     *
     * @param \CGB\Relax5core\Domain\Model\Relation $relationToRemove The Relation to be removed
     * @return void
     */
    public function removeRelation($relationToRemove)
    {
        $this->relations->detach($relationToRemove);
    }

    /**
     * Returns the relations
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Relation> relations
     */
    public function getRelations()
    {
        return $this->relations;
    }

    /**
     * Sets the relations
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Relation> $relations
     * @return void
     */
    public function setRelations(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $relations)
    {
        $this->relations = $relations;
    }

    /**
     * @return DateTime
     */
    function getCrdate()
    {
        return $this->crdate;
    }

    /**
     * @return DateTime
     */
    function getTstamp()
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
     * @param \CGB\Relax5core\Domain\Model\Category $categoryToRemove
     * @return void
     */
    public function removeCategory(\CGB\Relax5core\Domain\Model\Category $categoryToRemove)
    {
        $this->categories->detach($categoryToRemove);
    }

    /**
     * cleanContacts
     */
    public function cleanContacts()
    {
        // clean contacts
        $contacts = $this->getContacts();
        
        $removeContactList = [];
        foreach ($contacts as $contact) {
            if ($contact->getNumberRaw() != '') {
                $extDelimiter = $contact->getExtension() ? '-' : '';
                $contact->setContact("+{$contact->getCountrycode()}({$contact->getAreacode()}){$contact->getNumberRaw()}{$extDelimiter}{$contact->getExtension()}");
            }
            if ($contact->getContact() == '') {
                $removeContactList[] = $contact;
            }
        }
        // remove empty contacts
        
        foreach ($removeContactList as $contactToRemove) {
            $this->removeContact($contactToRemove);
        }
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

    /**
     * Adds a Selector
     *
     * @param \CGB\Relax5core\Domain\Model\Selector $selector
     * @return void
     */
    public function addSelector(\CGB\Relax5core\Domain\Model\Selector $selector)
    {
        $this->selectors->attach($selector);
    }

    /**
     * Removes a Selector
     *
     * @param \CGB\Relax5core\Domain\Model\Selector $selectorToRemove The Selector to be removed
     * @return void
     */
    public function removeSelector(\CGB\Relax5core\Domain\Model\Selector $selectorToRemove)
    {
        $this->selectors->detach($selectorToRemove);
    }

    /**
     * Returns the selectors
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Selector> $selectors
     */
    public function getSelectors()
    {
        return $this->selectors;
    }

    /**
     * Sets the selectors
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Selector> $selectors
     * @return void
     */
    public function setSelectors(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $selectors)
    {
        $this->selectors = $selectors;
    }
    
    /**
     * return string
     */
    public function getNameCompound() {
        return $this->lastName . " {$this->firstName} ({$this->title})";
    }

    /**
     * @return string
     */
    public function getFirstContact () {
        $this->contacts->rewind();
        $contact = $this->contacts->current();
        if ($contact instanceof \CGB\Relax5core\Domain\Model\Contact) {
            return $contact->getContact();
        }
    }
    
}
