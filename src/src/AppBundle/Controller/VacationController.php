<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Holiday;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Session\Session;

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
     * @param $entityManager
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
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

    public function insertAction(Request $request)
    {
        // User ID
        $token = $this->get('security.token_storage');
        $token = $token->getToken()->getUser()->getId();

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new Holiday());
        $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                #if ($form->isSubmitted()){

                $holiday = $form->getData();

                $holiday->setUserid($token);
                $holiday->setHolidayFrom(new \DateTime('tomorrow noon'));
                $holiday->setHolidayTo(new \DateTime('tomorrow noon'));
                $holiday->setDays('0');
                $holiday->setAccept('0');
                $holiday->setClosed('0');

                $em->persist($holiday);
                $em->flush();

                return $this->redirectToRoute('vacation');

            }
        return $this->redirectToRoute('vacation');
    }

    private function getErrorMessages(\Symfony\Component\Form\Form $form) {
        $errors = array();

        if ($form->hasChildren()) {
            foreach ($form->getChildren() as $child) {
                if (!$child->isValid()) {
                    $errors[$child->getName()] = $this->getErrorMessages($child);
                }
            }
        } else {
            foreach ($form->getErrors() as $key => $error) {
                $errors[] = $error->getMessage();
            }
        }

        return $errors;
    }
}