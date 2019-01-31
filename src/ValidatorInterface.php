<?php

namespace src;

interface ValidatorInterface
{
    public function isValid($value);
    public function getError();
}