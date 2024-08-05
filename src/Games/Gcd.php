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

function generateQuestionsAndAnswers(): array
{
    $questionsAndAnswersPairs = [];

    for ($i = 0; $i < NUMBER_OF_QUESTIONS; $i++) {
        $firstNumber = mt_rand(1, 10);
        $secondNumber = mt_rand(1, 10);

        $question = "{$firstNumber} {$secondNumber}";
        $answer = (string) findGreatestCommonDivisor($firstNumber, $secondNumber);

        $questionsAndAnswersPairs[$i][] = $question;
        $questionsAndAnswersPairs[$i][] = $answer;
    }

    return $questionsAndAnswersPairs;
}

function findGreatestCommonDivisor(int $firstNumber, int $secondNumber): int
{
    $firstOperand = $firstNumber;
    $secondOperand = $secondNumber;

    while ($secondOperand != 0) {
        $temp = $secondOperand;
        $secondOperand = $firstOperand % $secondOperand;
        $firstOperand = $temp;
    }

    return $firstOperand;
}
