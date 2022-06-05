<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\QuizConstructor;

class QuizController extends AbstractController
{
    #[Route('/quiz', name: 'app_quiz')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Here is your new quiz',
            'path' => 'src/Controller/QuizController.php',
            'data' => [
                ["A5" => 12],
                ["Bb5" => 1]
            ],
        ]);
    }

    #[Route('/quiz', methods: ['POST'], name: 'grade_quiz')]
    public function gradeQuiz(): JsonResponse
    {
        return $this->json([
            'message' => 'Here is your new quiz',
            'path' => 'src/Controller/QuizController.php',
            'data' => [
                ["A5" => 12],
                ["Bb5" => 1]
            ],
        ]);
    }

    #[Route('/quiz/add-to-db', methods: ['GET'], name: 'grade_quiz')]
    public function addDataToQuiz(QuizConstructor $quizConstructor): JsonResponse
    {
        $quizConstructor->addFingeringToDb();

        return $this->json([
          'message' => 'just added some data...'
        ]);
    }




}
