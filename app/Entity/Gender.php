<?php

namespace App\Entity;

class Gender
{
    public const MALE          = 1;
    public const FEMALE        = 2;

    private static $titles = [
        self::MALE => 'Male',
        self::FEMALE   => 'Female',
    ];

    /**
     * @param              $value
     * @return null|string
     */
    public static function getNameByValue($value): ?string
    {
        return self::$titles[$value] ?? null;
    }

    /**
     * @return array
     */
    public static function forSelector(): array
    {
        $data = [];
        foreach (self::$titles as $key => $name) {
            $data[$key] = $name;
        }

        return $data;
    }
}
