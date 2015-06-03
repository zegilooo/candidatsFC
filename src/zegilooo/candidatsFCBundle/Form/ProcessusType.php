<?php

namespace zegilooo\candidatsFCBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProcessusType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('responsable', 'entity', array(
                    'class' => 'zegilooocandidatsFCBundle:Personnel',
                    'empty_value' => 'Choisissez une option',
                ))
            ->add('libelle')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'zegilooo\candidatsFCBundle\Entity\Processus'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'zegilooo_candidatsfcbundle_processus';
    }
}
