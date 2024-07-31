<?php

namespace Php\Project\Engine;

use function cli\line;
use function cli\prompt;

const NUMBER_OF_QUESTIONS = 3;

function startGame($questionsAndAnswers, $task)
{
    line('Welcome to the Brain Games!');
    $userName = prompt('May I have your name?', null, ' ');
    line("Hello, %s!", $userName);
    line($task);

    for ($i = 0; $i < NUMBER_OF_QUESTIONS; $i++) {
        line("Question: %s", $questionsAndAnswers[$i][0]);
        $userAnswer = prompt('Your answer');
        $correctAnswer = $questionsAndAnswers[$i][1];
        if ($userAnswer === $correctAnswer) {
            line('Correct!');
        } else {
            line("\"%s\" is wrong answer. ;( Correct answer was \"%s\"", $userAnswer, $correctAnswer);
            line("Let's try again, %s!", $userName);
            exit();
        }
    }
    line("Congratulations, %s!", $userName);
}
