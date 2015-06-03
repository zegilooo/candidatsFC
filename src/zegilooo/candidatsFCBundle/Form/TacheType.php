<?php

namespace zegilooo\candidatsFCBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TacheType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('processus', 'entity', array(
                    'class' => 'zegilooocandidatsFCBundle:Processus',
                    'empty_value' => 'Choisissez une option',
                ))
            ->add('responsable', 'entity', array(
                    'class' => 'zegilooocandidatsFCBundle:Personnel',
                    'empty_value' => 'Choisissez une option',
                ))
            ->add('acteur', 'entity', array(
                    'class' => 'zegilooocandidatsFCBundle:Personnel',
                    'empty_value' => 'Choisissez une option',
                ))
            ->add('suppleant', 'entity', array(
                    'class' => 'zegilooocandidatsFCBundle:Personnel',
                    'empty_value' => 'Choisissez une option',
                ))
            ->add('numDansProcessus')
            ->add('conditionPrerequise')
            ->add('conditionFinExecution')
            ->add('libelle')
            ->add('descriptif')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'zegilooo\candidatsFCBundle\Entity\Tache'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'zegilooo_candidatsfcbundle_tache';
    }
}
