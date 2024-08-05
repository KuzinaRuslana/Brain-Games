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

function generateQuestionsAndAnswers(): array
{
    $operators = ['+', '-', '*'];
    $operatorsCount = count($operators);
    $questionsAndAnswersPairs = [];

    for ($i = 0; $i < NUMBER_OF_QUESTIONS; $i++) {
        $operandOne = mt_rand(0, 10);
        $operandTwo = mt_rand(0, 10);
        $randomIndex = mt_rand(0, $operatorsCount - 1);
        $operator = $operators[$randomIndex];

        $question = "{$operandOne} {$operator} {$operandTwo}";
        $answer = (string) calculate($operator, $operandOne, $operandTwo);

        $questionsAndAnswersPairs[$i][] = $question;
        $questionsAndAnswersPairs[$i][] = $answer;
    }

    return $questionsAndAnswersPairs;
}

function calculate(string $operator, int $operandOne, int $operandTwo): int
{
    $result = match ($operator) {
        '+' => $operandOne + $operandTwo,
        '-' => $operandOne - $operandTwo,
        default => $operandOne * $operandTwo,
    };

    return $result;
}
