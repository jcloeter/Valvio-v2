<?php

namespace App\Controller;

use App\Service\Quiz\QuizScope\QuizScopeFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

#[Route('/quiz')]
class QuizController extends AbstractController
{
    #[Route('/range/accidentals', name: 'get_quiz_by_accidentals')]
    public function index(Request $request, QuizScopeFactory $quizScopeFactory): JsonResponse
    {
        $body = json_decode($request->getContent(), true);
        $scope = $quizScopeFactory->createScopeWithNoteRange($body);

        return $this->json([
            'message' => 'Here is an array containing the notes from the range you selected with only the accidentals you wanted.',
            'body' => $body["instrument"],
            'scope' => $scope
        ]);
    }
}
