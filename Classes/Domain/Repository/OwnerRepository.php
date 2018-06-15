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
 * The repository for Owners
 */
class OwnerRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    protected $defaultOrderings = array(
        'username' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
    );    
    
    /**
     * 
     * @param mixed $usergroup
     */
    public function findByAnyUsergroup($usergroup) {
		$query = $this->createQuery();
        $query->matching($query->contains('usergroup', $usergroup));
        return $query->execute();
    }
    
    /**
     * 
     * @param mixed $usergroup
     * @param mixed $team
     */
    public function findByAnyUsergroupAndTeam($usergroup, $team) {
		$query = $this->createQuery();
        
        $constraints[] = $query->contains('usergroup', $usergroup);
        $constraints[] = $query->equals('team', $team);
        
        $query->matching(
            $query->logicalAnd($constraints)
        );
        return $query->execute();
    }

    /**
     * 
     * @param mixed $usergroup
     */
    public function findByAnyUsergroupNotVoid($usergroup) {
		$query = $this->createQuery();
        $query->matching($query->logicalAnd(
            $query->equals('void', 0),
            $query->contains('usergroup', $usergroup))
        );
        return $query->execute();
    }
}
