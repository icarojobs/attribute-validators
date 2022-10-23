<?php

declare(strict_types=1);

namespace Tiojobs\Validators;

abstract class AbstractValidator
{
    protected string $message = 'Error';

    abstract public function validate(mixed $value): bool;

    public function getMessage(): string
    {
        return $this->message;
    }
}
