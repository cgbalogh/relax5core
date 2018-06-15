<?php
namespace CGB\Relax5core\Service;

/***************************************************************
*  Copyright notice
*
*  (c) 2009 Jochen Rau <jochen.rau@typoplanet.de>
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
 * An email service
 *
 * @version $Id:$
 * @license http://opensource.org/licenses/gpl-license.php GNU protected License, version 2
 */

  class EmailService implements \TYPO3\CMS\Core\SingletonInterface {

    /**
    * @param array $recipient recipient of the email in the format array('recipient@domain.tld' => 'Recipient Name')
    * @param array $sender sender of the email in the format array('sender@domain.tld' => 'Sender Name')
    * @param string $subject subject of the email
    * @param string $templateName template name (UpperCamelCase)
    * @param array $variables variables to be passed to the Fluid view
    * @return boolean TRUE on success, otherwise false
    */
    public function sendTemplateEmail(array $recipient, array $sender, $subject, $templateName = 'Default', array $variables = array()) {
        /** @var \TYPO3\CMS\Fluid\View\StandaloneView $emailView */
        $this->objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\ObjectManager::class);
        $this->configurationManager = $this->objectManager->get(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::class);
        
        $emailView = $this->objectManager->get('TYPO3\\CMS\\Fluid\\View\\StandaloneView');

        $extbaseFrameworkConfiguration = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
        $extbaseFrameworkConfiguration = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK, 'relax5project');
        
        // $templateRootPath = \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($extbaseFrameworkConfiguration['view']['templateRootPaths']);
        
        $templateRootPath = \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($extbaseFrameworkConfiguration['view']['templateRootPaths'][0]);
        $layoutRootPath = \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($extbaseFrameworkConfiguration['view']['layoutRootPaths'][0]);
        $partialRootPath = \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($extbaseFrameworkConfiguration['view']['partialRootPaths'][0]);
        
        $emailView->setLayoutRootPaths([$layoutRootPaths]);
        $emailView->setPartialRootPaths([$partialRootPaths]);

        if (substr($templateName, 0, 8) === 'uploads/') {
            $templatePathAndFilename = PATH_site . $templateName . '.html';
            $templatePathAndFilenameHtml = PATH_site . $templateName . 'Html.html';
        } elseif (substr($templateName, 0, 10) === 'fileadmin/') {
            $templatePathAndFilename = PATH_site . $templateName . '.html';
            $templatePathAndFilenameHtml = PATH_site . $templateName . 'Html.html';
        } else {
            $templatePathAndFilename = $templateRootPath . 'Email/' . $templateName . '.html';
            $templatePathAndFilenameHtml = $templateRootPath . 'Email/' . $templateName . 'Html.html';
        }
        
        $emailView->setTemplatePathAndFilename($templatePathAndFilename);
        $emailView->assignMultiple($variables);
        $emailBody = $emailView->render();

        // if you have an additional html Template //
        $emailView->setTemplatePathAndFilename($templatePathAndFilenameHtml);
        $emailHtmlBody = $emailView->render();

        // if you want to use german or other UTF-8 chars in subject enable next line 
        // $subject =  '=?utf-8?B?'. base64_encode( subject  ) .'?=' ;

        /** @var $message \TYPO3\CMS\Core\Mail\MailMessage */
        $message = $this->objectManager->get('TYPO3\\CMS\\Core\\Mail\\MailMessage');
        $message->setTo($recipient)
            ->setFrom($sender)
            ->setSubject($subject);

        // Possible attachments here
        //foreach ($attachments as $attachment) {
        //	$message->attach(\Swift_Attachment::fromPath($attachment));
        //}

        // Plain text example
        $message->setBody($emailBody, 'text/plain');

        // HTML Email
        $message->addPart($emailHtmlBody, 'text/html');

        $message->send();
        return $message->isSent();
    }

}