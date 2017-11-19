<?php

namespace AppBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


/**
 * WebConfig controller.
 *
 * @Route("/admin")
 */
class AllUserController extends Controller
{
    /**
     * @Route("/userlist", name="admin_userlist")
     */
    public function usersAction() {
        //access user manager services

        #$userManager = $container->get('fos_user.user_manager');
        $userManager = $this->get('fos_user.user_manager');
        $users = $userManager->findUsers();

        return $this->render('admin/userlist.html.twig', array('users' =>   $users));
    }
}
