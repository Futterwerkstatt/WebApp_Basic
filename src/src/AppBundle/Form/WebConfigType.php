<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use AppBundle\Entity\WebConfig;

class WebConfigType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $config = $options['data'];
        $themes = $config->getThemeConfig();
        //var_dump( $config ); die();

        $builder
                ->add('websiteName')
                ->add('websiteDescription')
                ->add('fontAwesomeEnable', CheckboxType::class, [
                    'label' => 'Enable Font Awesome',
                    'required' => false
                ])
                ->add('fontAwesomeCSS', UrlType::class, [
                    'label' => "Font Awesome CSS", 'disabled' => true
                ])
                ->add('bootstrapTheme', ChoiceType::class, [
                    'choices' => $themes,
                    'label' => "Theme",
                ])
                ->add('bootstrapEnable', CheckboxType::class, [
                    'label' => 'Enable Bootstrap Theme',
                    'required' => false
                ])
                ->add('bootstrapCSS', UrlType::class, [
                    'label' => "Bootstrap CSS", 'disabled' => true
                ])
                ->add('bootstrapJS', UrlType::class, [
                    'label' => "Bootstrap JS", 'disabled' => true
                ])
                ->add('jQuery', UrlType::class, [
                    'label' => "jQuery", 'disabled' => true
                ])

            #    ->add('urlFacebook', UrlType::class, [
            #        'label' => "Facebook Page",
            #        'required' => false
            #    ])
            #   ->add('urlInstagram', UrlType::class, [
            #        'label' => "Instagram",
            #        'required' => false
            #   # ])
              #  ->add('urlTwitter', UrlType::class, [
            #        'label' => "Twitter",
            #        'required' => false
            #    ])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\WebConfig'
        ));
    }

}
