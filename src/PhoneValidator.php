<?php

namespace src;

class PhoneValidator extends AbstractValidator
{
    public function isValid($value)
    {

        //\d — соответствует любой цифре; эквивалент [0-9]
        if (!preg_match('/^[0-9]+$/', $value)) {
            $this->setError('Не правильный формат номера телефона');
            return false;
        } elseif (strlen($value) != 9) {
            $this->setError('Номер телефона должен состоять из 9 цифр');
            return false;
        }
        return true;
    }
}