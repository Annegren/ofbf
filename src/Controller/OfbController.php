<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OfbController extends AbstractController
{
    #[Route('/ofb', name: 'ofb')]
    public function index(): Response
    {
        return $this->render('ofb/index.html.twig', [
            'controller_name' => 'OfbController',
        ]);
    }
}
