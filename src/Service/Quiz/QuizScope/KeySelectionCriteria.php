<?php

namespace App\Service\Quiz\QuizScope;

class KeySelectionCriteria
{
    public string $key;

    public function construct(string $key)
    {
        $this->key = $key;
    }
}