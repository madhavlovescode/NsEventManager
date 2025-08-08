<?php
use nitsan\NsEventManager\Controller\EventController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;


defined(constant_name: 'TYPO3') or die;

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'NsEventManager',
        'Nseventcrud',
        [
            \NITSAN\NsEventManager\Controller\EventController::class => 'list, new, create, edit, update, delete'
        ],
        // non-cacheable actions
        [
            \NITSAN\NsEventManager\Controller\EventController::class => 'create, update, delete'
        ],
        null
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'NsEventManager',
        'Eventshow',
        [
            \NITSAN\NsEventManager\Controller\EventController::class => 'show'
        ],
        // non-cacheable actions
        [
            \NITSAN\NsEventManager\Controller\EventController::class => 'show'
        ],
        null
    );

   
})();
