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
        $question = mt_rand(1, 100);
        $answer = isPrime($question);

        $res[$i][] = $question;
        $res[$i][] = $answer;
    }

    return $res;
}

function isPrime($question)
{
    for ($i = 2; $i < $question; $i++) {
        if ($question % $i === 0) {
            return 'no';
        }
    }

    return 'yes';
}
