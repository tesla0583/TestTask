<?php

namespace src;
class EmailValidator extends AbstractValidator
{
    public function required($value)
    {
        if (empty($value)) {
            $this->setError('Обязательое поле, введите Email!');
            return false;
        }
        return true;
    }

    public function isValid($value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->setError('Не правильно заполнено поле Email!');
            return false;
        }
        return true;
    }
}