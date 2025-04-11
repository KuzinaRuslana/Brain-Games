<?php

namespace Php\Project\Games\Calc;

use function Php\Project\Engine\startGame;

use const Php\Project\Engine\NUMBER_OF_QUESTIONS;

const GAME_TASK = 'What is the result of the expression?';

function runGame(): void
{
    $questionsAndAnswers = generateQuestionsAndAnswers();
    startGame($questionsAndAnswers, GAME_TASK);
}

function generateQuestionsAndAnswers(): array
{
    $operators = ['+', '-', '*'];
    $questionsAndAnswersPairs = [];

    for ($i = 0; $i < NUMBER_OF_QUESTIONS; $i++) {
        $operandOne = mt_rand(0, 10);
        $operandTwo = mt_rand(0, 10);
        $randomIndex = array_rand($operators);
        $operator = $operators[$randomIndex];

        $question = "{$operandOne} {$operator} {$operandTwo}";
        $answer = (string) calculate($operator, $operandOne, $operandTwo);

        $questionsAndAnswersPairs[$i][] = $question;
        $questionsAndAnswersPairs[$i][] = $answer;
    }

    return $questionsAndAnswersPairs;
}

function calculate(string $operator, int $operandOne, int $operandTwo): int|string
{
    $result = match ($operator) {
        '+' => $operandOne + $operandTwo,
        '-' => $operandOne - $operandTwo,
        '*' => $operandOne * $operandTwo,
        default => 'Invalid operator',
    };

    return $result;
}
