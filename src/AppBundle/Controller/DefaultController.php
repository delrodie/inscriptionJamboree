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
        return $this->render('default/index.html.twig', [
            'regions' => $regions,
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
}
