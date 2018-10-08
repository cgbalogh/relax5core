<?php
namespace CGB\Relax5core\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Christoph Balogh <cb@lustige-informatik.at>
 */
class LinkControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5core\Controller\LinkController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\CGB\Relax5core\Controller\LinkController::class)
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
    public function createActionAddsTheGivenLinkToLinkRepository()
    {
        $link = new \CGB\Relax5core\Domain\Model\Link();

        $linkRepository = $this->getMockBuilder(\CGB\Relax5core\Domain\Repository\LinkRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $linkRepository->expects(self::once())->method('add')->with($link);
        $this->inject($this->subject, 'linkRepository', $linkRepository);

        $this->subject->createAction($link);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenLinkToView()
    {
        $link = new \CGB\Relax5core\Domain\Model\Link();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('link', $link);

        $this->subject->editAction($link);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenLinkInLinkRepository()
    {
        $link = new \CGB\Relax5core\Domain\Model\Link();

        $linkRepository = $this->getMockBuilder(\CGB\Relax5core\Domain\Repository\LinkRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $linkRepository->expects(self::once())->method('update')->with($link);
        $this->inject($this->subject, 'linkRepository', $linkRepository);

        $this->subject->updateAction($link);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenLinkFromLinkRepository()
    {
        $link = new \CGB\Relax5core\Domain\Model\Link();

        $linkRepository = $this->getMockBuilder(\CGB\Relax5core\Domain\Repository\LinkRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $linkRepository->expects(self::once())->method('remove')->with($link);
        $this->inject($this->subject, 'linkRepository', $linkRepository);

        $this->subject->deleteAction($link);
    }
}
