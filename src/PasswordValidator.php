<?php

namespace src;
class PasswordValidator extends AbstractValidator
{
    public function required($pass)
    {
        if (empty($pass)) {
            $this->setError('Значение пароль пусто, введите пароль!');
            return false;
        }
        return true;
    }

    public function isValid($pass)
    {
        $uppercase = preg_match('@[A-Z]@', $pass);
        $lowercase = preg_match('@[a-z]@', $pass);
        $number = preg_match('@[0-9]@', $pass);

        if (!($uppercase || $lowercase || $number) || strlen($pass) < 8) {
            $this->setError('Пароль введен не правильно или меньше 8 символов');
            return false;
        }
        return true;
    }
}