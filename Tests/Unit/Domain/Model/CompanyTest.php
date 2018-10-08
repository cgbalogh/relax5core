<?php
namespace CGB\Relax5core\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Christoph Balogh <cb@lustige-informatik.at>
 */
class CompanyTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5core\Domain\Model\Company
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \CGB\Relax5core\Domain\Model\Company();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameForStringSetsName()
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'name',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getShortNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getShortName()
        );
    }

    /**
     * @test
     */
    public function setShortNameForStringSetsShortName()
    {
        $this->subject->setShortName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'shortName',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getLegalFormReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getLegalForm()
        );
    }

    /**
     * @test
     */
    public function setLegalFormForIntSetsLegalForm()
    {
        $this->subject->setLegalForm(12);

        self::assertAttributeEquals(
            12,
            'legalForm',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getIndustryReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getIndustry()
        );
    }

    /**
     * @test
     */
    public function setIndustryForIntSetsIndustry()
    {
        $this->subject->setIndustry(12);

        self::assertAttributeEquals(
            12,
            'industry',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getEmployeesReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getEmployees()
        );
    }

    /**
     * @test
     */
    public function setEmployeesForIntSetsEmployees()
    {
        $this->subject->setEmployees(12);

        self::assertAttributeEquals(
            12,
            'employees',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getRegIdReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getRegId()
        );
    }

    /**
     * @test
     */
    public function setRegIdForStringSetsRegId()
    {
        $this->subject->setRegId('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'regId',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getRegAuthorityReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getRegAuthority()
        );
    }

    /**
     * @test
     */
    public function setRegAuthorityForStringSetsRegAuthority()
    {
        $this->subject->setRegAuthority('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'regAuthority',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getVatIdReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getVatId()
        );
    }

    /**
     * @test
     */
    public function setVatIdForStringSetsVatId()
    {
        $this->subject->setVatId('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'vatId',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCommentsReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getComments()
        );
    }

    /**
     * @test
     */
    public function setCommentsForStringSetsComments()
    {
        $this->subject->setComments('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'comments',
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
        self::assertSame(
            0,
            $this->subject->getPermissions()
        );
    }

    /**
     * @test
     */
    public function setPermissionsForIntSetsPermissions()
    {
        $this->subject->setPermissions(12);

        self::assertAttributeEquals(
            12,
            'permissions',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getStatusReturnsInitialValueForStatus()
    {
        self::assertEquals(
            null,
            $this->subject->getStatus()
        );
    }

    /**
     * @test
     */
    public function setStatusForStatusSetsStatus()
    {
        $statusFixture = new \CGB\Relax5core\Domain\Model\Status();
        $this->subject->setStatus($statusFixture);

        self::assertAttributeEquals(
            $statusFixture,
            'status',
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
    public function getUsergroupReturnsInitialValueForFrontendUserGroup()
    {
    }

    /**
     * @test
     */
    public function setUsergroupForFrontendUserGroupSetsUsergroup()
    {
    }

    /**
     * @test
     */
    public function getSourceReturnsInitialValueForSource()
    {
        self::assertEquals(
            null,
            $this->subject->getSource()
        );
    }

    /**
     * @test
     */
    public function setSourceForSourceSetsSource()
    {
        $sourceFixture = new \CGB\Relax5core\Domain\Model\Source();
        $this->subject->setSource($sourceFixture);

        self::assertAttributeEquals(
            $sourceFixture,
            'source',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getSourcedetailReturnsInitialValueForSourcedetail()
    {
        self::assertEquals(
            null,
            $this->subject->getSourcedetail()
        );
    }

    /**
     * @test
     */
    public function setSourcedetailForSourcedetailSetsSourcedetail()
    {
        $sourcedetailFixture = new \CGB\Relax5core\Domain\Model\Sourcedetail();
        $this->subject->setSourcedetail($sourcedetailFixture);

        self::assertAttributeEquals(
            $sourcedetailFixture,
            'sourcedetail',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getRelationsReturnsInitialValueForRelation()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getRelations()
        );
    }

    /**
     * @test
     */
    public function setRelationsForObjectStorageContainingRelationSetsRelations()
    {
        $relation = new \CGB\Relax5core\Domain\Model\Relation();
        $objectStorageHoldingExactlyOneRelations = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneRelations->attach($relation);
        $this->subject->setRelations($objectStorageHoldingExactlyOneRelations);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneRelations,
            'relations',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addRelationToObjectStorageHoldingRelations()
    {
        $relation = new \CGB\Relax5core\Domain\Model\Relation();
        $relationsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $relationsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($relation));
        $this->inject($this->subject, 'relations', $relationsObjectStorageMock);

        $this->subject->addRelation($relation);
    }

    /**
     * @test
     */
    public function removeRelationFromObjectStorageHoldingRelations()
    {
        $relation = new \CGB\Relax5core\Domain\Model\Relation();
        $relationsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $relationsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($relation));
        $this->inject($this->subject, 'relations', $relationsObjectStorageMock);

        $this->subject->removeRelation($relation);
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
    public function getDocumentsReturnsInitialValueForDocument()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getDocuments()
        );
    }

    /**
     * @test
     */
    public function setDocumentsForObjectStorageContainingDocumentSetsDocuments()
    {
        $document = new \CGB\Relax5core\Domain\Model\Document();
        $objectStorageHoldingExactlyOneDocuments = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneDocuments->attach($document);
        $this->subject->setDocuments($objectStorageHoldingExactlyOneDocuments);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneDocuments,
            'documents',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addDocumentToObjectStorageHoldingDocuments()
    {
        $document = new \CGB\Relax5core\Domain\Model\Document();
        $documentsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $documentsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($document));
        $this->inject($this->subject, 'documents', $documentsObjectStorageMock);

        $this->subject->addDocument($document);
    }

    /**
     * @test
     */
    public function removeDocumentFromObjectStorageHoldingDocuments()
    {
        $document = new \CGB\Relax5core\Domain\Model\Document();
        $documentsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $documentsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($document));
        $this->inject($this->subject, 'documents', $documentsObjectStorageMock);

        $this->subject->removeDocument($document);
    }

    /**
     * @test
     */
    public function getLinksReturnsInitialValueForLink()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getLinks()
        );
    }

    /**
     * @test
     */
    public function setLinksForObjectStorageContainingLinkSetsLinks()
    {
        $link = new \CGB\Relax5core\Domain\Model\Link();
        $objectStorageHoldingExactlyOneLinks = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneLinks->attach($link);
        $this->subject->setLinks($objectStorageHoldingExactlyOneLinks);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneLinks,
            'links',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addLinkToObjectStorageHoldingLinks()
    {
        $link = new \CGB\Relax5core\Domain\Model\Link();
        $linksObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $linksObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($link));
        $this->inject($this->subject, 'links', $linksObjectStorageMock);

        $this->subject->addLink($link);
    }

    /**
     * @test
     */
    public function removeLinkFromObjectStorageHoldingLinks()
    {
        $link = new \CGB\Relax5core\Domain\Model\Link();
        $linksObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $linksObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($link));
        $this->inject($this->subject, 'links', $linksObjectStorageMock);

        $this->subject->removeLink($link);
    }

    /**
     * @test
     */
    public function getAppointmentsReturnsInitialValueForAppointment()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getAppointments()
        );
    }

    /**
     * @test
     */
    public function setAppointmentsForObjectStorageContainingAppointmentSetsAppointments()
    {
        $appointment = new \CGB\Relax5core\Domain\Model\Appointment();
        $objectStorageHoldingExactlyOneAppointments = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneAppointments->attach($appointment);
        $this->subject->setAppointments($objectStorageHoldingExactlyOneAppointments);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneAppointments,
            'appointments',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addAppointmentToObjectStorageHoldingAppointments()
    {
        $appointment = new \CGB\Relax5core\Domain\Model\Appointment();
        $appointmentsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $appointmentsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($appointment));
        $this->inject($this->subject, 'appointments', $appointmentsObjectStorageMock);

        $this->subject->addAppointment($appointment);
    }

    /**
     * @test
     */
    public function removeAppointmentFromObjectStorageHoldingAppointments()
    {
        $appointment = new \CGB\Relax5core\Domain\Model\Appointment();
        $appointmentsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $appointmentsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($appointment));
        $this->inject($this->subject, 'appointments', $appointmentsObjectStorageMock);

        $this->subject->removeAppointment($appointment);
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
}
