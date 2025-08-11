<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

use TYPO3\CMS\Core\Schema\Struct\SelectItem;

defined('TYPO3') or die('Access denied.');

// Register Plugins
ExtensionUtility::registerPlugin(
    'NsEventManager',
    'Nseventcrud',
    'Event CRUD'
);

ExtensionUtility::registerPlugin(
    'NsEventManager',
    'Eventshow',
    'Event Show'
);

// Generate plugin signatures
$pluginSignatureCrud = 'nseventmanager_nseventcrud';
$pluginSignatureShow = 'nseventmanager_eventshow';

// Add FlexForm for Event CRUD
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignatureCrud] = 'pi_flexform';
ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignatureCrud,
    'FILE:EXT:ns_event_manager/Configuration/FlexForms/flexform.xml'
);

// Add FlexForm for Event Show
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignatureShow] = 'pi_flexform';
ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignatureShow,
    'FILE:EXT:ns_event_manager/Configuration/FlexForms/flexformShow.xml'
);
