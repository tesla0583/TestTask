<?php

namespace src;

class InputFactory
{
    public static function build($inputType)
    {
        $input = "\\src\\" . ucfirst($inputType).'Input';
        if (!class_exists($input)) {
            throw new \Exception("����������� ��� ��������");
        }
        return new $input;
    }
}