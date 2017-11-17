<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class TeamController extends Controller
{
    /**
     * @Route("/team", name="team")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/team.html.twig', [
            //'debug' => $this->getUser(),
        ]);
    }

    // User Daten holen
    /**
     * @Route("/team", name="team")
     */
    public function indexListAction(Request $request)
    {

        $em = $this->getDoctrine()->getRepository('AppBundle:Holiday');
        $query = $em->createQueryBuilder('u')
            ->getQuery();
        $user = $query->getResult();

        return $this->render('list.html.twig', array(
            'list' => $user
        ));
    }
}
