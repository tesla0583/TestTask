<?php

namespace src;

class DoForm extends AbstractForm
{
    public function push()
    {
        parent::push();
        $inputs = $this->getInputs();
        if (is_array($inputs)) {
            foreach ($inputs as $input) {
                echo $input->getName() . " -> " . $input->getValue() . "\n";
            }

        }
    }
}