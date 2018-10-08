<?php
namespace CGB\Relax5core\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Christoph Balogh <cb@lustige-informatik.at>
 */
class OwnerControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5core\Controller\OwnerController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\CGB\Relax5core\Controller\OwnerController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenOwnerToView()
    {
        $owner = new \CGB\Relax5core\Domain\Model\Owner();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('owner', $owner);

        $this->subject->editAction($owner);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenOwnerInOwnerRepository()
    {
        $owner = new \CGB\Relax5core\Domain\Model\Owner();

        $ownerRepository = $this->getMockBuilder(\CGB\Relax5core\Domain\Repository\OwnerRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $ownerRepository->expects(self::once())->method('update')->with($owner);
        $this->inject($this->subject, 'ownerRepository', $ownerRepository);

        $this->subject->updateAction($owner);
    }
}
