<?php

namespace zegilooo\candidatsFCBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TypePrestationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'zegilooo\candidatsFCBundle\Entity\TypePrestation'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'zegilooo_candidatsfcbundle_typeprestation';
    }
}
