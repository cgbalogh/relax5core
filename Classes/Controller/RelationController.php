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
 * RelationController
 */
class RelationController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * relationRepository
     *
     * @var \CGB\Relax5core\Domain\Repository\RelationRepository
     * @inject
     */
    protected $relationRepository = null;

    /**
     * action edit
     *
     * @param \CGB\Relax5core\Domain\Model\Relation $relation
     * @ignorevalidation $relation
     * @return void
     */
    public function editAction(\CGB\Relax5core\Domain\Model\Relation $relation)
    {
        if ($relation->getPerson() && $relation->getTargetPerson()) {
            $filter = $relation->getTargetPerson()->getGender();
        }
        $this->view->assignMultiple([
            'typeSelect' => \CGB\Relax5core\Service\DivService::makeSelectFromTCA('tx_relax5core_domain_model_relation', 'type', 'relax5core', $filter),
            'relation' => $relation
        ]);
    }

    /**
     * action update
     *
     * @param \CGB\Relax5core\Domain\Model\Relation $relation
     * @return void
     */
    public function updateAction(\CGB\Relax5core\Domain\Model\Relation $relation)
    {
        $this->relationRepository->update($relation);
        if ($xLink = $relation->getXLink()) {
            \CGB\Relax5core\Service\DivService::load($xLink);
            // TODO: maybe thios should be made generic as well to be able to refine/redefine person relationbships
            $xLink->setType($relation->getType() * ($relation->getType() == 2 || $relation->getType() == 4 ? -1 : 1));
            $xLink->setDescription($relation->getDescription());
            $xLink->setPrint($relation->getPrint());
            $xLink->setShare($relation->getShare());
            $this->relationRepository->update($xLink);
        }
        $result = \CGB\Relax5core\Service\DivService::objectToArray($relation, 'type,description', "relation_{$relation->getUid()}_");
        $result['success'] = 'ok';
        return json_encode($result);
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $relations = $this->relationRepository->findAll();
        $this->view->assign('relations', $relations);
    }
}
