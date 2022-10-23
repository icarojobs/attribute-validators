<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use Tiojobs\Domain\Entities\Person;
use Tiojobs\Domain\Action\ValidationErrorsVerifier;

$prince = new Person('William Arthur Philip Louis', 'asasd@asdas.com', '01234567890');
$errors = ValidationErrorsVerifier::handle($prince);

var_dump($errors);
