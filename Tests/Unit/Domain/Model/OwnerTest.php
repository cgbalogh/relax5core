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
}
