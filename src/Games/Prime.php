<?php

namespace Php\Project\Games\Prime;

use function Php\Project\Engine\startGame;

use const Php\Project\Engine\NUMBER_OF_QUESTIONS;

const GAME_TASK = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";

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
        $answer = isPrime($question) ? 'yes' : 'no';

        $questionsAndAnswersPairs[$i][] = $question;
        $questionsAndAnswersPairs[$i][] = $answer;
    }

    return $questionsAndAnswersPairs;
}

function isPrime(int $question)
{
    if ($question <= 1) {
        return false;
    }

    for ($i = 2; $i < $question; $i++) {
        if ($question % $i === 0) {
            return false;
        }
    }

    return true;
}
