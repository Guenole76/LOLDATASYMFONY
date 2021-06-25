<?php

namespace App\Controller;

use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChampionController extends AbstractController
{
    /**
     * @Route("/champion/{champion}", name="champion")
     */
    public function index(string $champion ,CallApiService $callApiService): Response
    {
        return $this->render('champion/index.html.twig', [
            'data' => $callApiService->getChampionData($champion),
        ]);
    }
}
