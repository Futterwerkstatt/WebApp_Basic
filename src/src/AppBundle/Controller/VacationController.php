<?php

namespace AppBundle\Controller;

use Couchbase\DateRangeSearchFacet;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Finder\Iterator\DateRangeFilterIterator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class VacationController extends Controller
{

    /**
     * @Route("/vacation", name="vacation")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('vacation.html.twig', [
            //'debug' => $this->getUser(),
        ]);
    }


    /**
     * @Route("/vacation", name="vacation")
     */
   public function FormAction()
   {

       $form = $this->createFormBuilder()
           ->add('from', DateType::class, [
               'widget' => 'single_text',
               'format' => 'dd-MM-yyyy',
               'data' => new \DateTime()
           ])
           ->add('to', DateType::class, [
               'widget' => 'single_text',
               'format' => 'dd-MM-yyyy',
               'data' => new \DateTime()
           ])
           ->getForm();

       return $this->render('vacation.html.twig', ['form' => $form->createView()]);

    }
}