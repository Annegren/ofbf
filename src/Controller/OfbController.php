<?php

namespace App\Controller;

use App\Entity\Ofb;
use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


/**
 * @Route("/ofb", name="ofb_")
 */
class OfbController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(string $ofbs): Response
    {
        $ofbs = $this->getDoctrine()
            ->getRepository(Ofb::class)
            ->findAll();

            

        return $this->render('ofb/index.html.twig', [
            'ofbs' => $ofbs,
        ]);
    }

    /**
     * @Route ("/{ofbName}", methods={"GET"}, name="show")
     */
    public function show(string $ofbName): Response
    {
        $ofbs = $this->getDoctrine()
            ->getRepository(Ofb::class)
            ->findOneBy(['name' => $ofbName]);

        if (!$ofbs) {
            throw $this->createNotFoundException(
                'Sorry we have not this category in our program'
            );
        }

        $articles = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findBy(['ofb' => $ofbs->getId()], ['id' => 'DESC'], 3);

        return $this->render('ofb/show.html.twig', [
            'articles' => $articles,
            'ofbs' => $ofbs,


        ]);
    }
}
