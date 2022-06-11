<?php

namespace App\Service\Quiz\QuizScope;

class RangeQuizScope
{
    public string $instrument;
    public RangeSelectionCriteria $selectionCriteria;

    public function __construct($body)
    {
        $this->instrument = $body["instrument"];
        $this->selectionCriteria = new RangeSelectionCriteria($body["selectionCriteria"]);
    }

    /**
     * @return mixed|string
     */
    public function getInstrument(): mixed
    {
        return $this->instrument;
    }

    /**
     * @param mixed|string $instrument
     */
    public function setInstrument(mixed $instrument): void
    {
        $this->instrument = $instrument;
    }
}