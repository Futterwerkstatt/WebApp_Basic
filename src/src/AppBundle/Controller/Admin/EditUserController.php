<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Form\EditUserType;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Form\Factory\FactoryInterface;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * EditUser controller.
 *
 * @Route("/admin")
 */
class EditUserController extends Controller
{

    /**
     * @Route("/editUser/{id}", name="editUser")
     * @param Request $request
     * @param $id
     * @return array|RedirectResponse
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->findOneBy(array(
            'id'    => $id
        ));

        $form = $this->createForm(EditUserType::class, $user);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->persist($user);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_userlist', array()));
        }

        return $this->render('admin/edituser.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}