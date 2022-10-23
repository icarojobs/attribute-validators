<?php

declare(strict_types=1);

namespace Tiojobs\ValueObjects;

use Attribute;
use Tiojobs\Attributes\Validators\AbstractValidator;

#[Attribute]
class Cpf extends AbstractValidator
{
    public function __construct(
        public string $message = 'Invalid CPF!'
    ) {
    }

    public function validate(mixed $cpf): bool
    {
        // Check if all input digits was inserted correctly
        if (mb_strlen($cpf) != 11 || preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Do the CPF calculus to validate document
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
