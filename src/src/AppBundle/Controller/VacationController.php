<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Holiday;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\HttpFoundation\Response;

class VacationController extends Controller
{
     /**
     * @Route("/vacation", name="vacation")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */

    public function insertAction(Request $request)
    {
        $holiday = new Holiday();

        $form = $this->createFormBuilder($holiday)
            ->add('holidayFrom', DateType::class, [
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'data' => new \DateTime()
            ])
            ->add('holidayTo', DateType::class, [
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'data' => new \DateTime()
            ])
            ->getForm();

        // User ID
        $token = $this->get('security.token_storage');
        $token = $token->getToken()->getUser();

        $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                $holiday = $form->getData();
                $em = $this->getDoctrine()->getManager();

                // difference between Date
                $hfrom = $holiday->getHolidayFrom()->format('Y-m-d');
                $hto = $holiday->getHolidayTo()->format('Y-m-d');

                $interval = new \DateTime($hfrom);
                $diffdays = $interval->diff(new \DateTime($hto));
                $days = $diffdays->format('%d');

                $holiday->setUser($token);
                $holiday->setdays($days);
                $holiday->setaccept('0');
                $holiday->setclosed('0');

                $em->persist($holiday);
                    try {
                        $em->flush();
                    } catch(\PDOException $e){
                        return new Response($e->getMessage());
                    }
                $this->get('session')->getFlashBag()->add('success', 'message.vacation.success.message');
            }
        return $this->render('vacation.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @param \Symfony\Component\Form\Form $form
     * @return array
     */
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