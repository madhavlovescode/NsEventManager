<?php

use NITSAN\NsEventManager\Controller\EventController;

return [
    'nseventmanager' => [
        'path' => '/NITSAN\NsEventManager\Controller\EventController',
        'target' => EventController::class . '::ListAction',
    ],
];