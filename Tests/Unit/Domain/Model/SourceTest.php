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
    public function dummyTestToNotLeaveThisFileEmpty()
    {
        self::markTestIncomplete();
    }
}
