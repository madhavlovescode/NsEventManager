<?php

declare(strict_types=1);

namespace NITSAN\NsEventManager\EventListener;

use NITSAN\NsEventManager\Domain\Model\Course;

use Psr\Log\LoggerInterface;


final class EventCreate
{
    public function __construct(
        public readonly event $event
    ) {}

    public function geteevent(): event
    {
        return $this->event;
    }
}