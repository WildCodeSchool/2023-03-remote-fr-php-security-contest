<?php

namespace App\DataFixtures;

use App\Entity\Challenge;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ChallengeFixtures extends Fixture
{
    const CHALLENGES = [
        [
            'name'     => '[Web client] HTML - Code Source',
            'url'      => 'http://challenge01.root-me.org/web-serveur/ch1/',
            'solution' => 'nZ^&@q5&sjJHev0',
            'level'    => 1,
            'notice'   => 'Craque le mot de passe pour capturer le drapeau',
        ],
        [
            'name'     => '[Web client] HTML - boutons désactivés',
            'url'      => 'http://challenge01.root-me.org/web-client/ch25/',
            'solution' => 'HTMLCantStopYou',
            'level'    => 1,
            'notice'   => 'Craque le mot de passe pour capturer le drapeau',
        ],
        [
            'name'     => '[Web client] Javascript - Authentification',
            'url'      => 'http://challenge01.root-me.org/web-client/ch9/',
            'solution' => 'sh.org',
            'level'    => 1,
            'notice'   => 'Craque le mot de passe pour capturer le drapeau',
        ],
        [
            'name'     => '[Web server] Very very low password',
            'url'      => 'http://challenge01.root-me.org/web-serveur/ch3/',
            'solution' => 'admin',
            'level'    => 1,
            'notice'   => 'Craque le mot de passe pour capturer le drapeau',
        ],
        [
            'name'     => '[Web client] Hack la banque',
            'url'      => 'https://hackxor.net/mission?id=1',
            'solution' => '13780',
            'level'    => 2,
            'notice'   => 'Entre le montant de la balance du compte en banque pour capturer le drapeau',
        ],
        [
            'name'     => '[Web client] Javascript - Source',
            'url'      => 'http://challenge01.root-me.org/web-client/ch1/ch1.html',
            'solution' => '123456azerty',
            'level'    => 2,
            'notice'   => 'Craque le mot de passe pour capturer le drapeau',
        ],
        [
            'name'     => '[Web server] HTTP - Open redirect',
            'url'      => 'http://challenge01.root-me.org/web-serveur/ch52/',
            'solution' => 'e6f8a530811d5a479812d7b82fc1a5c5',
            'level'    => 3,
            'notice'   => 'Hack la redirection et jette un oeil au network pour capturer le drapeau',
        ],
        [
            'name'     => '[Web client] Javascript - Obfuscation',
            'url'      => 'http://challenge01.root-me.org/web-client/ch4/ch4.html',
            'solution' => 'cpasbiendurpassword',
            'level'    => 3,
            'notice'   => 'Craque le mot de passe pour capturer le drapeau',
        ],
        [
            'name'     => '[Web Server] HTTP - Directory indexing',
            'url'      => 'http://challenge01.root-me.org/web-serveur/ch4/',
            'solution' => 'LINUX',
            'level'    => 3,
            'notice'   => 'Recherche dans les entrailles du serveur',
        ],
        [
            'name'     => '[Cryptanalyse] HTTP - Directory indexing',
            'url'      => 'http://challenge01.root-me.org/cryptanalyse/ch8/ch8.txt',
            'solution' => 'Encodage ASCII',
            'level'    => 1,
            'notice'   => 'Decode pour capturer le drapeau',
        ],

    ];

    public function load(ObjectManager $manager)
    {
        $i = 1;
        foreach (self::CHALLENGES as $challengeData) {
            $challenge = new Challenge();
            $challenge->setName($challengeData['name']);
            $challenge->setUrl($challengeData['url']);
            $challenge->setSolution($challengeData['solution']);
            $challenge->setLevel($challengeData['level']);
            $challenge->setStep($i);
            $challenge->setNotice($challengeData['notice']);
            $manager->persist($challenge);
            $i++;
        }
        $manager->flush();
    }
}
