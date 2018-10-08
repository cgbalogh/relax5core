<?php
namespace CGB\Relax5core\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Christoph Balogh <cb@lustige-informatik.at>
 */
class TypeTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5core\Domain\Model\Type
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \CGB\Relax5core\Domain\Model\Type();
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
    public function getScopeReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getScope()
        );
    }

    /**
     * @test
     */
    public function setScopeForIntSetsScope()
    {
        $this->subject->setScope(12);

        self::assertAttributeEquals(
            12,
            'scope',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getEvalReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getEval()
        );
    }

    /**
     * @test
     */
    public function setEvalForIntSetsEval()
    {
        $this->subject->setEval(12);

        self::assertAttributeEquals(
            12,
            'eval',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getImageReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getImage()
        );
    }

    /**
     * @test
     */
    public function setImageForFileReferenceSetsImage()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setImage($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'image',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getWrapReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getWrap()
        );
    }

    /**
     * @test
     */
    public function setWrapForStringSetsWrap()
    {
        $this->subject->setWrap('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'wrap',
            $this->subject
        );
    }
}
