<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use Tiojobs\Domain\Entities\Person;
use Tiojobs\Domain\Action\ValidationErrorsVerifier;
use Tiojobs\Domain\Presenters\TerminalValidationMessages;

$person = new Person('William Arthur Philip Louis', 'asasda@asdas.com', '01234567890');
$errors = ValidationErrorsVerifier::handle($person);

TerminalValidationMessages::show($person, $errors);
