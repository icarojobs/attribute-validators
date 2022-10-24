<?php

declare(strict_types=1);

namespace Tiojobs\Attributes\Validators;

use Tiojobs\Attributes\Contracts\PersonValidateInterface;

abstract class AbstractValidator implements PersonValidateInterface
{
    protected string $message = 'Validation error';

    public function getMessage(): string
    {
        return $this->message;
    }
}
