<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{

    #[Route('/', name:'homepages')]
     public function home():Response
    {
        return $this->render('home/index.html.twig',[
            "homeMessage"=>"La page home de mon index"
        ]);
    }

    #[Route('/about', name:'Aboutus')]
    public function about():Response
    {
        return $this->render('main/about.html.twig',[
            'messageAbout'=>'je suis dan ma page about'
        ]);
    }
}
