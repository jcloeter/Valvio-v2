<?php

namespace App\Service\Quiz;

use DateTimeImmutable;

class TrumpetQuizFactory
{
    public array $pitches;
    public Instrument $instrument;
    public DateTimeImmutable $createdAt;
    public int $userId;

    public PitchFactory $pitchFactory;

    public function __construct(PitchFactory $pitchFactory)
    {
        $this->pitchFactory = $pitchFactory;
    }

    public function createQuiz($data)
    {
        return $this->pitchFactory->createPitchArray($data);
    }

//    private function createPitches($data): array
//    {
//
//    }

    public function createInstrument()
    {

    }


}