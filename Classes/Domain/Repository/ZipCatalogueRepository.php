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
 * The repository for ZipCatalogues
 */
class ZipCatalogueRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * 
     * @param array $condition
     * @param string $term
     */
    public function findByZip($condition = [], $term = '') {
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
            'zip' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
            'city' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
        ]);
        $result = $query->execute();

        foreach ($result as $zip) {
            $resultArray[] = array(
                'id' => $zip->getUid(),
                'label' => $zip->getZip() . ' ' . $zip->getCity(),
                'value' => $zip->getZip(),
                'city' => $zip->getCity(),
                'state' => $zip->getState(),
            );
        }
        return $resultArray;
    }

    /**
     * 
     * @param array $condition
     * @param string $term
     */
    public function findByCity($condition = [], $term = '') {
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
            'zip' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
            'city' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
        ]);
        $result = $query->execute();

        foreach ($result as $city) {
            $resultArray[] = array(
                'id' => $city->getUid(),
                'label' => $city->getZip() . ' ' . $city->getCity(),
                'value' => $city->getCity(),
                'zip' => $city->getZip(),
                'state' => $city->getState(),
            );
        }
        return $resultArray;
    }

    
}
