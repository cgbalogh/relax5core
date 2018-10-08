<?php
namespace CGB\Relax5core\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Christoph Balogh <cb@lustige-informatik.at>
 */
class NameCatalogueTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5core\Domain\Model\NameCatalogue
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \CGB\Relax5core\Domain\Model\NameCatalogue();
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
    public function getGenderReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getGender()
        );
    }

    /**
     * @test
     */
    public function setGenderForIntSetsGender()
    {
        $this->subject->setGender(12);

        self::assertAttributeEquals(
            12,
            'gender',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getVerifiedReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getVerified()
        );
    }

    /**
     * @test
     */
    public function setVerifiedForBoolSetsVerified()
    {
        $this->subject->setVerified(true);

        self::assertAttributeEquals(
            true,
            'verified',
            $this->subject
        );
    }
}
