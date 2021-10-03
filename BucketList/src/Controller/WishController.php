<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WishController extends AbstractController
{
    #[Route('/wish', name: 'wish')]
    public function index(): Response
    {
        return $this->render('wish/wish.html.twig', [
            'mapagewishes' => 'ma page de souhait',
        ]);
    }

    #[Route('/detail/{id}', name:'detail_wish')]
     public function detail($id):Response
    {
        return $this->render('/wish/detail.html.twig',[
           'detail_souhait'=>'pade des details' ,
        ]);
    }



}
