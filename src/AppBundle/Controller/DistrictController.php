<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DistrictController
 * @Route("/district")
 */
class DistrictController extends Controller
{
    /**
     * Liste des participants par districts
     * @Route("/", name="district_liste")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $districtID = $request->get('district');
        $em = $this->getDoctrine()->getManager();
        $district = $em->getRepository("AppBundle:Districts")->findOneBy(['id'=>$districtID]);
        $participants = $em->getRepository("AppBundle:Inscriptions")->findListeByDistrict($districtID);
        $districts = $em->getRepository("AppBundle:Districts")->findListeByRegion($district->getRegion());
        $effectif = $em->getRepository("AppBundle:Inscriptions")->findEffectifByDistrict($district);
        $paroisses = $em->getRepository("AppBundle:Paroisses")->findListeByDistrict($district);
        return $this->render("default/participant_district.html.twig",[
            'district' => $district,
            'districts' => $districts,
            'participants' => $participants,
            'paroisses' => $paroisses,
            'effectif' => $effectif,
        ]);
    }
}
