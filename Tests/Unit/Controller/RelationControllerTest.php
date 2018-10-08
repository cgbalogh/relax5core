<?php
namespace CGB\Relax5core\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Christoph Balogh <cb@lustige-informatik.at>
 */
class RelationControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5core\Controller\RelationController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\CGB\Relax5core\Controller\RelationController::class)
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
    public function listActionFetchesAllRelationsFromRepositoryAndAssignsThemToView()
    {

        $allRelations = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $relationRepository = $this->getMockBuilder(\CGB\Relax5core\Domain\Repository\RelationRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $relationRepository->expects(self::once())->method('findAll')->will(self::returnValue($allRelations));
        $this->inject($this->subject, 'relationRepository', $relationRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('relations', $allRelations);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenRelationToView()
    {
        $relation = new \CGB\Relax5core\Domain\Model\Relation();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('relation', $relation);

        $this->subject->editAction($relation);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenRelationInRelationRepository()
    {
        $relation = new \CGB\Relax5core\Domain\Model\Relation();

        $relationRepository = $this->getMockBuilder(\CGB\Relax5core\Domain\Repository\RelationRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $relationRepository->expects(self::once())->method('update')->with($relation);
        $this->inject($this->subject, 'relationRepository', $relationRepository);

        $this->subject->updateAction($relation);
    }
}
