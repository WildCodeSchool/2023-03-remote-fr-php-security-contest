<?php

namespace App\Controller;

use App\Repository\ChallengeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ChallengeController extends AbstractController
{
    /**
     * @Route("/challenge", name="challenge")
     */
    public function index(ChallengeRepository $challengeRepository, Request $request, EntityManagerInterface $em)
    {
        $challenges      = $challengeRepository->findAll();
        $solutionPosted  = $request->request->get('solution');
        $user            = $this->getUser();
        $challengeInProgress = $challengeRepository->findOneByStep($this->getUser()->getStepInProgress());

        if ($solutionPosted) {
            if ($solutionPosted === $challengeInProgress->getSolution()) {
                $user->setStepInProgress($user->getStepInProgress() + 1);
                $user->setLastCaptureAt(new \DateTime('now'));
                $em->flush();
                $this->addFlash('success', 'Congratulations !');
            } else {
                $this->addFlash('danger', 'Try again !');
            }
        }



        return $this->render('challenge/index.html.twig', [
            'challenges' => $challenges,
        ]);
    }
}
