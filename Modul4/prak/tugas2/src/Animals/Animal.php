<?php

namespace src\Animals;

abstract class Animal {
    protected $name;
    protected $sound;

    abstract public function makeSound();

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
}
?>
