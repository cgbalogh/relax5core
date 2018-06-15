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
class ObjectAccessService implements \TYPO3\CMS\Core\SingletonInterface {
    
    
    /**
     * This pattern matches anything inside curly brackets not containing a backslash 
     */
    const PATTERN_OBJECT_ACCESSOR = '/\{([^\\}]*)\}/';
    
    /**
     * getObjectProperty 
     * 
     * @param array $data A storage array that contains a list of the referenced objects
     * @param string $propertyPath
     */
    static function getObjectProperty( $data, $propertyPath ) {
        $splitPropertyPath = explode('.', $propertyPath);

        // if the object accessor starts with 'has' we will check for a method hasAnything
        if (substr($lastElement = $splitPropertyPath[count($splitPropertyPath)-1], 0, 3) == 'has') {
            array_pop($splitPropertyPath);
            list ($hasMethod, $arg) = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(':', $lastElement);
            $object = self::getObjectProperty( $data, implode('.', $splitPropertyPath) );
            if (method_exists($object, $hasMethod)) {
                return $object->{$hasMethod}($arg);
            } else {
                return null;
            }
        }
        
        // first element of property path
        $objectReference = array_shift($splitPropertyPath);

        // get object from $data
        $object = $data[$objectReference];
        
        // propertyPath without object reference and property
        $propertyPath = implode('.', $splitPropertyPath);        

        if ($propertyPath) {
            // get property and return ist
            return \TYPO3\CMS\Extbase\Reflection\ObjectAccess::getPropertyPath($object, $propertyPath ); 
        } else {
            // no propertypath set. return object
            return $object;
        }
    }
        
    /**
     * setObjectProperty 
     * 
     * @param array $data A storage array that contains a list of the referenced objects
     * @param string $propertyPath
     * @param mixed $value
     */
    static function setObjectProperty( &$data, $propertyPath, $value ) {
        $splitPropertyPath = explode('.', $propertyPath);
        
        // first element of property path
        $objectReference = array_shift($splitPropertyPath);

        // last element of array
        $propertyReference = array_pop($splitPropertyPath);

        // get object from $data
        $object = $data[$objectReference];
        
        // propertyPath without object reference and property
        $propertyPathToObject = implode('.', $splitPropertyPath);

        if ($propertyPathToObject) {
            $objectToUpdate = \TYPO3\CMS\Extbase\Reflection\ObjectAccess::getPropertyPath($object, $propertyPathToObject ); 
            $dataElement = false;
        } else {
            $objectToUpdate = $object;
            $dataElement = true;
        }

        if (!is_object($objectToUpdate) && !is_array($objectToUpdate)) {
            $s = explode('.', $propertyPath);
            $e = $value;
            while ($index = array_pop($s)) {
                $value = $e;
                unset($e);
                $e[$index] = $value;
            }
            $data = array_merge_recursive($data, $e);
            // $data[$propertyPath] = $value;
            return true;
        } elseif (is_array($objectToUpdate)) {
            $s = explode('.', $propertyPath);
            $e = $value;
            while ($index = array_pop($s)) {
                $value = $e;
                unset($e);
                $e[$index] = $value;
            }
            $data = array_merge_recursive($data, $e);
            // $data[$propertyPath] = $value;
            return true;
        } elseif (! is_string($propertyReference)) {
            $data[$propertyPath] = $value;
            return true;
        } elseif (is_string($propertyReference)) {
            return \TYPO3\CMS\Extbase\Reflection\ObjectAccess::setProperty($objectToUpdate, $propertyReference, $value);
        } else {
            return false;
        }
    }
    
    /**
     * addObject
     * 
     * @param array $data A storage array that contains a list of the referenced objects
     * @param string $propertyPath
     * @param mixed $value
     */
    static function addObject( &$data, $propertyPath, $value ) {
        $splitPropertyPath = explode('.', $propertyPath);
        
        // first element of property path
        $objectReference = array_shift($splitPropertyPath);

        // last element of array
        $propertyReference = array_pop($splitPropertyPath);

        // get object from $data
        $object = $data[$objectReference];
        
        // propertyPath without object reference and property
        $propertyPathToObject = implode('.', $splitPropertyPath);

        if ($propertyPathToObject) {
            $objectToUpdate = \TYPO3\CMS\Extbase\Reflection\ObjectAccess::getPropertyPath($object, $propertyPathToObject ); 
        } else {
            $objectToUpdate = $object;
        }
        
        if (!is_object($objectToUpdate) && !is_array($objectToUpdate)) {
            return false;
        } else {
            // echo $objectToUpdate;
            $addObjectMethod = 'add' . ucfirst($propertyReference);
            $objectToUpdate->{$addObjectMethod}($value);
            return true;
        }
    }

    
}
