<?php

namespace src;

class PassInput extends AbstractInput
{
    public function __construct()
    {
        $this->setType('password');
        $this->addValidateRule(['validator' => 'password']);
    }
}