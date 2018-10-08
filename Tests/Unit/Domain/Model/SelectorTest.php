<?php
namespace CGB\Relax5core\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Christoph Balogh <cb@lustige-informatik.at>
 */
class SelectorTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5core\Domain\Model\Selector
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \CGB\Relax5core\Domain\Model\Selector();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getSelectorReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getSelector()
        );
    }

    /**
     * @test
     */
    public function setSelectorForStringSetsSelector()
    {
        $this->subject->setSelector('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'selector',
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
}
