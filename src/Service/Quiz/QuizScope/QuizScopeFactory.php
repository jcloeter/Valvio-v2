<?php

namespace App\Service\Quiz\QuizScope;

use Exception;

class QuizScopeFactory
{
    public function createScopeWithNoteRange($body)
    {
        if (!isset($body["instrument"]) || !isset($body["selectionCriteria"])) {
            throw new Exception("Missing instrument or selectionCriteria parameters in request body");
        }
        dump("quizScopeFactory");
        return new RangeQuizScope($body);
    }
}



//Deprecated, moving to an approach with more specific methods.
//    public function create($body)
//    {
//        if (!$body["instrument"])
//        {
//            throw new \Exception("No instrument defined.");
//        }
//        return new RangeQuizScope($body);
////        echo "Factory";
////        return new RangeQuizScope();
//    }