<?php

namespace src;

use Input;

abstract class AbstractValidator implements ValidatorInterface
{
    private $msgError;

    public function required($value)
    {
        return true;
    }

    public function setError($msgError)
    {
        $this->msgError = $msgError;
    }

    public function getError()
    {
        return $this->msgError;
    }

    abstract public function isValid($value);

}