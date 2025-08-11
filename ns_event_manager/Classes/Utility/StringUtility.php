<?php
declare(strict_types=1);

namespace NITSAN\NsEventManager\Utility;

class GeneralUtility
{
      public static function camelCaseToLowerCaseUnderscored(string $input): string
    {
        $value = preg_replace('/(?<=\\w)([A-Z])/', '_\\1', $input) ?? '';
        return mb_strtolower($value, 'utf-8');
    }

}
