<?php

namespace App\Repository;

use App\Entity\Serie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Serie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Serie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Serie[]    findAll()
 * @method Serie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SerieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Serie::class);
    }
    //creation d'une methode de selection avec dql
        public function findEndedSeries(){
            $entityManager=$this->getEntityManager();
            $dql="select s FROM  App\Entity\Serie s
             where s.status='Ended' AND s.vote >= 8.7 ";
            $query=$entityManager->createQuery($dql);
            return $query->getResult();
        }
    //creation d'une methode avec QueryBuilder
       public function findserieByStatus($status,int $page){
          $queryBuilder= $this->createQueryBuilder('s');
           $queryBuilder->distinct(true)
               ->andWhere('s.status = :varstatus')
               ->setParameter('varstatus',$status)
               ->orderBy('s.name', 'desc') ;
            //si ma limite est 20
           $limite=7;
           //calcul de l'offset
           $offset=($page-1)*$limite;
                 $query=  $queryBuilder->getQuery();
                 $query->setFirstResult($offset);
              $query->setMaxResults($limite);
             $resultat=$query->getResult();
             return $resultat;
       }

       public function findAllSerieByStatus($status)
       {
           $queryBuilder= $this->createQueryBuilder('s');
           $queryBuilder->select('count(s.id)')
               ->andWhere('s.status = :varstatus')
               ->setParameter('varstatus',$status)  ;
           $query=  $queryBuilder->getQuery();

           $resultat=$query->getSingleScalarResult();

           return $resultat;
       }

    // /**
    //  * @return Serie[] Returns an array of Serie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Serie
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
