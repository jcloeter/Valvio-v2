<?php

namespace App\Service;

use App\Entity\FingeringPerInstrumentPitch;
use App\Entity\FingerPosition;
use App\Entity\Instrument;
use App\Entity\Pitch;
use App\Repository\InstrumentRepository;
use Doctrine\Migrations\Configuration\EntityManager;
use Doctrine\Persistence\ManagerRegistry;

class DbPopulator
{
    private ManagerRegistry $doctrine;
    private InstrumentRepository $instrumentRepository;

    public function __construct(ManagerRegistry $doctrine, InstrumentRepository $instrumentRepository)
    {
        $this->doctrine = $doctrine;
        $this->instrumentRepository = $instrumentRepository;
    }

    public function addFingeringPerInstrumentPitch()
    {
        $entityManager = $this->doctrine->getManager();

        //Start here, we were trying to partially fill in the db but we don't want to create new instrument objects each time
        //After that, work on retrieving a quiz

        //Ok so next time you should actually try and break up the pitch table into pitch and octave.
        //THEN, populate basic db info and serve up a quiz.

        $pitch = new Pitch();
        $pitch->setName('E');
        $pitch->setOctave(4);
        $pitch->setImageUrl('https://notes.bretpimentel.com/note.php?pitch_class=e&octave=4&naturals=false&parentheses_naturals=false&parentheses_sharps_flats=false&clef=treble&barline=&font=emmentaler&size=1&size_name=medium&format=png&v=0.2');
        $pitch->setMidiNoteId('64');
        $entityManager->persist($pitch);

        $position = new FingerPosition();
        $position->setPosition(12);
        $entityManager->persist($position);

//        $instrument = new Instrument();
//        $instrument->setTransposition('Bb');
//        $instrument->setName('Trumpet');
//        $entityManager->persist($instrument);

        $fingeringPerInstrumentPitch = new FingeringPerInstrumentPitch();
        $fingeringPerInstrumentPitch->setFingeringPosition($position);
        $fingeringPerInstrumentPitch->setInstrument($this->instrumentRepository->find(3));
        $fingeringPerInstrumentPitch->setPitch($pitch);
        $entityManager->persist($fingeringPerInstrumentPitch);

//        return;

        $entityManager->flush();

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