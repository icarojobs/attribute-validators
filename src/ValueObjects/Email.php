<?php

namespace Tiojobs\ValueObjects;

use Attribute;
use Tiojobs\Attributes\Validators\AbstractValidator;

#[Attribute]
class Email extends AbstractValidator
{
    public function __construct(
        public string $message = 'Invalid email!'
    ) {
    }

    public function validate(mixed $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
