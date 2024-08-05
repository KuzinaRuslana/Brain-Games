<?php

namespace Php\Project\Games\Progression;

use function Php\Project\Engine\startGame;

use const Php\Project\Engine\NUMBER_OF_QUESTIONS;

const GAME_TASK = 'What number is missing in the progression?';

function runGame()
{
    $questionsAndAnswers = generateQuestionsAndAnswers();
    startGame($questionsAndAnswers, GAME_TASK);
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

        $progression[$hiddenElemIndex] = '..';
        $question = implode(' ', $progression);

        $res[$i][] = $question;
        $res[$i][] = $answer;
    }

    return $res;
}

function createProgression(int $firstElem, int $interval)
{
    $res = [];
    $progressionLength = 10;

    for ($i = 0; $i < $progressionLength; $i++) {
        $res[] = $firstElem;
        $firstElem += $interval;
    }

    return $res;
}
