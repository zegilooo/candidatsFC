<?php

namespace zegilooo\candidatsFCBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DossierSuiviType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('candidat', 'entity', array(
                    'class' => 'zegilooocandidatsFCBundle:Candidat',
                    'empty_value' => 'Choisissez une option',
                ))
            ->add('typePrestation', 'entity', array(
                    'class' => 'zegilooocandidatsFCBundle:TypePrestation',
                    'empty_value' => 'Choisissez une option',
                ))
            ->add('typeFC', 'entity', array(
                    'class' => 'zegilooocandidatsFCBundle:TypeFC',
                    'empty_value' => 'Choisissez une option',
                ))
            ->add('commentaire')
            ->add('idPersonnelFC', 'entity', array(
                    'class' => 'zegilooocandidatsFCBundle:Personnel',
                    'empty_value' => 'Choisissez une option',
                ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'zegilooo\candidatsFCBundle\Entity\DossierSuivi'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'zegilooo_candidatsfcbundle_dossiersuivi';
    }
}
