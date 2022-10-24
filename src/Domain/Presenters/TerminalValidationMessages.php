<?php

declare(strict_types=1);

namespace Tiojobs\Domain\Presenters;

use Tiojobs\Domain\Entities\Person;

class TerminalValidationMessages
{
    public static function show(Person $person, array $errors): void
    {
        if (empty($errors)) {
            echo "No validation errors found on the object '" . (string) $person . "'." . PHP_EOL;
            return;
        }

        echo "The following errors were found:" . PHP_EOL;
        print_r($errors);
    }
}
