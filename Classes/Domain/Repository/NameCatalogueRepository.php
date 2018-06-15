<?php
namespace CGB\Relax5core\Domain\Repository;

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
 * The repository for NameCatalogues
 */
class NameCatalogueRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * 
     * @param array $condition
     * @param string $term
     */
    public function findByName($condition = [], $term = '') {
        $query = $this->createQuery();
        $conditionList = [];
        
        foreach($condition as $singleCondition) {
            $value = $singleCondition['value'];
            if ($value == 'TERM') {
                $value = $term;
            }
            $conditionList[] = $query->{$singleCondition['operator']}($singleCondition['property'], $value .  ($singleCondition['operator'] == 'like' ? '%' : ''));
        }
        $query->matching(
            $query->logicalAnd($conditionList)
        );
        $query->setOrderings([
            'name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
        ]);
        $result = $query->execute();

        foreach ($result as $name) {
            $resultArray[] = array(
                'id' => $name->getUid(),
                'label' => $name->getName(),
                'value' => $name->getName(),
                'gender' => $name->getGender(),
            );
        }
        return $resultArray;
    
    }
}
    
