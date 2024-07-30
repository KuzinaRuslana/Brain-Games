<?php

namespace Php\Project\Even;

use function cli\line;
use function cli\prompt;

const NUMBER_OF_GAMES = 3;

function runGame()
{
    line('Welcome to the Brain Games!');
    $userName = prompt('May I have your name?', null, ' ');
    line("Hello, %s!", $userName);
    line("Answer \"yes\" if the number is even, otherwise answer \"no\".");

    for ($i = 0; $i < NUMBER_OF_GAMES; $i++) {
        $question = mt_rand(0, 100);
        line("Question: %s", $question);
        $userAnswer = prompt('Your answer');
        $isEven = $question % 2 === 0 ? "yes" : "no";
        if ($userAnswer === $isEven) {
            line('Correct!');
        } else {
            line("\"%s\" is wrong answer. ;( Correct answer was \"%s\"", $userAnswer, $isEven);
            line("Let's try again, %s!", $userName);
            exit();
        }
    }
    line("Congratulations, %s!", $userName);
}
