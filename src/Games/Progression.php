<?php

namespace Php\Project\Games\Progression;

use function Php\Project\Engine\startGame;

use const Php\Project\Engine\NUMBER_OF_QUESTIONS;

const GAME_TASK = 'What number is missing in the progression?';

function runGame(): void
{
    $questionsAndAnswers = generateQuestionsAndAnswers();
    startGame($questionsAndAnswers, GAME_TASK);
}

function generateQuestionsAndAnswers(): array
{
    $questionsAndAnswersPairs = [];

    for ($i = 0; $i < NUMBER_OF_QUESTIONS; $i++) {
        $firstElement = mt_rand(0, 50);
        $interval = mt_rand(1, 9);
        $progression = createProgression($firstElement, $interval);

        $hiddenElementIndex = mt_rand(0, 9);
        $answer = (string) $progression[$hiddenElementIndex];

        $progression[$hiddenElementIndex] = '..';
        $question = implode(' ', $progression);

        $questionsAndAnswersPairs[$i][] = $question;
        $questionsAndAnswersPairs[$i][] = $answer;
    }

    return $questionsAndAnswersPairs;
}

function createProgression(int $firstElement, int $interval): array
{
    $progression = [];
    $progressionLength = 10;

    for ($i = 0; $i < $progressionLength; $i++) {
        $progression[] = $firstElement;
        $firstElement += $interval;
    }

    return $progression;
}
