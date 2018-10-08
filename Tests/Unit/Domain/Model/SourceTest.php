<?php
namespace CGB\Relax5core\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Christoph Balogh <cb@lustige-informatik.at>
 */
class SourceTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5core\Domain\Model\Source
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \CGB\Relax5core\Domain\Model\Source();
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
    public function getSourcedetailsReturnsInitialValueForSourcedetail()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getSourcedetails()
        );
    }

    /**
     * @test
     */
    public function setSourcedetailsForObjectStorageContainingSourcedetailSetsSourcedetails()
    {
        $sourcedetail = new \CGB\Relax5core\Domain\Model\Sourcedetail();
        $objectStorageHoldingExactlyOneSourcedetails = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneSourcedetails->attach($sourcedetail);
        $this->subject->setSourcedetails($objectStorageHoldingExactlyOneSourcedetails);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneSourcedetails,
            'sourcedetails',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addSourcedetailToObjectStorageHoldingSourcedetails()
    {
        $sourcedetail = new \CGB\Relax5core\Domain\Model\Sourcedetail();
        $sourcedetailsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $sourcedetailsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($sourcedetail));
        $this->inject($this->subject, 'sourcedetails', $sourcedetailsObjectStorageMock);

        $this->subject->addSourcedetail($sourcedetail);
    }

    /**
     * @test
     */
    public function removeSourcedetailFromObjectStorageHoldingSourcedetails()
    {
        $sourcedetail = new \CGB\Relax5core\Domain\Model\Sourcedetail();
        $sourcedetailsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $sourcedetailsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($sourcedetail));
        $this->inject($this->subject, 'sourcedetails', $sourcedetailsObjectStorageMock);

        $this->subject->removeSourcedetail($sourcedetail);
    }
}
