<?php
if (!isset($GLOBALS['TCA']['sys_template'])) {
    file_put_contents('/tmp/tca-debug.log', "sys_template not set\n", FILE_APPEND);
}

defined('TYPO3') or die;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'ns_event_manager',
    'Configuration/TypoScript',
    'EventCrud'
);
