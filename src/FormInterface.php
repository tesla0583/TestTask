<?php

namespace src;

interface FormInterface {
    public function validate();
    public function isValid();
    public function push();
    public function addInput($type, $name);
} 