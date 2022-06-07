<?php

namespace App\DataFixtures;

use App\Entity\Accidental;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Pitch;
use App\Entity\Octave;

class AppFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $this->addAccidentals($manager);
        $this->addPitches($manager);
        $this->addOctave($manager);
        $manager->flush();
    }

    public function addAccidentals(ObjectManager $manager): void
    {
        $accidentalsArr = [
            1 => [ "natural" , 0],
            2 => ["sharp" , 1],
            3 => ["flat", -1],
            4 => ["double sharp", 2],
            5 => ["double flat", -2]
        ];

        foreach ($accidentalsArr as $i => $accObj)
        {
            $accidental = new Accidental();
            $accidental->setName($accObj[0]);
            $accidental->setTransposition($accObj[1]);
            $manager->persist($accidental);
            $this->addReference("acc" . $i, $accidental);
        }
    }

    public function addPitches(ObjectManager $manager): void
    {
        $pitchesArr = [
            0 => ["Cb" , $this->getReference("acc3")],
            1 => ["C" , $this->getReference("acc1")],
            2 => ["C#" , $this->getReference("acc2")],
            3 => ["Db", $this->getReference("acc3")],
            4 => ["D", $this->getReference("acc1")],
            5 => ["D#", $this->getReference("acc2")],
            6 => ["Eb" , $this->getReference("acc3")],
            7 => ["E" , $this->getReference("acc1")],
            8 => ["E#" , $this->getReference("acc2")],
            9 => ["Fb", $this->getReference("acc3")],
            10 => ["F", $this->getReference("acc1")],
            11 => ["F#", $this->getReference("acc2")],
            12 => ["Gb", $this->getReference("acc3")],
            13 => [ "G" , $this->getReference("acc1")],
            14 => ["G#" , $this->getReference("acc2")],
            15 => ["Ab", $this->getReference("acc3")],
            16 => ["A", $this->getReference("acc1")],
            17 => ["A#", $this->getReference("acc2")],
            18 => ["Bb", $this->getReference("acc3")],
            19 => ["B", $this->getReference("acc1")],
            20 => ["B#", $this->getReference("acc2")]
        ];

        foreach($pitchesArr as $i => $pitchObj)
        {
            $pitch = new Pitch();
            $pitch->setName($pitchObj[0]);
            $pitch->setAccidental($pitchObj[1]);
            $pitch->setImageUrl("none");

            $manager->persist($pitch);
            $this->addReference("pitch" . $i, $pitch);
        }
    }

    public function addOctave(ObjectManager $manager): void
    {
        $octaveArr = [
            0 => [ 2 ],
            1 => [ 3],
            2 => [ 4 ],
            3 => [ 5 ],
        ];

        foreach ($octaveArr as $i => $octArr)
        {
            $octave = new Octave();
            $octave->setOctave($octArr[0]);

            $manager->persist($octave);
            $this->addReference("oct" . $i, $octave);
        }
    }
}
