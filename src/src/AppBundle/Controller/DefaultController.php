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
            ->where('u.open = 1')
            ->getQuery();
        $user = $query->getResult();

        return $this->render('default/chef.html.twig', array(
            'list' => $user
        ));
    }

    /**
     * @Route("/accept/{id}", name="accept")
     * @param $entityManager
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexListUpdateAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('AppBundle:Holiday');

        // Accept DB
        $newaccept = '1';
        $accept = $query->findAll();

        foreach ($accept as $accept) {
            $accept->setaccept($newaccept);
            $em->persist($accept);
        }

        // Closed DB
        $newopen = '0';
        $open = $query->findAll();

        foreach ($open as $open) {
            $open->setopen($newopen);

        }

        // Closed DB
        $newclosed = '1';
        $closed = $query->findAll();

        foreach ($closed as $closed) {
            $closed->setclosed($newclosed);

        }

        // DB write
        $em->flush();

        return $this->redirectToRoute('chef');
    }
}

