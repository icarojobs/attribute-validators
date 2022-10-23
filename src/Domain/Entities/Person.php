<?php

declare(strict_types=1);

namespace Tiojobs\Domain\Entities;

use Tiojobs\ValueObjects\Cpf;
use Tiojobs\ValueObjects\Email;
use Tiojobs\Attributes\Validators\MaxLength;

class Person
{
    public function __construct(
        #[MaxLength(30, 'The name length is greater than 30!')]
        public string $name,
        #[Email]
        public string $email,
        #[Cpf]
        public string $cpf
    ) {
    }
}
