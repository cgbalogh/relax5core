<?php
namespace CGB\Relax5core\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Christoph Balogh <cb@lustige-informatik.at>
 */
class AppointmentTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5core\Domain\Model\Appointment
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \CGB\Relax5core\Domain\Model\Appointment();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getDateReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getDate()
        );
    }

    /**
     * @test
     */
    public function setDateForDateTimeSetsDate()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setDate($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'date',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getSubjectReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getSubject()
        );
    }

    /**
     * @test
     */
    public function setSubjectForStringSetsSubject()
    {
        $this->subject->setSubject('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'subject',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDurationReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getDuration()
        );
    }

    /**
     * @test
     */
    public function setDurationForIntSetsDuration()
    {
        $this->subject->setDuration(12);

        self::assertAttributeEquals(
            12,
            'duration',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDetailsReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDetails()
        );
    }

    /**
     * @test
     */
    public function setDetailsForStringSetsDetails()
    {
        $this->subject->setDetails('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'details',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAppointmentTypeReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getAppointmentType()
        );
    }

    /**
     * @test
     */
    public function setAppointmentTypeForIntSetsAppointmentType()
    {
        $this->subject->setAppointmentType(12);

        self::assertAttributeEquals(
            12,
            'appointmentType',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAppointmentStatusReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getAppointmentStatus()
        );
    }

    /**
     * @test
     */
    public function setAppointmentStatusForIntSetsAppointmentStatus()
    {
        $this->subject->setAppointmentStatus(12);

        self::assertAttributeEquals(
            12,
            'appointmentStatus',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPriorityReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getPriority()
        );
    }

    /**
     * @test
     */
    public function setPriorityForIntSetsPriority()
    {
        $this->subject->setPriority(12);

        self::assertAttributeEquals(
            12,
            'priority',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getMsolidReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMsolid()
        );
    }

    /**
     * @test
     */
    public function setMsolidForStringSetsMsolid()
    {
        $this->subject->setMsolid('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'msolid',
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
    public function getAddressReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getAddress()
        );
    }

    /**
     * @test
     */
    public function setAddressForStringSetsAddress()
    {
        $this->subject->setAddress('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'address',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getContactReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getContact()
        );
    }

    /**
     * @test
     */
    public function setContactForStringSetsContact()
    {
        $this->subject->setContact('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'contact',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getResultReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getResult()
        );
    }

    /**
     * @test
     */
    public function setResultForIntSetsResult()
    {
        $this->subject->setResult(12);

        self::assertAttributeEquals(
            12,
            'result',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getResultTextReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getResultText()
        );
    }

    /**
     * @test
     */
    public function setResultTextForStringSetsResultText()
    {
        $this->subject->setResultText('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'resultText',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getNextActionReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getNextAction()
        );
    }

    /**
     * @test
     */
    public function setNextActionForIntSetsNextAction()
    {
        $this->subject->setNextAction(12);

        self::assertAttributeEquals(
            12,
            'nextAction',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getNextActionTextReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getNextActionText()
        );
    }

    /**
     * @test
     */
    public function setNextActionTextForStringSetsNextActionText()
    {
        $this->subject->setNextActionText('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'nextActionText',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getContactStateReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getContactState()
        );
    }

    /**
     * @test
     */
    public function setContactStateForIntSetsContactState()
    {
        $this->subject->setContactState(12);

        self::assertAttributeEquals(
            12,
            'contactState',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTaskReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getTask()
        );
    }

    /**
     * @test
     */
    public function setTaskForIntSetsTask()
    {
        $this->subject->setTask(12);

        self::assertAttributeEquals(
            12,
            'task',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPostponedCounterReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getPostponedCounter()
        );
    }

    /**
     * @test
     */
    public function setPostponedCounterForIntSetsPostponedCounter()
    {
        $this->subject->setPostponedCounter(12);

        self::assertAttributeEquals(
            12,
            'postponedCounter',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getSubjectOrigReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getSubjectOrig()
        );
    }

    /**
     * @test
     */
    public function setSubjectOrigForStringSetsSubjectOrig()
    {
        $this->subject->setSubjectOrig('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'subjectOrig',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDoneReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getDone()
        );
    }

    /**
     * @test
     */
    public function setDoneForDateTimeSetsDone()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setDone($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'done',
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
    public function getCreatorReturnsInitialValueForOwner()
    {
        self::assertEquals(
            null,
            $this->subject->getCreator()
        );
    }

    /**
     * @test
     */
    public function setCreatorForOwnerSetsCreator()
    {
        $creatorFixture = new \CGB\Relax5core\Domain\Model\Owner();
        $this->subject->setCreator($creatorFixture);

        self::assertAttributeEquals(
            $creatorFixture,
            'creator',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAttendeesReturnsInitialValueForOwner()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getAttendees()
        );
    }

    /**
     * @test
     */
    public function setAttendeesForObjectStorageContainingOwnerSetsAttendees()
    {
        $attendee = new \CGB\Relax5core\Domain\Model\Owner();
        $objectStorageHoldingExactlyOneAttendees = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneAttendees->attach($attendee);
        $this->subject->setAttendees($objectStorageHoldingExactlyOneAttendees);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneAttendees,
            'attendees',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addAttendeeToObjectStorageHoldingAttendees()
    {
        $attendee = new \CGB\Relax5core\Domain\Model\Owner();
        $attendeesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $attendeesObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($attendee));
        $this->inject($this->subject, 'attendees', $attendeesObjectStorageMock);

        $this->subject->addAttendee($attendee);
    }

    /**
     * @test
     */
    public function removeAttendeeFromObjectStorageHoldingAttendees()
    {
        $attendee = new \CGB\Relax5core\Domain\Model\Owner();
        $attendeesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $attendeesObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($attendee));
        $this->inject($this->subject, 'attendees', $attendeesObjectStorageMock);

        $this->subject->removeAttendee($attendee);
    }
}
