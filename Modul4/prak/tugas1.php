<?php
function generator($n)
{
    for ($i = 1; $i <= $n; $i++) {
        $output = '';

        if ($i % 3 == 0) {
            $output .= 'Hello';
        }

        if ($i % 5 == 0) {
            $output .= 'World';
        }

        if ($i % 4 == 0 ) {
            $output .= 'Caca';
        }

        echo $output ?: $i;
        echo PHP_EOL;
    }
}

$n = 15;
if (isset($_SERVER['argc']) && $_SERVER['argc'] > 1 && is_numeric($_SERVER['argv'][1])) {
    $n = (int) $_SERVER['argv'][1];
}

generator($n);
?>
