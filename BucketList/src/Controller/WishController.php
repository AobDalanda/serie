<?php

namespace App\Controller;

use App\Repository\WishRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WishController extends AbstractController
{
    #[Route('/wish', name: 'wish')]
    public function index(EntityManagerInterface $entityManager, WishRepository $repository): Response
    {
        $listDesSouhaits=$repository->findBy([], ['dateCreated'=>'desc']);
        return $this->render('wish/wish.html.twig', [
            'listeSouhait' => $listDesSouhaits,
        ]);
    }

    #[Route('/detail/{id}', name:'detail_wish')]
     public function detail($id, WishRepository $repository):Response
    {

        $detailsWish=$repository->findby(['id'=>$id]);

        return $this->render('/wish/detail.html.twig',[
           'detail_souhait'=>$detailsWish ,
        ]);
    }



}
