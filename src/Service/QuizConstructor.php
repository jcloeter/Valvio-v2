<?php

namespace App\Service;

use App\Entity\FingerPosition;
use App\Entity\Instrument;
use App\Entity\Pitch;
use Doctrine\Migrations\Configuration\EntityManager;
use Doctrine\Persistence\ManagerRegistry;

class QuizConstructor
{
    private ManagerRegistry $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function addInstrumentPitchFingering()
    {
        $entityManager = $this->doctrine->getManager();

        //Start here by making it so we can add a more complex object to the db.

    }

    public function addPitchesToDb()
    {
        $entityManager = $this->doctrine->getManager();
        $pitch = new Pitch();
        $pitch->setName('C');
        $pitch->setOctave(4);
        $pitch->setImageUrl('https://o.quizlet.com/8F6bOkEN34o5NzFRo5Lc3Q.png');
        $pitch->setMidiNoteId('60');

        $entityManager->persist($pitch);

        $entityManager->flush();

    }

    public function addInstrumentsToDb()
    {
//        $entityManager = $this->doctrine->getManager();
//        $instrument = new Instrument();
//        $instrument->setTransposition('C');
//        $instrument->setName('Tuba');
//        $entityManager->persist($instrument);
//
//        $entityManager->flush();
    }

    public function addFingeringToDb()
    {
        $entityManager = $this->doctrine->getManager();
        $position = new FingerPosition();
        $position->setPosition(0);

        $entityManager->persist($position);

        $entityManager->flush();

    }
}