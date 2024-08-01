<?php

namespace Php\Project\Games\Progression;

use function Php\Project\Engine\startGame;

use const Php\Project\Engine\NUMBER_OF_QUESTIONS;

function runGame()
{
    $questionsAndAnswers = generateQuestionsAndAnswers();
    $task = "What number is missing in the progression?";
    startGame($questionsAndAnswers, $task);
}

function generateQuestionsAndAnswers()
{
    $res = [];

    for ($i = 0; $i < NUMBER_OF_QUESTIONS; $i++) {
        $firstElem = mt_rand(0, 50);
        $interval = mt_rand(1, 9);
        $progression = createProgression($firstElem, $interval);

        $hiddenElemIndex = mt_rand(0, 9);
        $answer = (string) $progression[$hiddenElemIndex];

        $progression[$hiddenElemIndex] = "..";
        $question = implode(" ", $progression);

        $res[$i][] = $question;
        $res[$i][] = $answer;
    }

    return $res;
}

function createProgression($firstElem, $interval)
{
    $res = [];
    $progressionLength = 10;

    for ($i = 0; $i < $progressionLength; $i++) {
        $res[] = $firstElem;
        $firstElem += $interval;
    }

    return $res;
}
