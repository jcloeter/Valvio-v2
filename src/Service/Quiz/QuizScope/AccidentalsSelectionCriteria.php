<?php

namespace App\Service\Quiz\QuizScope;

use Exception;

class AccidentalsSelectionCriteria
{
    public bool $natural;
    public bool $sharp;
    public bool $flat;
    public bool $doubleSharp;
    public bool $doubleFlat;

    public function __construct($accidentals)
    {
        dump($accidentals["natural"]);

        $this->natural = $accidentals["natural"];
        $this->sharp = $accidentals["sharp"];
        $this->flat = $accidentals["flat"];
        $this->doubleSharp = $accidentals["doubleSharp"];
        $this->doubleFlat = $accidentals["doubleFlat"];

        //Start here and test this route, I think neither key or accidental are getting hit
        if ($this->areAllAccidentalsFalse())
        {
            throw new Exception("Must select at least one accidental for the quiz.");
        }
    }

    public function getAccidentalsArray() :array
    {
        return [
            0 => $this->natural,
            1 => $this->sharp,
            2 => $this->flat,
            3 => $this->doubleSharp,
            4 => $this->doubleFlat
        ];
    }

    public function areAllAccidentalsFalse(): bool
    {
        $checkedAccidentals = array_filter($this->getAccidentalsArray(), function($element) {
            return $element;
        });

        if (count($checkedAccidentals) == 0) {
            return true;
        }
        return false;
    }
}