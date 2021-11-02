<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ParcsNationauxController extends AbstractController
{
    #[Route('/parcs/nationaux', name: 'parcs_nationaux')]
    public function index(): Response
    {
        return $this->render('parcs_nationaux/index.html.twig', [
            'controller_name' => 'ParcsNationauxController',
        ]);
    }
}
