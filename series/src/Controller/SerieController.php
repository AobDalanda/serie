<?php

namespace App\Controller;

use App\Entity\Serie;
use App\Repository\SerieRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SerieController extends AbstractController
{
    #[Route('/series', name: 'series_list')]
    public function list(EntityManagerInterface $entityManager, SerieRepository $repository): Response
    {
        //TODO Afficher la liste des séries
        $listeSerie=new Serie();
        //$listeSerie=$repository->findBy(['status'=>'ended']);
       // $listeSerie=$repository->findBy(['status'=>'ended'], ['vote'=>'DESC'],20);
        //$listeSerie=$entityManager->getRepository(Serie::class)->findAll();
        $listeSerie=$repository->findEndedSeries();
     //insertion d'un serie
        // création d'une instance de serie
         $serie=new Serie();
        $serie->setPoster('poster')
            ->setVote(8.2)
            ->setDateCreated(new \DateTime())
            ->setName('Sliders')
            ->setTmdbId(123456)
            ->setStatus('Ended')
            ->setPopularity(800.25)
            ->setBackdrop('backdrop')
            ->setGenres('SF')
            ->setFirstAirDate(new \DateTime("-15 years"));
        dump($serie);
        $entityManager->persist($serie);
         $entityManager->flush();
        dump($serie);
        $serie->setName('Slider de Sidy');
        $entityManager->persist($serie);
        $entityManager->flush();
        dump($serie);
        $entityManager->remove($serie);
        $entityManager->flush();
        dump($serie);
        return $this->render('serie/list.html.twig', [
            'listeserie'=>$listeSerie,
        ] );
    }

    #[Route('/series/detail/{id}', name:'serie_details'  )]
    public function detail($id=1,  EntityManagerInterface $entityManager, SerieRepository $repository  ):Response
    {
       $detailserie=$repository->find($id);
       //TODO afficher le detail d'une serie
        //dd($detailserie);
      return $this->render('serie/detail.html.twig',[
               'detailserie'=>$detailserie
          ]);
    }

    #[Route('/series/create', name:'create_serie')]
    public function create():Response
    {
        dump("bonjour");
       return $this->render('serie/create.html.twig');
    }
}
