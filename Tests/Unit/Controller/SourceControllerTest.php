<?php
namespace CGB\Relax5core\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Christoph Balogh <cb@lustige-informatik.at>
 */
class SourceControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5core\Controller\SourceController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\CGB\Relax5core\Controller\SourceController::class)
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
    public function createActionAddsTheGivenSourceToSourceRepository()
    {
        $source = new \CGB\Relax5core\Domain\Model\Source();

        $sourceRepository = $this->getMockBuilder(\CGB\Relax5core\Domain\Repository\SourceRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $sourceRepository->expects(self::once())->method('add')->with($source);
        $this->inject($this->subject, 'sourceRepository', $sourceRepository);

        $this->subject->createAction($source);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenSourceToView()
    {
        $source = new \CGB\Relax5core\Domain\Model\Source();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('source', $source);

        $this->subject->editAction($source);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenSourceInSourceRepository()
    {
        $source = new \CGB\Relax5core\Domain\Model\Source();

        $sourceRepository = $this->getMockBuilder(\CGB\Relax5core\Domain\Repository\SourceRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $sourceRepository->expects(self::once())->method('update')->with($source);
        $this->inject($this->subject, 'sourceRepository', $sourceRepository);

        $this->subject->updateAction($source);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenSourceFromSourceRepository()
    {
        $source = new \CGB\Relax5core\Domain\Model\Source();

        $sourceRepository = $this->getMockBuilder(\CGB\Relax5core\Domain\Repository\SourceRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $sourceRepository->expects(self::once())->method('remove')->with($source);
        $this->inject($this->subject, 'sourceRepository', $sourceRepository);

        $this->subject->deleteAction($source);
    }
}
