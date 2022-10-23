<?php

declare(strict_types=1);

namespace Tiojobs\Domain\Action;

use ReflectionObject;
use Tiojobs\Domain\Entities\Person;
use Tiojobs\Attributes\Validators\AbstractValidator;

class ValidationErrorsVerifier
{
    private static array $messages = [];

    public static function handle(Person $person): array
    {
        $reflectionObject = new ReflectionObject($person);

        foreach ($reflectionObject->getProperties() as $property) {

            $property->setAccessible(true);
            $value = $property->getValue($person);

            $attributes = $property->getAttributes(AbstractValidator::class, \ReflectionAttribute::IS_INSTANCEOF);

            // Esse $attributes está vindo null por algum motivo que não sei :-)

            foreach ($attributes as $attribute) {
                $attributeInstance = $attribute->newInstance();
                if (!$attributeInstance->validate($value)) {
                    self::$messages[] += $attributeInstance->getMessage();

                    echo print_r(self::$messages) . PHP_EOL;
                }
            }
        }

        return self::$messages;
    }
}
