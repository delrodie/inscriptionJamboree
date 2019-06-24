<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ParoisseController
 * @Route("/groupe")
 */
class ParoisseController extends Controller
{
    /**
     * @Route("/", name="paroisse_liste")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $paroisseID = $request->get('paroisse'); //dump($paroisseID);die();
        $em = $this->getDoctrine()->getManager();
        $paroisse = $em->getRepository("AppBundle:Paroisses")->findOneBy(['id'=>$paroisseID]);
        $participants = $em->getRepository("AppBundle:Inscriptions")->findListeByParoisse($paroisse);
        $districts = $em->getRepository("AppBundle:Districts")->findListeByRegion($paroisse->getRegion());
        $effectif = $em->getRepository("AppBundle:Inscriptions")->findEffectifByparoisse($paroisse);
        $paroisses = $em->getRepository("AppBundle:Paroisses")->findListeByDistrict($paroisse->getDistrict());
        return $this->render('default/participant_paroisse.html.twig',[
            'paroisse' => $paroisse,
            'districts' => $districts,
            'participants' => $participants,
            'paroisses' => $paroisses,
            'effectif' => $effectif,
        ]);
    }
}
