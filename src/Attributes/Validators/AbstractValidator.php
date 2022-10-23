<?php

declare(strict_types=1);

namespace Tiojobs\Attributes\Validators;

abstract class AbstractValidator
{
    protected string $message = 'Validation error';

    abstract public function validate(mixed $value): bool;

    public function getMessage(): string
    {
        return $this->message;
    }
}
