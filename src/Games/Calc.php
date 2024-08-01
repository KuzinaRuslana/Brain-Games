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

function calculate($operator, $operandOne, $operandTwo)
{
    $result = match ($operator) {
        "+" => $operandOne + $operandTwo,
        "-" => $operandOne - $operandTwo,
        "*" => $operandOne * $operandTwo,
    };

    return $result;
}
