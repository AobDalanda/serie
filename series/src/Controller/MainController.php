<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'mainhome')]
    public function index(): Response
    {
       //die("bonjour");
        /*
        return $this->render('main/index.html.twig', [
            'controller_name' => 'Bonjour sidy barrycls
            ',
        ]);
        */

        return $this->render('main/index.html.twig',[
            "monmessage"=>"Je suis super content"
        ]);

    }
}
