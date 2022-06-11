<?php

namespace App\DataFixtures;

use App\Entity\Accidental;
use App\Entity\MidiNumber;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Pitch;
use App\Entity\Octave;
use App\Entity\Instrument;
use App\Entity\FingerPosition;

class AppFixtures extends Fixture
{

    public array $pitchesArr;
    public array $octaveArr;
    //Start here: double check that the db schema is what you want. Otherwise, it may be a lot of work to change all of this over and over again.

    public function load(ObjectManager $manager): void
    {
        $this->addAccidentals($manager);
        $this->addPitches($manager);
        $this->addOctave($manager);
        $this->addInstrument($manager);
        $this->addFingerPosition($manager);
        $this->addMidiNumber($manager);
        $manager->flush();
    }

    public function addAccidentals(ObjectManager $manager): void
    {
        //Not sure why I started this at 1...
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

    public function addMidiNumber(ObjectManager $manager)
    {
        $midiNum = [];
        $startMidiNum = 23; //This represents a Cb1

        //Some midi numbers are repeated, this array shows the general pattern beginning from a Cb:
        $midiStartNumArray = [
           23, 24, 25, 25, 26, 27, 27, 28, 29, 28, 29, 30, 30, 31, 32, 32, 33, 34, 34, 35, 36
        ];


        //midiNum, pitchId, octaveId
        foreach ($this->octaveArr as $octIndex => $octave)
        {
            foreach ($this->pitchesArr as $i => $pitchArr)
            {
                echo $startMidiNum;
                $midiNum[] = [($midiStartNumArray[$i] + (12 * ($octIndex))), $this->getReference("pitch".$i), $this->getReference("oct".$octIndex)];
                $startMidiNum++;
            }
        }

        foreach ($midiNum as $i => $midiArr)
        {
            $midi = new MidiNumber();
            $midi->setMidiNumber($midiArr[0]);
            $midi->setPitch($midiArr[1]);
            $midi->setOctave($midiArr[2]);

            $manager->persist($midi);
            $this->addReference("midi" . $i, $midi);
        }


    }

    public function addPitches(ObjectManager $manager): void
    {
        $this->pitchesArr = [
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

        foreach($this->pitchesArr as $i => $pitchObj)
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
        $this->octaveArr = [
            0 => [ 2 ],
            1 => [ 3],
            2 => [ 4 ],
            3 => [ 5 ],
            4 => [ 6 ],
        ];

        foreach ($this->octaveArr as $i => $octArr)
        {
            $octave = new Octave();
            $octave->setOctave($octArr[0]);

            $manager->persist($octave);
            $this->addReference("oct" . $i, $octave);
        }
    }

    public function addInstrument(ObjectManager $manager)
    {
        $instrumentArr = [
            0 => [ "Trumpet", "Bb" ],
            1 => [ "French Horn", "F"],
            2 => [ "Euphonium", "C" ]
        ];

        foreach ($instrumentArr as $i => $instrObj)
        {
            $instrument = new Instrument();
            $instrument->setName($instrObj[0]);
            $instrument->setTransposition($instrObj[1]);

            $manager->persist($instrument);
            $this->addReference("instr" . $i, $instrument);
        }
    }

    public function addFingerPosition(ObjectManager $manager)
    {
        $positionArr = [
            0 => [ 0 ],
            1 => [ 1],
            2 => [ 2],
            3 => [ 12],
            4 => [ 23],
            5 => [ 13],
            6 => [ 123],
            7 => [ 3 ]
        ];

        foreach ($positionArr as $i => $posObj)
        {
            $position = new FingerPosition();
            $position->setPosition($posObj[0]);

            $manager->persist($position);
            $this->addReference("pos" . $i, $position);
        }
    }
}


//A not DRY graveyard:
//$midiArr = [
//    //Low F# through B natual
//    0 => [54, $this->getReference("pitch11"), $this->getReference("oct1")],
//    1 => [54, $this->getReference("pitch12"), $this->getReference("oct1")],
//    2 => [55, $this->getReference("pitch13"), $this->getReference("oct1")],
//    3 => [56, $this->getReference("pitch14"), $this->getReference("oct1")],
//    4 => [56, $this->getReference("pitch15"), $this->getReference("oct1")],
//    5 => [57, $this->getReference("pitch16"), $this->getReference("oct1")],
//    6 => [58, $this->getReference("pitch17"), $this->getReference("oct1")],
//    7 => [58, $this->getReference("pitch18"), $this->getReference("oct1")],
//    7 => [59, $this->getReference("pitch19"), $this->getReference("oct1")],
//
//    //Low Cb through middle B
//    7 => [59, $this->getReference("pitch20"), $this->getReference("oct2")], //Cb
//    7 => [60, $this->getReference("pitch0"), $this->getReference("oct2")], //C
//    7 => [61, $this->getReference("pitch1"), $this->getReference("oct2")], //
//    7 => [61, $this->getReference("pitch2"), $this->getReference("oct2")],
//    7 => [62, $this->getReference("pitch3"), $this->getReference("oct2")],
//    7 => [63, $this->getReference("pitch4"), $this->getReference("oct2")],
//    7 => [64, $this->getReference("pitch5"), $this->getReference("oct2")],
//    7 => [64, $this->getReference("pitch6"), $this->getReference("oct2")],
//    7 => [54, $this->getReference("pitch7"), $this->getReference("oct2")],
//    7 => [54, $this->getReference("pitch8"), $this->getReference("oct2")],
//    7 => [54, $this->getReference("pitch9"), $this->getReference("oct2")],
//    7 => [54, $this->getReference("pitch10"), $this->getReference("oct2")],
//    7 => [54, $this->getReference("pitch11"), $this->getReference("oct2")],
//    7 => [54, $this->getReference("pitch12"), $this->getReference("oct2")],
//    7 => [54, $this->getReference("pitch13"), $this->getReference("oct2")],
//    7 => [54, $this->getReference("pitch14"), $this->getReference("oct2")],
//    7 => [54, $this->getReference("pitch15"), $this->getReference("oct2")],
//    7 => [54, $this->getReference("pitch16"), $this->getReference("oct2")],
//    7 => [54, $this->getReference("pitch17"), $this->getReference("oct2")],
//    7 => [54, $this->getReference("pitch18"), $this->getReference("oct2")],
//    7 => [54, $this->getReference("pitch19"), $this->getReference("oct2")],
//    7 => [54, $this->getReference("pitch20"), $this->getReference("oct2")],
//
//    //Cb in the staff to high B
//    7 => [54, $this->getReference("pitch0"), $this->getReference("oct3")],
//    7 => [54, $this->getReference("pitch1"), $this->getReference("oct3")],
//    7 => [54, $this->getReference("pitch2"), $this->getReference("oct3")],
//    7 => [54, $this->getReference("pitch3"), $this->getReference("oct3")],
//    7 => [54, $this->getReference("pitch4"), $this->getReference("oct3")],
//    7 => [54, $this->getReference("pitch5"), $this->getReference("oct3")],
//    7 => [54, $this->getReference("pitch6"), $this->getReference("oct3")],
//    7 => [54, $this->getReference("pitch7"), $this->getReference("oct3")],
//    7 => [54, $this->getReference("pitch8"), $this->getReference("oct3")],
//    7 => [54, $this->getReference("pitch9"), $this->getReference("oct3")],
//    7 => [54, $this->getReference("pitch10"), $this->getReference("oct3")],
//    7 => [54, $this->getReference("pitch11"), $this->getReference("oct3")],
//    7 => [54, $this->getReference("pitch12"), $this->getReference("oct3")],
//    7 => [54, $this->getReference("pitch13"), $this->getReference("oct3")],
//    7 => [54, $this->getReference("pitch14"), $this->getReference("oct3")],
//    7 => [54, $this->getReference("pitch15"), $this->getReference("oct3")],
//    7 => [54, $this->getReference("pitch16"), $this->getReference("oct3")],
//    7 => [54, $this->getReference("pitch17"), $this->getReference("oct3")],
//    7 => [54, $this->getReference("pitch18"), $this->getReference("oct3")],
//    7 => [54, $this->getReference("pitch19"), $this->getReference("oct3")],
//    7 => [54, $this->getReference("pitch20"), $this->getReference("oct3")],
//
//    //High Cb to High F
//    7 => [54, $this->getReference("pitch20"), $this->getReference("oct3")],
//    7 => [54, $this->getReference("pitch20"), $this->getReference("oct3")],
//    7 => [54, $this->getReference("pitch20"), $this->getReference("oct3")],
//    7 => [54, $this->getReference("pitch20"), $this->getReference("oct3")],
//    7 => [54, $this->getReference("pitch20"), $this->getReference("oct3")],
//    7 => [54, $this->getReference("pitch20"), $this->getReference("oct3")],
//    7 => [54, $this->getReference("pitch20"), $this->getReference("oct3")],
//    7 => [54, $this->getReference("pitch20"), $this->getReference("oct3")],
//    7 => [54, $this->getReference("pitch20"), $this->getReference("oct3")],
//    7 => [54, $this->getReference("pitch20"), $this->getReference("oct3")],
//    7 => [54, $this->getReference("pitch20"), $this->getReference("oct3")],
//    7 => [54, $this->getReference("pitch20"), $this->getReference("oct3")],
//
//];