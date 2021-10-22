<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
   /**
    * @Route("/article", name="article_")
    */
public function index(): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }

/**
  * @Route ("/article/{id}", requirements={"id"="\d+"}, methods={"GET"}, name="show")
  */
  public function show(int $id): Response
  {
      return $this->render('article/show.html.twig', [
          'id' => $id,
      ]);
  }
}
