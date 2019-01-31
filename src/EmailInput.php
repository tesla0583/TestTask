<?php

namespace src;

class EmailInput extends AbstractInput
{
    public function __construct()
    {
        $this->setType('email');
        $this->addValidateRule(['validator' => 'email']);
    }
}