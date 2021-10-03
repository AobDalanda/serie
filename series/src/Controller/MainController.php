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
        return $this->render('main/index.html.twig',[
            "monmessage"=>"Je suis super content"
        ]);
    }

    #[Route('/test', name:'pagetest')]
    public function test():Response
    {
       return $this->render('main/test.html.twig',
       ["testmessage"=>"ma page de test" ]);
    }

    #[Route('/sidy', name:'mysidypage')]
     public function sidy():Response
    {
        return $this->render('sidy/sidy.html.twig',[
            'monnom'=>'sidy barry',
            'monadresse'=>'2 rue des tires'
        ]);
    }
}
