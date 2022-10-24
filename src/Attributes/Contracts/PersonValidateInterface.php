<?php

declare(strict_types=1);

namespace Tiojobs\Attributes\Contracts;

interface PersonValidateInterface
{
    public function validate(mixed $value): bool;
}
