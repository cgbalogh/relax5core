<?php
namespace CGB\Relax5core\Controller;

/***
 *
 * This file is part of the "relax5core" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 Christoph Balogh <cb@lustige-informatik.at>
 *
 ***/

/**
 * SourceController
 */
class SourceController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * sourceRepository
     *
     * @var \CGB\Relax5core\Domain\Repository\SourceRepository
     * @inject
     */
    protected $sourceRepository = null;

    /**
     * sourcedetailRepository
     *
     * @var \CGB\Relax5core\Domain\Repository\SourcedetailRepository
     * @inject
     */
    protected $sourcedetailRepository = null;

    /**
     * action loadDetails
     *
     * @param \CGB\Relax5core\Domain\Model\Source $source
     * @param string $parent
     * @return void
     */
    public function loadDetailsAction(\CGB\Relax5core\Domain\Model\Source $source = null, $parent = '')
    {
        $this->view->assignMultiple([
            'sourcedetailSelect' => array_merge([0 => ''], $this->sourcedetailRepository->findBySource($source)->toArray()),
            'parent' => $parent
        ]);
    }

    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {

    }

    /**
     * action create
     *
     * @param \CGB\Relax5core\Domain\Model\Source $newSource
     * @return void
     */
    public function createAction(\CGB\Relax5core\Domain\Model\Source $newSource)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->sourceRepository->add($newSource);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \CGB\Relax5core\Domain\Model\Source $source
     * @ignorevalidation $source
     * @return void
     */
    public function editAction(\CGB\Relax5core\Domain\Model\Source $source)
    {
        $this->view->assign('source', $source);
    }

    /**
     * action update
     *
     * @param \CGB\Relax5core\Domain\Model\Source $source
     * @return void
     */
    public function updateAction(\CGB\Relax5core\Domain\Model\Source $source)
    {
        $this->sourceRepository->update($source);
        $result = \CGB\Relax5core\Service\DivService::objectToArray($source, '', "source_{$source->getUid()}_");
        $result['success'] = 'ok';
        return json_encode($result);
    }

    /**
     * action delete
     *
     * @param \CGB\Relax5core\Domain\Model\Source $source
     * @return void
     */
    public function deleteAction(\CGB\Relax5core\Domain\Model\Source $source)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->sourceRepository->remove($source);
        $this->redirect('list');
    }
}
