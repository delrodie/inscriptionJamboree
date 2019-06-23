<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Regions;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use  Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

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
}
