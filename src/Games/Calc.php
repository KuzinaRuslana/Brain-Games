<?php

namespace Php\Project\Games\Calc;

use function Php\Project\Engine\startGame;

use const Php\Project\Engine\NUMBER_OF_QUESTIONS;

function runGame()
{
    $questionsAndAnswers = generateQuestionsAndAnswers();
    $task = "What is the result of the expression?";
    startGame($questionsAndAnswers, $task);
}

function generateQuestionsAndAnswers()
{
    $operators = ["+", "-", "*"];
    $res = [];

    for ($i = 0; $i < NUMBER_OF_QUESTIONS; $i++) {
        $operandOne = mt_rand(0, 10);
        $operandTwo = mt_rand(0, 10);
        $randIndex = mt_rand(0, 2);
        $operator = $operators[$randIndex];
        $res[$i][] = "{$operandOne} {$operator} {$operandTwo}";
        $answer = (string) calculate($operators[$randIndex], $operandOne, $operandTwo);
        $res[$i][] = $answer;
    }

    return $res;
}

function calculate($operator, $operandOne, $operandTwo)
{
    $result = match ($operator) {
        "+" => $operandOne + $operandTwo,
        "-" => $operandOne - $operandTwo,
        "*" => $operandOne * $operandTwo,
    };

    return $result;
}
