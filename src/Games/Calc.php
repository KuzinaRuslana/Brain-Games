<?php

namespace Php\Project\Games\Calc;

use function Php\Project\Engine\startGame;

use const Php\Project\Engine\NUMBER_OF_QUESTIONS;

const GAME_TASK = 'What is the result of the expression?';

function runGame()
{
    $questionsAndAnswers = generateQuestionsAndAnswers();
    startGame($questionsAndAnswers, GAME_TASK);
}

function generateQuestionsAndAnswers()
{
    $operators = ['+', '-', '*'];
    $operatorsCount = count($operators);
    $res = [];

    for ($i = 0; $i < NUMBER_OF_QUESTIONS; $i++) {
        $operandOne = mt_rand(0, 10);
        $operandTwo = mt_rand(0, 10);
        $randIndex = mt_rand(0, $operatorsCount - 1);
        $operator = $operators[$randIndex];

        $question = "{$operandOne} {$operator} {$operandTwo}";
        $answer = (string) calculate($operator, $operandOne, $operandTwo);

        $res[$i][] = $question;
        $res[$i][] = $answer;
    }

    return $res;
}

function calculate(string $operator, int $operandOne, int $operandTwo)
{
    $result = match ($operator) {
        '+' => $operandOne + $operandTwo,
        '-' => $operandOne - $operandTwo,
        default => $operandOne * $operandTwo,
    };

    return $result;
}
