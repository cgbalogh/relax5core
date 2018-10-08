<?php
namespace CGB\Relax5core\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Christoph Balogh <cb@lustige-informatik.at>
 */
class ContactTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5core\Domain\Model\Contact
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \CGB\Relax5core\Domain\Model\Contact();
    }

    protected function tearDown()
    {
        parent::tearDown();
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
    public function getDenyReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDeny()
        );
    }

    /**
     * @test
     */
    public function setDenyForStringSetsDeny()
    {
        $this->subject->setDeny('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'deny',
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
    public function getPermissionsReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPermissions()
        );
    }

    /**
     * @test
     */
    public function setPermissionsForStringSetsPermissions()
    {
        $this->subject->setPermissions('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'permissions',
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
    public function getTypeReturnsInitialValueForType()
    {
        self::assertEquals(
            null,
            $this->subject->getType()
        );
    }

    /**
     * @test
     */
    public function setTypeForTypeSetsType()
    {
        $typeFixture = new \CGB\Relax5core\Domain\Model\Type();
        $this->subject->setType($typeFixture);

        self::assertAttributeEquals(
            $typeFixture,
            'type',
            $this->subject
        );
    }
}
