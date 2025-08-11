<?php

declare(strict_types=1);

namespace NITSAN\NsEventManager\ViewHelpers;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

final class ReverseStringViewHelper extends AbstractViewHelper
{

    public function initializeArguments(): void
    {
        // registerArgument($name, $type, $description, $required, $defaultValue, $escape)
        $this->registerArgument(
            'text',
            'string',
            'reverse the string and show',
            true,
        );

    }

    public function render(): string
    {
        $strtorev = $this->arguments['text'];
        return strrev($strtorev);

    }
}
