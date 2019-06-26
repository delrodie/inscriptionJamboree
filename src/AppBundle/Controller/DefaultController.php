<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $regions = $em->getRepository("AppBundle:Regions")->findRegion();
        $global = $em->getRepository("AppBundle:Inscriptions")->findEffectifGlobal();
        $femme = $em->getRepository("AppBundle:Inscriptions")->findEffectifByGender('femme');
        $homme = $em->getRepository("AppBundle:Inscriptions")->findEffectifByGender('homme');
        $adulte = $em->getRepository("AppBundle:Inscriptions")->findEffectifByAdulte();
        $jeune = $em->getRepository("AppBundle:Inscriptions")->findEffectifByJeune();
        return $this->render('default/index.html.twig', [
            'regions' => $regions,
            'global' => $global,
            'femme' => $femme,
            'homme' => $homme,
            'adulte' => $adulte,
            'jeune' => $jeune
        ]);
    }

    /**
     * @Route("/region", name="region")
     */
    public function regionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $regions = $em->getRepository("AppBundle:Regions")->findRegion();
        return $this->render("default/region_liste.html.twig",[
            'regions' => $regions,
        ]);
    }

    /**
     * @Route("/branche", name="branche")
     */
    public function brancheAction()
    {
        $em = $this->getDoctrine()->getManager();
        $branches = $em->getRepository("AppBundle:Branches")->findAll();
        return $this->render("default/branche_liste.html.twig",[
            'branches' => $branches,
        ]);
    }

    /**
     * Liste globales des participants
     * @Route("/liste-globale-des-participants", name="participant_global")
     */
    public function participantAction()
    {
        $em = $this->getDoctrine()->getManager();
        $participants = $em->getRepository("AppBundle:Inscriptions")->findBy(["cpmTransStatus"=>'ACCEPTED']);
        $global = $em->getRepository("AppBundle:Inscriptions")->findEffectifGlobal();
        return $this->render("default/participant_global.html.twig",[
            'participants' => $participants,
            'global' => $global
        ]);
    }
}
