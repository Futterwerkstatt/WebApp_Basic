<?php

namespace AppBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AllUserController extends Controller
{
    /**
     * @Route("/alluser", name="alluser")
     */
    public function usersAction() {
        //access user manager services

        #$userManager = $container->get('fos_user.user_manager');
        $userManager = $this->get('fos_user.user_manager');
        $users = $userManager->findUsers();

        return $this->render('admin/alluser.html.twig', array('users' =>   $users));
    }

    /**
     * @Route("/edit", name="edit")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editUserAction($id)
    {
        $user = $em->getRepository('AppBundle:User')->find($id);

        if (!is_object($user)) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        /** @var $formFactory \FOS\UserBundle\Form\Factory\FactoryInterface */
        $formFactory = $this->get('fos_user.profile.form.factory');

        $form = $formFactory->createForm();
        $form->setData($user);
        $form->handleRequest($request);

        if ($form->isValid()) {
            /** @var $userManager \FOS\UserBundle\Model\UserManagerInterface */
            $userManager = $this->get('fos_user.user_manager');
            $userManager->updateUser($user);

            $session = $this->getRequest()->getSession();
            $session->getFlashBag()->add('message', 'Successfully updated');
            $url = $this->generateUrl('matrix_edi_viewUser');
            $response = new RedirectResponse($url);

        }

        return $this->render('FOSUserBundle:Profile:edit.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
