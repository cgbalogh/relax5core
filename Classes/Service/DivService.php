<?php
namespace CGB\Relax5core\Service;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2017 Christoph Balogh <cb@lustige-informatik.at>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can resedistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Various helper routines
 *
 * @version $Id:$
 * @license http://opensource.org/licenses/gpl-license.php GNU protected License, version 2
 */
class DivService implements \TYPO3\CMS\Core\SingletonInterface {
    
    /**
     * makeSelectFromTCA
     * 
     * This method makes a selectable array for the FE from the table and column name.
     * It takes the settings from TCA and converts it to an array that can be used in fluid forms.
     * Translation of string (if available) will be automatically selected.
     *  
     * @param string $table
     * @param string $column
     * @param string $ext
     * @param int $filter
     * @return array
     */
    static function makeSelectFromTCA ($table = '', $column = '', $ext = 'relax5core', $filter = 0) {
        // fetch config from TCA of $table and $column
        
        $items = $GLOBALS['TCA'][$table]['columns'][$column]['config']['items'];

        // cycle the items and create a new array in the form select[value] => label.
        foreach($items as $item) {
            if (! $filter || ! $item[2] || ($item[2] == $filter) ) {
                $localized = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate($item[0], $ext);
                $select[$item[1]] = $localized ? $localized : $item[0];
            }
        }
        return $select;
    }
    

	/**
     * objectToArray
     * 
     * returns an array of the object poperties
     * 
     * @param string $poperties
     * @param mixed $obj
     * @param string $prefix
     * @return array
     */
    static function objectToArray ( $obj, $properties, $prefix = '' ) {
        $dateFormat = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_relax5core_general.date_format', 'relax5core');
        
        $result = array();
        if ($properties) {
            $properties = array_map('trim', explode(',', $properties));
        } else {
            $properties = array_keys(\TYPO3\CMS\Extbase\Reflection\ObjectAccess::getGettableProperties($obj));
        }
        if (is_object($obj)) {
            foreach($properties as $property) {
    			$getter = 'get' . ucwords($property);
    			if (method_exists($obj, $getter)) {
                    $value = $obj->{$getter}();
                    if (is_a( $value, 'DateTime')) {
                        $value = $value->format($dateFormat);
                    }
                    $result[$prefix . $property] = $value;;
                }
            }
        }
        return $result;
	}

    /**
     * 
     * @param mixed $object
     */
    static function load(&$object) {
        if ($object instanceof \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy) {
            $object = $object->_loadRealInstance();
        }
    }
    
    
    /**
     * 
     * @param \CGB\Relax5core\Domain\Model\Appointment $appointment
     * @param bool $delete
     * @return bool
     */
    static function syncWithExchange( \CGB\Relax5core\Domain\Model\Appointment $appointment, $delete = false ) 
    {
        $username = $appointment->getOwner() ? $appointment->getOwner()->getUsername() : '';
        if (class_exists('\\CGB\\Ews\\Service\\ExchangeConnectService') && ($exchangeConnector = \CGB\Ews\Service\ExchangeConnectService::getConnector($username))) {
            if ($appointment->getMsolid() && $delete) {
                // MSOLID is set and delete = true: try to delete appointment from exchange
                if ($result = $exchangeConnector->deleteAppointment($appointment->getExchangeDataArray())) {
                    $appointment->setMsolid('');
                }                
                
            } elseif ($appointment->getMsolid() && ! $delete) {
                if ($result = $exchangeConnector->updateAppointment($appointment->getExchangeDataArray())) {
                    // $appointment->setMsolid($exchangeConnector->getResponse()->ResponseMessages->CreateItemResponseMessage->Items->CalendarItem->ItemId->Id);
                }
                /**
                 * MSOLID is set and delete = false: try to update appointment in exchange
                 * case 1: appointment is found on exchange -> update
                 * case 2: appointment is not found on exchange ->
                 *      subcase 1: delete appointment in relax
                 *      subcase 2: remove MSOLID from appointment
                 *      subcase 3: create appointment in exchange (again?)
                 * 
                 */
                
            } elseif (! $appointment->getMsolid() && ! $delete) {
                // MSOLID is not set and delete = false: try to create in exchange
                if ($exchangeConnector->createAppointment($appointment->getExchangeDataArray())) {
                    $appointment->setMsolid($exchangeConnector->getResponse()->ResponseMessages->CreateItemResponseMessage->Items->CalendarItem->ItemId->Id);
                }
            } else {
                // no action at the moment
            }
        }
    }
    
}
