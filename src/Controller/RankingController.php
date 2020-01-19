<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RankingController extends AbstractController
{
    /**
     * @Route("/ranking", name="ranking")
     */
    public function index(UserRepository $userRepository)
    {
        $users = $userRepository->getRanking();
        return $this->render('ranking/index.html.twig', [
            'users' => $users,
        ]);
    }
}
