<?php
defined('TYPO3_MODE') || die();

/**
 * adjust select values for scope
 */
$GLOBALS['TCA']['tx_relax5core_domain_model_type']['columns']['scope']['config']['items'] = array(
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_type.scope.1', 1),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_type.scope.2', 2),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_type.scope.3', 3),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_type.scope.4', 4),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_type.scope.5', 5),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_type.scope.6', 6),
);

/**
 * adjust select values for eval
 */
$GLOBALS['TCA']['tx_relax5core_domain_model_type']['columns']['eval']['config']['items'] = array(
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_type.eval.1', 1),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_type.eval.2', 2),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_type.eval.3', 3),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_type.eval.4', 4),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_type.eval.5', 5),
);
