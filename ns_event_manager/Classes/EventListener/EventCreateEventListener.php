<?php

declare(strict_types=1);

namespace NITSAN\NsEventManager\EventListener;

use TYPO3\CMS\Core\Attribute\AsEventListener;
use Psr\Log\LoggerInterface;

#[AsEventListener(
    identifier: 'ns_Event_manager/Event-created-listener'
)]
final class EventCreateEventListener
{
    public function __construct(
        private readonly LoggerInterface $logger
    ) {}

    public function __invoke(EventCreate $event): void
    {
        $event = $event->geteevent();
        $this->logger->info('event created: ' . $event->getTitle(), [
            'uid' => $event->getUid(),
        ]);
    }
}