<?php

declare(strict_types=1);

namespace Tiojobs\Attributes\Validators;

use Attribute;
use Tiojobs\Attributes\Validators\AbstractValidator;

#[Attribute(Attribute::TARGET_PROPERTY)]
class CpfValidator extends AbstractValidator
{
    public function __construct(
        public string $message = 'Invalid CPF!'
    ) {
    }

    public function validate(mixed $cpf): bool
    {
        if (mb_strlen($cpf) != 11 || preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        return $this->isValidDocumentCalculus($cpf) === true;
    }

    private function isValidDocumentCalculus(mixed $cpf): bool
    {
        for ($t = 9; $t < 11; $t++) {
            $totalDigits = 0;

            for ($c = 0; $c < $t; $c++) {
                $totalDigits += $cpf[$c] * (($t + 1) - $c);
            }

            $result = ((10 * $totalDigits) % 11) % 10;

            if ($cpf[$c] != $result) {
                return false;
            }
        }

        return true;
    }
}
