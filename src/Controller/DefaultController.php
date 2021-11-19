<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Services\MessageService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\MailerService;


class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="app_index")
     */
    public function index(): Response
    {
        return $this->render('default/index.html.twig', [
           'website' => 'OFB',
        ]);
    }


    /**
     * @Route("/contact", name="contact_")
     * @param Request $request
     * @param MessageService $messageService
     * @param MailerService $mailerService
     * @return Response
     */
     public function contact(Request $request, MessageService $messageService, MailerService $mailerService ): Response
    {
        $formContact = $this->createForm(type:ContactType::class, data:null);
        $formContact->handleRequest($request);

        if ($formContact->isSubmitted() && $formContact->isValid()) {
            $data = $formContact->getData();
        
            $mailerService->send(
                "hello@dev.fr",
                "ga.annegren@gmail.com",
                "nouveau message",
                "email/contact.html.twig",
                [
                    "name" => $data ['name'],
                    "description" => $data ['description']
                ]
             );

                $messageService->addSuccess('votre email ok');
            }

        return $this->render('default/contact.html.twig', [
            'formContact' => $formContact->createView()
        ]);
    
    }
}  