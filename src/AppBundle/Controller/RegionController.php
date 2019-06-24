<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Districts;
use AppBundle\Entity\Regions;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use  Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class RegionController
 * @Route("regions")
 */
class RegionController extends Controller
{
    /**
     * @Route("/{id}", name="region_effectif")
     * @Method("GET")
     */
    public function indexAction(Regions $region)
    {
        $em = $this->getDoctrine()->getManager();
        $nombre = $em->getRepository("AppBundle:Inscriptions")->findEffectifByRegion($region);
        return $this->render('default/nombre.html.twig', array('nombre' => $nombre));
    }

    /**
     * @Route("/{id}/statistiques", name="region_effectif_statistiques")
     * @Method("GET")
     */
    public function statistiqueAction(Regions $region)
    {
        $em = $this->getDoctrine()->getManager();
        $effectif = $em->getRepository("AppBundle:Inscriptions")->findEffectifByRegion($region);
        $global = $em->getRepository("AppBundle:Inscriptions")->findEffectifGlobal();
        return $this->render("default/pourcentage.html.twig",[
            'effectif' => $effectif,
            "global" => $global
        ]);
    }

    /**
     * @Route("/{id}/liste-des-participants", name="region_effectif_globale_liste")
     * @Method("GET")
     */
    public function listeAction(Regions $region)
    {
        $em = $this->getDoctrine()->getManager();
        $participants = $em->getRepository("AppBundle:Inscriptions")->findListeRegion($region);
        $effectif = $em->getRepository("AppBundle:Inscriptions")->findEffectifByRegion($region);
        $districts = $em->getRepository("AppBundle:Districts")->findListeByRegion($region);
        $paroisses = $em->getRepository("AppBundle:Paroisses")->findListeByRegion($region);
        return $this->render("default/participant_region.html.twig",[
            'region' => $region,
            'participants' => $participants,
            'effectif' => $effectif,
            'districts' => $districts,
            'paroisses' => $paroisses
        ]);
    }

}
