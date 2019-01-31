<?php

namespace src;

class ValidatorFactory
{
    public static function build($validator)
    {
        if (is_array($validator)) {
            $params = false;
            if (isset($validator[1])) {
                $params = $validator[1];
            }
            $validator = $validator['validator'];
            $className = "\\src\\" . ucfirst($validator) . 'Validator';
            if (!class_exists($className)) {
                throw new \Exception("Unknown validator type");
            }
            return new $className($params);
        } else {
            throw new \InvalidArgumentException();
        }
    }
}