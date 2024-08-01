<?php

namespace Php\Project\Games\Prime;

use function Php\Project\Engine\startGame;

use const Php\Project\Engine\NUMBER_OF_QUESTIONS;

function runGame()
{
    $questionsAndAnswers = generateQuestionsAndAnswers();
    $task = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";
    startGame($questionsAndAnswers, $task);
}

function generateQuestionsAndAnswers()
{
    $res = [];

    for ($i = 0; $i < NUMBER_OF_QUESTIONS; $i++) {
        $question = mt_rand(0, 100);
        $answer = isPrime($question);

        $res[$i][] = $question;
        $res[$i][] = $answer;
    }

    return $res;
}

function isPrime($question)
{
    $divisors = [];

    for ($i = 1; $i <= $question; $i++) {
        if (is_int($question / $i)) {
            $divisors[] = $i;
        }
    }

    return count($divisors) === 2 ? "yes" : "no";
}
