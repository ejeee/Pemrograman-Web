<?php

namespace src\Traits;

trait LoggingTrait {
    public function log($message) {
        echo '[' . date('Y-m-d H:i:s') . '] ' . $message . PHP_EOL;
    }
}
?>