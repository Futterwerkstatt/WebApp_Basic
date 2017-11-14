<?php

namespace AppBundle\Twig\Extension;

use Symfony\Bridge\Doctrine\RegistryInterface;

class WebConfigExtension extends \Twig_Extension implements \Twig_Extension_GlobalsInterface {

    protected $doctrine;

    public function __construct(RegistryInterface $doctrine) {
        $this->doctrine = $doctrine;
    }

    public function getGlobals() {
        return array(
            'webconfig' => $this->getWebConfig()
        );
    }

    public function getWebConfig() {
        $em = $this->doctrine->getManager();
        $webConfig = $em->getRepository('AppBundle:WebConfig')->findOneBy(array('id'=>1));
        return $webConfig;
    }

    public function getName() {
        return 'webconfig';
    }

}
