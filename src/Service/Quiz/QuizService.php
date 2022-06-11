<?php

namespace App\Service\Quiz;

use App\Service\Quiz\TrumpetQuizFactory;

class QuizService
{
    public TrumpetQuizFactory $trumpetQuizFactory;

    public function __construct(TrumpetQuizFactory $trumpetQuizFactory)
    {
        $this->trumpetQuizFactory = $trumpetQuizFactory;
    }

    public function createQuiz($data)
    {
        if( $data["instrument"] == "Trumpet")
        {
            return $this->trumpetQuizFactory->createQuiz($data);
//            return new TrumpetQuiz();
        }
    }
}