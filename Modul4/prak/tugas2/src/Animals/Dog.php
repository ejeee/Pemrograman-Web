<?php

namespace src\Animals;

use src\Traits\LoggingTrait;

class Dog extends Animal {
    use LoggingTrait;

    public function makeSound() {
        return $this->sound;
    }

    public function __construct() {
        $this->sound = 'Gukguk';
    }
}
?>