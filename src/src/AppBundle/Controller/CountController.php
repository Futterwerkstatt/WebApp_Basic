<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CountController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function countAction(){

        $repository = $this->getDoctrine()->getRepository('AppBundle:Holiday');
        $count = $repository->countOpen();

        return $this->render('nav.html.twig', array(
            'count' => $count
        ));
    }
}
