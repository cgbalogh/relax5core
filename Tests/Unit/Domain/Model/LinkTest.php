<?php
namespace CGB\Relax5core\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Christoph Balogh <cb@lustige-informatik.at>
 */
class LinkTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5core\Domain\Model\Link
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \CGB\Relax5core\Domain\Model\Link();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getDivisionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDivision()
        );

    }

    /**
     * @test
     */
    public function setDivisionForStringSetsDivision()
    {
        $this->subject->setDivision('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'division',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getRoleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getRole()
        );

    }

    /**
     * @test
     */
    public function setRoleForStringSetsRole()
    {
        $this->subject->setRole('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'role',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getRoleTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getRoleTitle()
        );

    }

    /**
     * @test
     */
    public function setRoleTitleForStringSetsRoleTitle()
    {
        $this->subject->setRoleTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'roleTitle',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getSalutationReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getSalutation()
        );

    }

    /**
     * @test
     */
    public function setSalutationForStringSetsSalutation()
    {
        $this->subject->setSalutation('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'salutation',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getAllowMailReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getAllowMail()
        );

    }

    /**
     * @test
     */
    public function setAllowMailForBoolSetsAllowMail()
    {
        $this->subject->setAllowMail(true);

        self::assertAttributeEquals(
            true,
            'allowMail',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getAddressLabelReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getAddressLabel()
        );

    }

    /**
     * @test
     */
    public function setAddressLabelForStringSetsAddressLabel()
    {
        $this->subject->setAddressLabel('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'addressLabel',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getPermissionsReturnsInitialValueForInt()
    {
    }

    /**
     * @test
     */
    public function setPermissionsForIntSetsPermissions()
    {
    }

    /**
     * @test
     */
    public function getPersonSortingReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPersonSorting()
        );

    }

    /**
     * @test
     */
    public function setPersonSortingForStringSetsPersonSorting()
    {
        $this->subject->setPersonSorting('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'personSorting',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getCompanySortingReturnsInitialValueForInt()
    {
    }

    /**
     * @test
     */
    public function setCompanySortingForIntSetsCompanySorting()
    {
    }

    /**
     * @test
     */
    public function getPersonPriorityReturnsInitialValueForInt()
    {
    }

    /**
     * @test
     */
    public function setPersonPriorityForIntSetsPersonPriority()
    {
    }

    /**
     * @test
     */
    public function getCompanyPriorityReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getCompanyPriority()
        );

    }

    /**
     * @test
     */
    public function setCompanyPriorityForStringSetsCompanyPriority()
    {
        $this->subject->setCompanyPriority('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'companyPriority',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getDescriptionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );

    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription()
    {
        $this->subject->setDescription('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'description',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getAddressesReturnsInitialValueForAddress()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getAddresses()
        );

    }

    /**
     * @test
     */
    public function setAddressesForObjectStorageContainingAddressSetsAddresses()
    {
        $address = new \CGB\Relax5core\Domain\Model\Address();
        $objectStorageHoldingExactlyOneAddresses = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneAddresses->attach($address);
        $this->subject->setAddresses($objectStorageHoldingExactlyOneAddresses);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneAddresses,
            'addresses',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function addAddressToObjectStorageHoldingAddresses()
    {
        $address = new \CGB\Relax5core\Domain\Model\Address();
        $addressesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $addressesObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($address));
        $this->inject($this->subject, 'addresses', $addressesObjectStorageMock);

        $this->subject->addAddress($address);
    }

    /**
     * @test
     */
    public function removeAddressFromObjectStorageHoldingAddresses()
    {
        $address = new \CGB\Relax5core\Domain\Model\Address();
        $addressesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $addressesObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($address));
        $this->inject($this->subject, 'addresses', $addressesObjectStorageMock);

        $this->subject->removeAddress($address);

    }

    /**
     * @test
     */
    public function getContactsReturnsInitialValueForContact()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getContacts()
        );

    }

    /**
     * @test
     */
    public function setContactsForObjectStorageContainingContactSetsContacts()
    {
        $contact = new \CGB\Relax5core\Domain\Model\Contact();
        $objectStorageHoldingExactlyOneContacts = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneContacts->attach($contact);
        $this->subject->setContacts($objectStorageHoldingExactlyOneContacts);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneContacts,
            'contacts',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function addContactToObjectStorageHoldingContacts()
    {
        $contact = new \CGB\Relax5core\Domain\Model\Contact();
        $contactsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $contactsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($contact));
        $this->inject($this->subject, 'contacts', $contactsObjectStorageMock);

        $this->subject->addContact($contact);
    }

    /**
     * @test
     */
    public function removeContactFromObjectStorageHoldingContacts()
    {
        $contact = new \CGB\Relax5core\Domain\Model\Contact();
        $contactsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $contactsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($contact));
        $this->inject($this->subject, 'contacts', $contactsObjectStorageMock);

        $this->subject->removeContact($contact);

    }

    /**
     * @test
     */
    public function getCategoriesReturnsInitialValueForCategory()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getCategories()
        );

    }

    /**
     * @test
     */
    public function setCategoriesForObjectStorageContainingCategorySetsCategories()
    {
        $category = new \CGB\Relax5core\Domain\Model\Category();
        $objectStorageHoldingExactlyOneCategories = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneCategories->attach($category);
        $this->subject->setCategories($objectStorageHoldingExactlyOneCategories);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneCategories,
            'categories',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function addCategoryToObjectStorageHoldingCategories()
    {
        $category = new \CGB\Relax5core\Domain\Model\Category();
        $categoriesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $categoriesObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($category));
        $this->inject($this->subject, 'categories', $categoriesObjectStorageMock);

        $this->subject->addCategory($category);
    }

    /**
     * @test
     */
    public function removeCategoryFromObjectStorageHoldingCategories()
    {
        $category = new \CGB\Relax5core\Domain\Model\Category();
        $categoriesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $categoriesObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($category));
        $this->inject($this->subject, 'categories', $categoriesObjectStorageMock);

        $this->subject->removeCategory($category);

    }

    /**
     * @test
     */
    public function getPersonReturnsInitialValueForPerson()
    {
        self::assertEquals(
            null,
            $this->subject->getPerson()
        );

    }

    /**
     * @test
     */
    public function setPersonForPersonSetsPerson()
    {
        $personFixture = new \CGB\Relax5core\Domain\Model\Person();
        $this->subject->setPerson($personFixture);

        self::assertAttributeEquals(
            $personFixture,
            'person',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getCompanyReturnsInitialValueForCompany()
    {
        self::assertEquals(
            null,
            $this->subject->getCompany()
        );

    }

    /**
     * @test
     */
    public function setCompanyForCompanySetsCompany()
    {
        $companyFixture = new \CGB\Relax5core\Domain\Model\Company();
        $this->subject->setCompany($companyFixture);

        self::assertAttributeEquals(
            $companyFixture,
            'company',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getOwnerReturnsInitialValueForOwner()
    {
        self::assertEquals(
            null,
            $this->subject->getOwner()
        );

    }

    /**
     * @test
     */
    public function setOwnerForOwnerSetsOwner()
    {
        $ownerFixture = new \CGB\Relax5core\Domain\Model\Owner();
        $this->subject->setOwner($ownerFixture);

        self::assertAttributeEquals(
            $ownerFixture,
            'owner',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getUsergroupReturnsInitialValueForUsergroup()
    {
        self::assertEquals(
            null,
            $this->subject->getUsergroup()
        );

    }

    /**
     * @test
     */
    public function setUsergroupForUsergroupSetsUsergroup()
    {
        $usergroupFixture = new \CGB\Relax5core\Domain\Model\Usergroup();
        $this->subject->setUsergroup($usergroupFixture);

        self::assertAttributeEquals(
            $usergroupFixture,
            'usergroup',
            $this->subject
        );

    }
}
