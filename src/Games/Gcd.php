<?php

namespace Php\Project\Games\Gcd;

use function Php\Project\Engine\startGame;

use const Php\Project\Engine\NUMBER_OF_QUESTIONS;

const GAME_TASK = 'Find the greatest common divisor of given numbers.';

function runGame()
{
    $questionsAndAnswers = generateQuestionsAndAnswers();
    startGame($questionsAndAnswers, GAME_TASK);
}

function generateQuestionsAndAnswers()
{
    $res = [];

    for ($i = 0; $i < NUMBER_OF_QUESTIONS; $i++) {
        $numOne = mt_rand(1, 10);
        $numTwo = mt_rand(1, 10);

        $question = "{$numOne} {$numTwo}";
        $answer = (string) findGreatestCommonDivisor($numOne, $numTwo);

        $res[$i][] = $question;
        $res[$i][] = $answer;
    }

    return $res;
}

function findGreatestCommonDivisor(int $numOne, int $numTwo)
{
    while ($numTwo != 0) {
        $temp = $numTwo;
        $numTwo = $numOne % $numTwo;
        $numOne = $temp;
    }

    return $numOne;
}
