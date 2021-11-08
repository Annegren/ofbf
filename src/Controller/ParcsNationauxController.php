<?php

namespace App\Controller;

use App\Entity\ParcsNationaux;
use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


/**
 * @Route("/parcsnationaux", name="parcsnationaux_")
 */
class ParcsNationauxController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        $parcsNationauxs = $this->getDoctrine()
            ->getRepository(ParcsNationaux::class)
            ->findAll();

        return $this->render('parcsNationaux/index.html.twig', [
            'parcsNationauxs' => $parcsNationauxs,
        ]);
    }

    /**
     * @Route ("/{parcsNationauxName}", methods={"GET"}, name="show")
     */
    public function show(string $parcsNationauxName): Response
    {
        $parcsNationauxs = $this->getDoctrine()
            ->getRepository(ParcsNationaux::class)
            ->findOneBy(['name' => $parcsNationauxName]);

        if (!$parcsNationauxs) {
            throw $this->createNotFoundException(
                'Sorry we have not this category in our program'
            );
        }

        $articles = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findBy(['parcsNationaux' => $parcsNationauxs->getId()], ['id' => 'DESC'], 3);

        return $this->render('parcsNationaux/show.html.twig', [
            'articles' => $articles,
            'parcsNationauxs' => $parcsNationauxs,


        ]);
    }
}
