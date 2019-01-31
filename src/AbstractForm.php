<?php

namespace src;

use src\AbstractInput;
use src\InputFactory;
use src\ValidatorFactory;

class AbstractForm implements FormInterface
{
    private $inputs;
    private $errors;

    public function __set($name, $value)
    {
        if (isset($this->inputs[$name])) {
            $this->inputs[$name]->setValue($value);
        } else {
            throw new \Exception("Не найден элемент {$name}!");
        }
    }

    public function __get($name)
    {
        if (isset($this->inputs[$name])) {
            return $this->inputs[$name];
        } else {
            return "Не найден элемент{$name}!";
        }
    }

    public function getInputs()
    {
        return $this->inputs;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function addError($inputName, $error)
    {
        if (!is_array($this->errors)) {
            $this->errors = [];
        }
        if (!isset($this->errors[$inputName])) {
            $this->errors[$inputName] = [];
        }
        $this->errors[$inputName] = $error;
    }

    public function validate()
    {
        if (is_array($this->inputs)) {
            foreach ($this->inputs as $input) {
                if ($input instanceof AbstractInput) {
                    $validateRules = $input->getValidateRules();

                    foreach ($validateRules as $rule) {
                        $validator = ValidatorFactory::build($rule);

                        if (!$validator->required($input->getValue())) {
                            $this->addError($input->getName(), $validator->getError());
                        } elseif (!$validator->isValid($input->getValue())) {
                            $this->addError($input->getName(), $validator->getError());
                        }
                    }
                } else {
                    throw new \Exception("Параметр должен быть элементом объекта.");
                }
            }
        }
    }

    public function isValid()
    {
        $this->validate();
        if (!empty($this->errors)) {
            return false;
        }
        return true;
    }

    public function push()
    {
        if (!$this->isValid()) {
            echo "Неверные данные:\n";
            foreach ($this->errors as $filedName => $error) {
                echo $filedName . " -> " . $error . "\n";
            }
            exit;
        } else {
            echo "Данные действительны, валидация прошла успешна!\n";
        }
    }

    public function addInput($type, $name)
    {
        if (!is_array($this->inputs)) {
            $this->inputs = [];
        }
        if (isset($this->inputs[$name])) {
            throw new \Exception("Элемент {$name} уже существует.");
        }
        if (is_string($type) && is_string($name) && !empty($type) && !empty($name)) {
            $input = InputFactory::build($type);
            $input->setName($name);

            $this->inputs[$name] = $input;
        }
    }
}