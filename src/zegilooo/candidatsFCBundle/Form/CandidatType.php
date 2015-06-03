<?php

namespace zegilooo\candidatsFCBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CandidatType extends AbstractType
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
            ->add('nom_de_naissance')
            ->add('nom_marital')
            ->add('prenom')
            ->add('date_naissance','date',array(
				'widget' => 'single_text',
				'format' => 'dd/MM/yyyy',
				'attr' => array('class' => 'date')
				))
            ->add('sexe', 'choice', array(
                'empty_value' => 'Choisissez une option',
                'choices'   => array('m' => 'M', 'f' => 'F'),
                )
            )
            ->add('departement_naissance')
            ->add('situation_de_famille')
            ->add('adresse')
            ->add('complement_adresse')
            ->add('code_postal')
            ->add('ville')
            ->add('telephone')
            ->add('email')
            ->add('emploi_statut')
            ->add('emploi_metier')
            ->add('emploi_fonction')
            ->add('emploi_secteur_activite')
            ->add('chomeur_categorie')
            ->add('chomeur_date_inscription_anpe','date',array(
                'required' => false,
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => array('class' => 'date')
                ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'zegilooo\candidatsFCBundle\Entity\Candidat'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'zegilooo_candidatsfcbundle_candidat';
    }
}
