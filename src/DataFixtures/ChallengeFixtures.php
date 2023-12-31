<?php

namespace App\DataFixtures;

use App\Entity\Challenge;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ChallengeFixtures extends Fixture
{
    const CHALLENGES = [
        [
            'name'     => '[Web client] HTML - Code Source',
            'url'      => 'http://challenge01.root-me.org/web-serveur/ch1/',
            'solution' => 'nZ^&@q5&sjJHev0',
            'level'    => 1,
            'notice'   => 'Craque le mot de passe pour remporter le challenge. Si tu rencontres un problème pour afficher la page, je te rappelle que tu dois créer un compte sur root-me.org pour accéder à certains challenges',
        ],
        [
            'name'     => '[Web client] HTML - boutons désactivés',
            'url'      => 'http://challenge01.root-me.org/web-client/ch25/',
            'solution' => 'HTMLCantStopYou',
            'level'    => 1,
            'notice'   => 'Craque le mot de passe pour remporter le challenge',
        ],
        [
            'name'     => '[Cryptanalyse] Decode',
            'url'      => 'http://challenge01.root-me.org/cryptanalyse/ch8/ch8.txt',
            'solution' => '2ac376481ae546cd689d5b91275d324e',
            'level'    => 1,
            'notice'   => 'Decode pour remporter le challenge',
        ],
        [
            'name'     => '[Web client] Javascript - Authentification',
            'url'      => 'http://challenge01.root-me.org/web-client/ch9/',
            'solution' => 'sh.org',
            'level'    => 1,
            'notice'   => 'Craque le mot de passe pour remporter le challenge',
        ],
        [
            'name'     => '[Web server] Very very low password',
            'url'      => 'http://challenge01.root-me.org/web-serveur/ch3/',
            'solution' => 'admin',
            'level'    => 1,
            'notice'   => 'Craque le mot de passe pour remporter le challenge',
        ],
        [
            'name'     => '[Web client] Rand Game',
            'url'      => 'http://challenge01.root-me.org/web-serveur/ch56/',
            'solution' => 'H7tp_h4s_N0_s3Cr37S_F0r_y0U',
            'level'    => 1,
            'notice'   => 'Triche pour gagner et récupérer le mot de passe',
        ],
        [
            'name'     => '[Web client] Hack la banque',
            'url'      => 'https://hackxor.net/mission?id=1',
            'solution' => '13780',
            'level'    => 2,
            'notice'   => 'Entre le montant de la balance du compte en banque N°16554987 pour remporter le challenge',
        ],
        [
            'name'     => '[Web client] Admin usurpation',
            'url'      => 'https://www.newbiecontest.org/epreuves/hacking/ep3/index.php?epreuveid=sdqufhdsqf54sq65df4&numid=qsd46ds5qf65d&forum=sdf4ds&admin=false&mysqlid=sdqsq6f46d5sqsdf65ds4q6f46d5sq4f56ds4qf654dsq6f54dqs56f4dsqf4f',
            'solution' => 'magical',
            'level'    => 2,
            'notice'   => 'Fais toi passer pour l\'admin',
        ],
        [
            'name'     => '[Web client] Javascript - Source',
            'url'      => 'http://challenge01.root-me.org/web-client/ch1',
            'solution' => '123456azerty',
            'level'    => 2,
            'notice'   => 'Craque le mot de passe pour remporter le challenge',
        ],
        [
            'name'     => '[XSS] Hack la recherche',
            'url'      => 'https://xss-game.appspot.com/level1',
            'solution' => 'Persistence is key',
            'level'    => 2,
            'notice'   => 'Injecte une alert(). Une fois réussi, entre le titre exact du niveau 2 de xss-game pour remporter le challenge',
        ],
        [
            'name'     => '[Web client] Usurpation de navigateur',
            'url'      => 'http://change-browser.hax.w3challs.com/',
            'solution' => 'W3C{now_that_we_have_the_right_browser_lets_get_the_party_started}',
            'level'    => 3,
            'notice'   => 'Fais passer ton navigateur pour un autre',
        ],
        [
            'name'     => '[Web client] Javascript - Obfuscation',
            'url'      => 'http://challenge01.root-me.org/web-client/ch4/ch4.html',
            'solution' => 'cpasbiendurpassword',
            'level'    => 3,
            'notice'   => 'Craque le mot de passe pour remporter le challenge',
        ],
        [
            'name'     => '[Web Server] HTTP - Directory indexing',
            'url'      => 'http://challenge01.root-me.org/web-serveur/ch4/',
            'solution' => 'LINUX',
            'level'    => 3,
            'notice'   => 'Recherche dans les entrailles du serveur',
        ],
        [
            'name'     => '[Web server] Injection',
            'url'      => 'http://challenge01.root-me.org/web-serveur/ch9/',
            'solution' => 'TYsgv75zgtq',
            'level'    => 4,
            'notice'   => 'Récupère le mot de passe de user1',
        ],
        [
            'name'     => '[Web server] HTTP - Open redirect',
            'url'      => 'http://challenge01.root-me.org/web-serveur/ch52/',
            'solution' => 'e6f8a530811d5a479812d7b82fc1a5c5',
            'level'    => 4,
            'notice'   => 'Trouve un moyen de faire une redirection vers un domaine autre que ceux proposés sur la page web puis jette un oeil au network pour remporter le challenge',
        ],
        [
            'name'     => '[XSS] Tchat scripting',
            'url'      => 'https://xss-game.appspot.com/level2',
            'solution' => 'That sinking feeling...',
            'level'    => 4,
            'notice'   => 'Injecte une alert() dans le tchat. Une fois réussi, entre le titre exact du niveau 3 de xss-game pour remporter le challenge',
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
