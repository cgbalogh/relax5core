<?php
namespace CGB\Relax5core\ViewHelpers;

/***************************************************************
*  Copyright notice
*
*  (c) 2011 Christoph Balogh <cb@lustige-informatik.at>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General protected License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General protected License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General protected License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * Viewhelper
 *
 * @version $Id:$
 * @license http://opensource.org/licenses/gpl-license.php GNU protected License, version 2
 */
class WrapViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {
    
    /**
    * WrapViewHelper
    * 
	* @param string $contact
	* @param string $wrap
	* @return string
    * 
    * This viewhelper takes two parameters <contact> and <wrap>
    * wrap will work much like stdWrap in typo3 and wraps the elemnts <openTag> | <closeTag> around
    * content. Additionally a third option will be used to parse the first part of the wrap
    * and replaces {content} (litterally) with the value of $content and then replace list items 
     * 
     * Example: <a href="pim:{content}"> | </a> | /\+43/=00,/\+/=000
     * {content} will be replaced by the valu eof $content
     * and the value will be searched for +43 replaced by 00 and
     * + replaced by 000. This is useful to generate individual URI protocols
     * 
     * Standard usage is also possible for email addresses and ordinary links
     * <a href="mailto:{content}> | </a>
     * <a href="http://{content}> | </a>
     * 
	*/
	public function render ($contact, $wrap) {
        $wrapElements = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode('|', $wrap, 1);
        $pattern = $wrapElements[2];
                
//      '/\+43/=00,/\+/=000';
        
        $wrapElements[0] = str_replace('{contact}', $contact, $wrapElements[0]);
        
        if ($pattern) {
            $patternList = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $pattern);
            $search = [];
            $replace = [];
            foreach($patternList as $onePattern) {
                $searchReplace = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode('=',$onePattern);
                $search[] = $searchReplace[0];
                $replace[] = $searchReplace[1];
            }
            $wrapElements[0] = preg_replace($search, $replace, $wrapElements[0]);
        }

		return $wrapElements[0] . $contact . $wrapElements[1];
	}

}
?>