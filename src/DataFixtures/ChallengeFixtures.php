<?php

namespace App\DataFixtures;

use App\Entity\Challenge;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ChallengeFixtures extends Fixture
{
    const CHALLENGES = [
        [
            'name'     => 'HTML - boutons désactivés',
            'url'      => 'http://challenge01.root-me.org/web-client/ch25/',
            'solution' => 'HTMLCantStopYou',
            'level'    => 1,
            'step'     => 1,
        ],
        [
            'name'     => 'Javascript - Authentification',
            'url'      => 'http://challenge01.root-me.org/web-client/ch9/',
            'solution' => 'sh.org',
            'level'    => 1,
            'step'     => 2,
        ],
        [
            'name'     => 'Javascript - Source',
            'url'      => 'http://challenge01.root-me.org/web-client/ch1/ch1.html',
            'solution' => '123456azerty',
            'level'    => 2,
            'step'     => 3,
        ]
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::CHALLENGES as $challengeData) {
            $challenge = new Challenge();
            $challenge->setName($challengeData['name']);
            $challenge->setUrl($challengeData['url']);
            $challenge->setSolution($challengeData['solution']);
            $challenge->setLevel($challengeData['level']);
            $challenge->setStep($challengeData['step']);
            $manager->persist($challenge);
        }
        $manager->flush();
    }
}
