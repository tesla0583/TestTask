<?php

namespace src;

class PhoneInput extends AbstractInput
{
    public function __construct()
    {
        $this->setType('text');
        $this->addValidateRule(['validator' => 'phone']);
    }
}