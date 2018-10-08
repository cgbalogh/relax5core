<?php
namespace CGB\Relax5core\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Christoph Balogh <cb@lustige-informatik.at>
 */
class AppointmentControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5core\Controller\AppointmentController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\CGB\Relax5core\Controller\AppointmentController::class)
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
    public function listActionFetchesAllAppointmentsFromRepositoryAndAssignsThemToView()
    {

        $allAppointments = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $appointmentRepository = $this->getMockBuilder(\CGB\Relax5core\Domain\Repository\AppointmentRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $appointmentRepository->expects(self::once())->method('findAll')->will(self::returnValue($allAppointments));
        $this->inject($this->subject, 'appointmentRepository', $appointmentRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('appointments', $allAppointments);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenAppointmentToView()
    {
        $appointment = new \CGB\Relax5core\Domain\Model\Appointment();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('appointment', $appointment);

        $this->subject->showAction($appointment);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenAppointmentToAppointmentRepository()
    {
        $appointment = new \CGB\Relax5core\Domain\Model\Appointment();

        $appointmentRepository = $this->getMockBuilder(\CGB\Relax5core\Domain\Repository\AppointmentRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $appointmentRepository->expects(self::once())->method('add')->with($appointment);
        $this->inject($this->subject, 'appointmentRepository', $appointmentRepository);

        $this->subject->createAction($appointment);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenAppointmentToView()
    {
        $appointment = new \CGB\Relax5core\Domain\Model\Appointment();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('appointment', $appointment);

        $this->subject->editAction($appointment);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenAppointmentInAppointmentRepository()
    {
        $appointment = new \CGB\Relax5core\Domain\Model\Appointment();

        $appointmentRepository = $this->getMockBuilder(\CGB\Relax5core\Domain\Repository\AppointmentRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $appointmentRepository->expects(self::once())->method('update')->with($appointment);
        $this->inject($this->subject, 'appointmentRepository', $appointmentRepository);

        $this->subject->updateAction($appointment);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenAppointmentFromAppointmentRepository()
    {
        $appointment = new \CGB\Relax5core\Domain\Model\Appointment();

        $appointmentRepository = $this->getMockBuilder(\CGB\Relax5core\Domain\Repository\AppointmentRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $appointmentRepository->expects(self::once())->method('remove')->with($appointment);
        $this->inject($this->subject, 'appointmentRepository', $appointmentRepository);

        $this->subject->deleteAction($appointment);
    }
}
