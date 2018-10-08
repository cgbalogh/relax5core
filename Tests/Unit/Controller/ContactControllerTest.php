<?php
namespace CGB\Relax5core\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Christoph Balogh <cb@lustige-informatik.at>
 */
class ContactControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5core\Controller\ContactController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\CGB\Relax5core\Controller\ContactController::class)
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
    public function createActionAddsTheGivenContactToContactRepository()
    {
        $contact = new \CGB\Relax5core\Domain\Model\Contact();

        $contactRepository = $this->getMockBuilder(\CGB\Relax5core\Domain\Repository\ContactRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $contactRepository->expects(self::once())->method('add')->with($contact);
        $this->inject($this->subject, 'contactRepository', $contactRepository);

        $this->subject->createAction($contact);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenContactToView()
    {
        $contact = new \CGB\Relax5core\Domain\Model\Contact();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('contact', $contact);

        $this->subject->editAction($contact);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenContactInContactRepository()
    {
        $contact = new \CGB\Relax5core\Domain\Model\Contact();

        $contactRepository = $this->getMockBuilder(\CGB\Relax5core\Domain\Repository\ContactRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $contactRepository->expects(self::once())->method('update')->with($contact);
        $this->inject($this->subject, 'contactRepository', $contactRepository);

        $this->subject->updateAction($contact);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenContactFromContactRepository()
    {
        $contact = new \CGB\Relax5core\Domain\Model\Contact();

        $contactRepository = $this->getMockBuilder(\CGB\Relax5core\Domain\Repository\ContactRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $contactRepository->expects(self::once())->method('remove')->with($contact);
        $this->inject($this->subject, 'contactRepository', $contactRepository);

        $this->subject->deleteAction($contact);
    }
}
