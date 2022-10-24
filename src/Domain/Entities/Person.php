<?php

declare(strict_types=1);

namespace Tiojobs\Domain\Entities;

use Tiojobs\Attributes\Validators\CpfValidator;
use Tiojobs\Attributes\Validators\EmailValidator;
use Tiojobs\Attributes\Validators\MaxLengthValidator;

class Person
{
    public function __construct(
        #[MaxLengthValidator(30, 'The name length is greater than 30!')]
        public string $name,

        #[EmailValidator]
        public string $email,

        #[CpfValidator]
        public string $cpf
    ) {
    }

    public function __toString(): string
    {
        return self::class;
    }
}
