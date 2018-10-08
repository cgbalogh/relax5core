<?php
namespace CGB\Relax5core\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Christoph Balogh <cb@lustige-informatik.at>
 */
class RelationTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5core\Domain\Model\Relation
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \CGB\Relax5core\Domain\Model\Relation();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getRelationIdReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getRelationId()
        );
    }

    /**
     * @test
     */
    public function setRelationIdForStringSetsRelationId()
    {
        $this->subject->setRelationId('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'relationId',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTypeReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getType()
        );
    }

    /**
     * @test
     */
    public function setTypeForIntSetsType()
    {
        $this->subject->setType(12);

        self::assertAttributeEquals(
            12,
            'type',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDirectionReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getDirection()
        );
    }

    /**
     * @test
     */
    public function setDirectionForIntSetsDirection()
    {
        $this->subject->setDirection(12);

        self::assertAttributeEquals(
            12,
            'direction',
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
    public function getPrintReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getPrint()
        );
    }

    /**
     * @test
     */
    public function setPrintForBoolSetsPrint()
    {
        $this->subject->setPrint(true);

        self::assertAttributeEquals(
            true,
            'print',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getShareReturnsInitialValueForFloat()
    {
        self::assertSame(
            0.0,
            $this->subject->getShare()
        );
    }

    /**
     * @test
     */
    public function setShareForFloatSetsShare()
    {
        $this->subject->setShare(3.14159265);

        self::assertAttributeEquals(
            3.14159265,
            'share',
            $this->subject,
            '',
            0.000000001
        );
    }

    /**
     * @test
     */
    public function getTargetPersonReturnsInitialValueForPerson()
    {
        self::assertEquals(
            null,
            $this->subject->getTargetPerson()
        );
    }

    /**
     * @test
     */
    public function setTargetPersonForPersonSetsTargetPerson()
    {
        $targetPersonFixture = new \CGB\Relax5core\Domain\Model\Person();
        $this->subject->setTargetPerson($targetPersonFixture);

        self::assertAttributeEquals(
            $targetPersonFixture,
            'targetPerson',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTargetCompanyReturnsInitialValueForCompany()
    {
        self::assertEquals(
            null,
            $this->subject->getTargetCompany()
        );
    }

    /**
     * @test
     */
    public function setTargetCompanyForCompanySetsTargetCompany()
    {
        $targetCompanyFixture = new \CGB\Relax5core\Domain\Model\Company();
        $this->subject->setTargetCompany($targetCompanyFixture);

        self::assertAttributeEquals(
            $targetCompanyFixture,
            'targetCompany',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getXLinkReturnsInitialValueForRelation()
    {
        self::assertEquals(
            null,
            $this->subject->getXLink()
        );
    }

    /**
     * @test
     */
    public function setXLinkForRelationSetsXLink()
    {
        $xLinkFixture = new \CGB\Relax5core\Domain\Model\Relation();
        $this->subject->setXLink($xLinkFixture);

        self::assertAttributeEquals(
            $xLinkFixture,
            'xLink',
            $this->subject
        );
    }
}
