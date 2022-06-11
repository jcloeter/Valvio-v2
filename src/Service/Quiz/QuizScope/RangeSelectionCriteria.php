<?php

namespace App\Service\Quiz\QuizScope;

use App\Service\Quiz\QuizScope\AccidentalsSelectionCriteria;
use App\Service\Quiz\QuizScope\KeySelectionCriteria;

class RangeSelectionCriteria
{
    public string $startPitch;
    public int $startOctave;
    public string $endPitch;
    public int $endOctave;
    public $pitchAlterationCriteria;

    public function __construct($selectionCriteria)
    {
        $this->startPitch = $selectionCriteria["startPitch"];
        $this->startOctave = $selectionCriteria["startOctave"];
        $this->endPitch = $selectionCriteria["endPitch"];
        $this->endOctave = $selectionCriteria["endOctave"];

        if (isset($selectionCriteria["key"]))
        {
            $this->pitchAlterationCriteria = new KeySelectionCriteria($selectionCriteria["key"]);
        } else if (isset($selectionCriteria["accidentals"])){
            $this->pitchAlterationCriteria = new AccidentalsSelectionCriteria($selectionCriteria["accidentals"]);
        }

    }

    //TODO: Implement getters

}