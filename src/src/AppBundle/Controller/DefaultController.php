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
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            //'debug' => $this->getUser(),
        ]);
    }

    /**
     * @Route("/chef", name="chef")
     */
    public function indexListAction(Request $request)
    {

        $em = $this->getDoctrine()->getRepository('AppBundle:Holiday');
        $query = $em->createQueryBuilder('u')
            ->where('u.accept = 0')
            ->getQuery();
        $user = $query->getResult();

        var_dump($user);

        return $this->render('default/chef.html.twig', array(
            'list' => $user
        ));
    }
}
