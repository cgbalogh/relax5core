<?php
namespace CGB\Relax5core\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Christoph Balogh <cb@lustige-informatik.at>
 */
class PersonControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5core\Controller\PersonController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\CGB\Relax5core\Controller\PersonController::class)
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
    public function listActionFetchesAllPersonsFromRepositoryAndAssignsThemToView()
    {

        $allPersons = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $personRepository = $this->getMockBuilder(\CGB\Relax5core\Domain\Repository\PersonRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $personRepository->expects(self::once())->method('findAll')->will(self::returnValue($allPersons));
        $this->inject($this->subject, 'personRepository', $personRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('persons', $allPersons);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenPersonToView()
    {
        $person = new \CGB\Relax5core\Domain\Model\Person();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('person', $person);

        $this->subject->showAction($person);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenPersonToPersonRepository()
    {
        $person = new \CGB\Relax5core\Domain\Model\Person();

        $personRepository = $this->getMockBuilder(\CGB\Relax5core\Domain\Repository\PersonRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $personRepository->expects(self::once())->method('add')->with($person);
        $this->inject($this->subject, 'personRepository', $personRepository);

        $this->subject->createAction($person);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenPersonToView()
    {
        $person = new \CGB\Relax5core\Domain\Model\Person();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('person', $person);

        $this->subject->editAction($person);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenPersonInPersonRepository()
    {
        $person = new \CGB\Relax5core\Domain\Model\Person();

        $personRepository = $this->getMockBuilder(\CGB\Relax5core\Domain\Repository\PersonRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $personRepository->expects(self::once())->method('update')->with($person);
        $this->inject($this->subject, 'personRepository', $personRepository);

        $this->subject->updateAction($person);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenPersonFromPersonRepository()
    {
        $person = new \CGB\Relax5core\Domain\Model\Person();

        $personRepository = $this->getMockBuilder(\CGB\Relax5core\Domain\Repository\PersonRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $personRepository->expects(self::once())->method('remove')->with($person);
        $this->inject($this->subject, 'personRepository', $personRepository);

        $this->subject->deleteAction($person);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenPersonToPersonRepository()
    {
        $person = new \CGB\Relax5core\Domain\Model\Person();

        $personRepository = $this->getMockBuilder(\CGB\Relax5core\Domain\Repository\PersonRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $personRepository->expects(self::once())->method('add')->with($person);
        $this->inject($this->subject, 'personRepository', $personRepository);

        $this->subject->createAction($person);
    }
}
