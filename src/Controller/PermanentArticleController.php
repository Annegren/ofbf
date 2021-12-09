<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PermanentArticleRepository;
use App\Entity\PermanentArticle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


/**
 * @Route("/adherer", name="adherer")
 */
class PermanentArticleController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */    
    public function index(): Response
    {
        $permanentArticles = $this->getDoctrine()
            ->getRepository(PermanentArticle::class)
            ->findAll();

        return $this->render('adherer/index.html.twig', [
            'permanentArticle' => $permanentArticles,
        ]);
    }

}
