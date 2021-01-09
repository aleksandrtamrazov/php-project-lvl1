<?php

namespace Php\Project\Progression;

use function Php\Project\Cli\generateProgression;
use function Php\Project\Engine\engine;

const DESCRIPTION = 'What number is missing in the progression?';

function run()
{
    $getGameData = function () {
        $startProgression = rand(1, 5);
        $stepProgression = rand(1, 3);
        $lengthProgression = rand(6, 10);
        $progression = generateProgression($startProgression, $stepProgression, $lengthProgression);
        $randNumberFromProgression = array_rand($progression);

        $answer = $progression[$randNumberFromProgression];
        array_splice($progression, $randNumberFromProgression, 1, "..");
        $question = implode($progression, " ");

        return array(
            "question" => (string) $question,
            "rightAnswer" => (string) $answer
        );
    };

    engine(DESCRIPTION, $getGameData);
}