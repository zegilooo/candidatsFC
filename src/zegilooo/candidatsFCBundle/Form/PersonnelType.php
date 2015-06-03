<?php

namespace zegilooo\candidatsFCBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonnelType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('civilite', 'choice', array(
                'empty_value' => 'Choisissez une option',
                'choices'   => array('Monsieur' => 'Monsieur', 'Madame' => 'Madame'),
                )
            )
            ->add('nom')
            ->add('prenom')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'zegilooo\candidatsFCBundle\Entity\Personnel'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'zegilooo_candidatsfcbundle_personnel';
    }
}
