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

    // User Daten holen
    /**
     * @Route("/chef", name="chef")
     */
    public function indexListAction(Request $request)
    {

        $em = $this->getDoctrine()->getRepository('AppBundle:Holiday');
        $query = $em->createQueryBuilder('u')
            ->where('u.closed = 0')
            ->getQuery();
        $user = $query->getResult();

        return $this->render('default/chef.html.twig', array(
            'list' => $user
        ));
    }

    //Urlaub Akzeptiert in DB schreiben
    /**
     * @Route("/accept/{id}", name="accept")
     * @param $entityManager
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $accept = $em->getRepository('AppBundle:Holiday')->find($id);

        if (!$accept) {
            throw $this->createNotFoundException(
                'Not found for id '.$id
            );
        }

        $accept->setaccept('1');
        $accept->setclosed('1');
        $em->flush();

        return $this->redirectToRoute('chef');
    }

    //Urlaub abgelehnt in DB schreiben
    /**
     * @Route("/noaccept/{id}", name="noaccept")
     * @param $entityManager
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function updateNOAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $accept = $em->getRepository('AppBundle:Holiday')->find($id);

        if (!$accept) {
            throw $this->createNotFoundException(
                'Not found for id '.$id
            );
        }

        $accept->setaccept('0');
        $accept->setclosed('1');
        $em->flush();

        return $this->redirectToRoute('chef');
    }
}

