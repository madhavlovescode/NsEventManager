<?php

declare(strict_types=1);

namespace NITSAN\NsEventManager\EventListener;

use TYPO3\CMS\Core\Attribute\AsEventListener;
use TYPO3\CMS\Core\Package\Event\AfterPackageActivationEvent;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;

final class LoggerEventListener
{
    public function __invoke(AfterPackageActivationEvent $event)
    {
    
        if ($event->getPackageKey() === 'ns_event_manager') {
            $this->writeSysLog(sprintf('The extension "%s" was activated.', $event->getPackageKey()));
        }
    }

    private function writeSysLog(string $logMessage): void

    {

        $connection = GeneralUtility::makeInstance(ConnectionPool::class)

            ->getConnectionForTable('sys_log');


        $userId = 0;

        if (isset($GLOBALS['BE_USER']) && is_object($GLOBALS['BE_USER'])) {

            $userId = (int)($GLOBALS['BE_USER']->user['uid'] ?? 0);

        }
        $connection->insert('sys_log', [

            'userid' => $userId,

            'type' => 1,

            'action' => 0,

            'error' => 0,

            'details' => $logMessage,

            'log_data' => json_encode([]),

            'IP' => $_SERVER['REMOTE_ADDR'] ?? '',

            'tstamp' => time(),

            'workspace' => 0,

        ]);

    }

}