<?php

namespace Tiojobs\Attributes\Validators;

use Attribute;
use Tiojobs\Attributes\Validators\AbstractValidator;

#[Attribute(Attribute::TARGET_PROPERTY)]
class EmailValidator extends AbstractValidator
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
