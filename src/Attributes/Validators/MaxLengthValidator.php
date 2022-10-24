<?php

declare(strict_types=1);

namespace Tiojobs\Attributes\Validators;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class MaxLengthValidator extends AbstractValidator
{
    public function __construct(
        public int $maxLength,
        public string $message = 'Valor é maior que o tamanho max permitido'
    ) {
    }

    public function validate(mixed $value): bool
    {
        return strlen($value) < $this->maxLength;
    }
}
