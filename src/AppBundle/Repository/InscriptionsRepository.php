<?php

namespace AppBundle\Repository;

/**
 * InscriptionsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class InscriptionsRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Effectif total des participants
     *
     */
    public function findEffectifGlobal()
    {
        return $this->createQueryBuilder('i')
                    ->select('count(i.id)')
                    ->where('i.cpmTransStatus = :ok')
                    ->setParameter('ok', 'ACCEPTED')
                    ->getQuery()->getSingleScalarResult()
            ;
    }
    /**
     * Effectif des participants par region
     * RegionController::indexAction
     */
    public function findEffectifByRegion($region)
    {
        return $this->createQueryBuilder('i')
                    ->select('count(i.id)')
                    ->where('i.region = :region')
                    ->andWhere('i.cpmTransStatus = :ok')
                    ->setParameters([
                        'region' => $region,
                        'ok' => 'ACCEPTED'
                    ])
                    ->getQuery()->getSingleScalarResult()
            ;
    }
    /**
     * Effectif des participants par district
     * DistrictController::indexAction
     */
    public function findEffectifByDistrict($district)
    {
        return $this->createQueryBuilder('i')
            ->select('count(i.id)')
            ->where('i.district = :district')
            ->andWhere('i.cpmTransStatus = :ok')
            ->setParameters([
                'district' => $district,
                'ok' => 'ACCEPTED'
            ])
            ->getQuery()->getSingleScalarResult()
            ;
    }
    /**
     * Effectif des participants par paroisse
     * ParoisseController::indexAction
     */
    public function findEffectifByparoisse($paroisse)
    {
        return $this->createQueryBuilder('i')
            ->select('count(i.id)')
            ->where('i.paroisse = :paroisse')
            ->andWhere('i.cpmTransStatus = :ok')
            ->setParameters([
                'paroisse' => $paroisse,
                'ok' => 'ACCEPTED'
            ])
            ->getQuery()->getSingleScalarResult()
            ;
    }

    /**
     * Liste des participants de la region
     */
    public function findListeRegion($region)
    {
        return $this->createQueryBuilder('i')
                    ->where('i.region = :region')
                    ->andWhere('i.cpmTransStatus = :statut')
                    ->setParameters([
                        'region' => $region,
                        'statut' => 'ACCEPTED'
                    ])
                    ->getQuery()->getResult()
            ;
    }

    /**
     * Liste des participants du district
     * DistrictController::indexAction
     */
    public function findListeByDistrict($district)
    {
        return $this->createQueryBuilder('i')
                    ->where('i.district = :district')
                    ->andWhere('i.cpmTransStatus = :statut')
                    ->orderBy('i.lastname', 'ASC')
                    ->addOrderBy('i.firstname', 'ASC')
                    ->setParameters([
                        'district' => $district,
                        'statut' => 'ACCEPTED'
                    ])
                    ->getQuery()->getResult()
            ;
    }

    /**
     * Liste des participants par paroisse
     * ParoisseController::indexAction
     */
    public function findListeByParoisse($paroisse)
    {
        return $this->createQueryBuilder('i')
                    ->where('i.paroisse = :paroisse')
                    ->andWhere('i.cpmTransStatus = :statut')
                    ->orderBy('i.lastname', 'ASC')
                    ->addOrderBy('i.firstname', 'ASC')
                    ->setParameters([
                        'paroisse' => $paroisse,
                        'statut' => 'ACCEPTED'
                    ])
                    ->getQuery()->getResult()
            ;
    }
}
