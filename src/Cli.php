<?php

namespace Php\Project\Cli;

use function cli\line;
use function cli\prompt;

function greet()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?', null, ' ');
    line("Hello, %s!", $name);
}
