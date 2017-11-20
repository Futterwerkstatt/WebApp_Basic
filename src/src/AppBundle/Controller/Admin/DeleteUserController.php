<?php

namespace AppBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DeleteUserController extends Controller
{
    /**
     * Delete user.
     * @Route("/deleteUser/{id}", name="deleteUser")
     * @param Request $request
     * @return Response
     */
    public function DeleteUserAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->findOneBy(array(
            'id' => $id
        ));

        $em->remove($user);
        $em->flush();
        $this->get('session')->getFlashBag()->add('success', 'admin.delete.user');

        return $this->redirectToRoute('admin_userlist');
    }
}


