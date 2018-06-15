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
 * The repository for AddressCatalogues
 */
class AddressCatalogueRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    
    /**
     * 
     * @param array $condition
     * @param string $term
     */
    public function findByCountryAndZip($condition = [], $term = '') {
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
            'address' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
        ]);
        $result = $query->execute();
        foreach ($result as $address) {
            $resultArray[] = [
                'id' => $address->getUid(),
                'label' => $address->getAddress(),
                'value' => $address->getAddress(),
            ];
        }
        return $resultArray;
    }
}
