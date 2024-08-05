<?php

namespace Php\Project\Games\Even;

use function Php\Project\Engine\startGame;

use const Php\Project\Engine\NUMBER_OF_QUESTIONS;

const GAME_TASK = "Answer \"yes\" if the number is even, otherwise answer \"no\".";

function runGame()
{
    $questionsAndAnswers = generateQuestionsAndAnswers();
    startGame($questionsAndAnswers, GAME_TASK);
}

function generateQuestionsAndAnswers()
{
    $questionsAndAnswersPairs = [];

    for ($i = 0; $i < NUMBER_OF_QUESTIONS; $i++) {
        $question = mt_rand(0, 100);
        $answer = isEven($question);

        $questionsAndAnswersPairs[$i][] = $question;
        $questionsAndAnswersPairs[$i][] = $answer;
    }

    return $questionsAndAnswersPairs;
}

function isEven(int $question)
{
    return $question % 2 === 0 ? 'yes' : 'no';
}
