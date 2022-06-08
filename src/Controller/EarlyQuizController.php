<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\DbPopulator;
use App\Service\Quiz\QuizService;


//This class is deprecated and was primarily to test basics of the API during dev
#[Route('/early')]
class EarlyQuizController extends AbstractController
{
    #[Route('/quiz', name: 'app_quiz')]
    public function index(QuizService $quizService): JsonResponse
    {
        //Start here next time by creating a scope factory class.
        //Then we can standardize the way that data is sent in the req body and used in services.
        $reqData =
        [
            "instrument" => "Trumpet",
            "pitches" => [
                0 => ["C", 4],
                1 => ["D", 4],
                2 => ["E", 5],
            ]
        ];

        $data = $quizService->createQuiz($reqData);

        return $this->json([
            'message' => 'Here is your new quiz',
            'path' => 'src/Controller/EarlyQuizController.php',
            'data' => $data
        ]);
    }

    #[Route('/quiz', methods: ['POST'], name: 'grade_quiz')]
    public function gradeQuiz(): JsonResponse
    {
        return $this->json([
            'message' => 'Here is your new quiz',
            'path' => 'src/Controller/EarlyQuizController.php',
            'data' => [
                ["A5" => 12],
                ["Bb5" => 1]
            ],
        ]);
    }

    #[Route('/quiz/add-to-db', methods: ['GET'], name: 'grade_quiz')]
    public function addDataToQuiz(DbPopulator $quizConstructor): JsonResponse
    {
        $quizConstructor->addFingeringPerInstrumentPitch();

        return $this->json([
          'message' => 'just added some data...'
        ]);
    }




}
