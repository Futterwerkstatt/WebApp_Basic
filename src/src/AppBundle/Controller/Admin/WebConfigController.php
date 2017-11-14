<?php

namespace AppBundle\Controller\Admin;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


/**
 * WebConfig controller.
 *
 * @Route("/admin")
 */
class WebConfigController extends Controller
{

    /**
     * Displays a form to edit an existing WebConfig entity.
     *
     * @Route("/config", name="admin_config")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $webConfig = $em->getRepository('AppBundle:WebConfig')->findOneBy(array('id'=>1));  
        
        $editForm = $this->createForm('AppBundle\Form\WebConfigType', $webConfig);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $webConfig->setUpdatedAt(new \DateTime);
            $em->persist($webConfig);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.success.message');
        }

        return $this->render('admin/webconfig.html.twig', array(
            'webConfig' => $webConfig,
            'edit_form' => $editForm->createView()
        ));
    }

}
