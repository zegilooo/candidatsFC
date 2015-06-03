<?php

namespace zegilooo\candidatsFCBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use zegilooo\candidatsFCBundle\Entity\TypePrestation;
use zegilooo\candidatsFCBundle\Form\TypePrestationType;

class TypePrestationController extends Controller
{
    public function ajouterAction(Request $request){
        $TypePrestation = new TypePrestation();
        $formulaire = $this->createForm(new TypePrestationType(), $TypePrestation);
        $formulaire->add("Envoyer", "submit");
        $formulaire->handleRequest($request);

        if ($formulaire->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($TypePrestation);
            $em->flush();

            return $this->redirect($this->generateUrl('zegilooocandidats_fc_liste_typepresta'));
        }

        return $this->render('zegilooocandidatsFCBundle:TypePrestation:ajouter.html.twig', 
                                array(
                                    'formulaire' => $formulaire->createView(),
                                    'action'=>'ajouter'
                                    )
                            );
    }

    public function modifierAction(Request $request, $id = null){
        $em = $this->getDoctrine()->getManager();
        $TypePrestation = $em->find('zegilooocandidatsFCBundle:TypePrestation', $id);
        if (!$TypePrestation) 
          {
            throw new NotFoundHttpException("TypePrestation non trouvé");
          }
        $formulaire = $this->createForm(new TypePrestationType(), $TypePrestation);
        $formulaire->add("Envoyer", "submit");
        $formulaire->handleRequest($request);

        if ($formulaire->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($TypePrestation);
            $em->flush();

            return $this->redirect($this->generateUrl('zegilooocandidats_fc_liste_typepresta'));
        }

        return $this->render('zegilooocandidatsFCBundle:TypePrestation:ajouter.html.twig', 
                                array(
                                'formulaire' => $formulaire->createView(),
                                'action'=>'modifier'
                                )
                            );
    }
    public function supprimerAction(Request $request, $id = null){
        $em = $this->getDoctrine()->getManager();
        $TypePrestation = $em->find('zegilooocandidatsFCBundle:TypePrestation', $id);
        if (!$TypePrestation) 
          {
            throw new NotFoundHttpException("TypePrestation non trouvé");
          }
          $em->remove($TypePrestation);
          $em->flush();
        return $this->redirect($this->generateUrl('zegilooocandidats_fc_liste_typepresta'));
    }

    public function listerAction(){
        $repository = $this->getDoctrine()->getRepository('zegilooocandidatsFCBundle:TypePrestation');
        $TypePrestation = $repository->findAll();        
        return $this->render('zegilooocandidatsFCBundle:TypePrestation:lister.html.twig', array('TypePrestation' => $TypePrestation));
    }

}

