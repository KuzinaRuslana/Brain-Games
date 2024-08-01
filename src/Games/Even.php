<?php

namespace Php\Project\Games\Even;

use function Php\Project\Engine\startGame;

use const Php\Project\Engine\NUMBER_OF_QUESTIONS;

function runGame()
{
    $questionsAndAnswers = generateQuestionsAndAnswers();
    $task = "Answer \"yes\" if the number is even, otherwise answer \"no\".";
    startGame($questionsAndAnswers, $task);
}

function generateQuestionsAndAnswers()
{
    $res = [];

    for ($i = 0; $i < NUMBER_OF_QUESTIONS; $i++) {
        $question = mt_rand(0, 100);
        $answer = isEven($question);
        
        $res[$i][] = $question;
        $res[$i][] = $answer;
    }

    return $res;
}

function isEven($question)
{
    return $question % 2 === 0 ? "yes" : "no";
}
