<?php

namespace classes\PureClasses\Gender;

class Gender
{
    public const MALE = 1;
    public const FEMALE = 2;

    public static function getGenderList() : array
    {
        return [
            'MALE' => self::MALE,
            'FEMALE' => self::FEMALE
        ];
    }
}