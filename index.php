<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use Tiojobs\Validators\AbstractValidator;


#[Attribute]
class MaxLength extends AbstractValidator
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

#[Attribute]
class Email extends AbstractValidator
{

    public function __construct(
        public string $message = 'Email inválido !'
    ) {
    }

    public function validate(mixed $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}

#[Attribute]
class Cpf extends AbstractValidator
{

    public function __construct(
        public string $message = 'CPF inválido !'
    ) {
    }

    /**
     * @author Rafael Neri
     * @source: https://gist.github.com/rafael-neri/ab3e58803a08cb4def059fce4e3c0e40?permalink_comment_id=3343687#gistcomment-3343687
     */
    public function validate(mixed $cpf): bool
    {

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11 || preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }
}


class Person
{
    public function __construct(
        #[MaxLength(30, 'Max name length is 30!')]
        public string $name,
        #[Email]
        public string $email,
        #[Cpf]
        public string $cpf
    ) {
    }
}


// Example of usaage
$p1 = new Person('sdfghjklpoiuytredfgiookmnugthhhwww', 'asasd@@asdas.com', '93204397025');

//validate
$reflectionObject = new ReflectionObject($p1);

foreach ($reflectionObject->getProperties() as $property) {

    $property->setAccessible(true);
    $value = $property->getValue($p1);
    $attributes = $property->getAttributes(AbstractValidator::class, \ReflectionAttribute::IS_INSTANCEOF);

    foreach ($attributes as $attribute) {
        $attributeInstance = $attribute->newInstance();
        if (!$attributeInstance->validate($value)) {
            echo $attributeInstance->getMessage() . PHP_EOL;
        }
    }
}
