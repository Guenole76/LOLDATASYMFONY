<?php

namespace App\Controller;

use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SummonerController extends AbstractController
{
    /**
     * @Route("/summoner/{summoner}", name="summoner")
     */
    public function index(string $summoner ,CallApiService $callApiService): Response
    {
        return $this->render('summoner/index.html.twig', [
            'data' => $callApiService->getSummonerData($summoner),
        ]);
    }
}
