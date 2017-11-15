<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class TraineeController extends Controller
{
    /**
     * @Route("/trainee", name="trainee")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/team.html.twig', [
            //'debug' => $this->getUser(),
        ]);
    }

}