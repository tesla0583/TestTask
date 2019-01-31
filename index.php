<?php

function __autoload($className) {
    $parts = explode('\\', $className);
    $className = implode('/',$parts);
    if(is_file($className . 'Input.php')){
        include $className . 'Input.php';
    }elseif(is_file($className . 'Validator.php')){
            include $className . 'Validator.php';
    }elseif(is_file($className . '.php')){
        include $className . '.php';
    }
    else{
        throw new Exception("Cant find {$className}");
    }
}

$form = new \src\DoForm();
$form->addInput('email', 'email');
$form->addInput('pass', 'password');
$form->addInput('phone', 'phone_number');

$form->email = "tes@ma.ru";
$form->password = "tt231t123";
$form->phone_number = "927654321";

$form->push();
