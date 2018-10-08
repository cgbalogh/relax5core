<?php
namespace CGB\Relax5core\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Christoph Balogh <cb@lustige-informatik.at>
 */
class OwnerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5core\Domain\Model\Owner
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \CGB\Relax5core\Domain\Model\Owner();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getPwdChangeDateReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getPwdChangeDate()
        );
    }

    /**
     * @test
     */
    public function setPwdChangeDateForDateTimeSetsPwdChangeDate()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setPwdChangeDate($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'pwdChangeDate',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getSettingsReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getSettings()
        );
    }

    /**
     * @test
     */
    public function setSettingsForStringSetsSettings()
    {
        $this->subject->setSettings('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'settings',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getVoidReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getVoid()
        );
    }

    /**
     * @test
     */
    public function setVoidForBoolSetsVoid()
    {
        $this->subject->setVoid(true);

        self::assertAttributeEquals(
            true,
            'void',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPositionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPosition()
        );
    }

    /**
     * @test
     */
    public function setPositionForStringSetsPosition()
    {
        $this->subject->setPosition('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'position',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTeamReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTeam()
        );
    }

    /**
     * @test
     */
    public function setTeamForStringSetsTeam()
    {
        $this->subject->setTeam('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'team',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPoolReturnsInitialValueForOwner()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getPool()
        );
    }

    /**
     * @test
     */
    public function setPoolForObjectStorageContainingOwnerSetsPool()
    {
        $pool = new \CGB\Relax5core\Domain\Model\Owner();
        $objectStorageHoldingExactlyOnePool = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOnePool->attach($pool);
        $this->subject->setPool($objectStorageHoldingExactlyOnePool);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOnePool,
            'pool',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addPoolToObjectStorageHoldingPool()
    {
        $pool = new \CGB\Relax5core\Domain\Model\Owner();
        $poolObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $poolObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($pool));
        $this->inject($this->subject, 'pool', $poolObjectStorageMock);

        $this->subject->addPool($pool);
    }

    /**
     * @test
     */
    public function removePoolFromObjectStorageHoldingPool()
    {
        $pool = new \CGB\Relax5core\Domain\Model\Owner();
        $poolObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $poolObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($pool));
        $this->inject($this->subject, 'pool', $poolObjectStorageMock);

        $this->subject->removePool($pool);
    }
}
