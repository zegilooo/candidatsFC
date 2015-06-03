<?php

namespace zegilooo\candidatsFCBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use zegilooo\candidatsFCBundle\Entity\Personnel;
use zegilooo\candidatsFCBundle\Form\PersonnelType;

class PersonnelController extends Controller
{
    public function ajouterAction(Request $request){
        $Personnel = new Personnel();
        $formulaire = $this->createForm(new PersonnelType(), $Personnel);
        $formulaire->add("Envoyer", "submit");
        $formulaire->handleRequest($request);

        if ($formulaire->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Personnel);
            $em->flush();

            return $this->redirect($this->generateUrl('zegilooocandidats_fc_liste_personnel'));
        }

        return $this->render('zegilooocandidatsFCBundle:Personnel:ajouter.html.twig', 
                                array(
                                    'formulaire' => $formulaire->createView(),
                                    'action'=>'ajouter'
                                    )
                            );
    }

    public function modifierAction(Request $request, $id = null){
        $em = $this->getDoctrine()->getManager();
        $Personnel = $em->find('zegilooocandidatsFCBundle:Personnel', $id);
        if (!$Personnel) 
          {
            throw new NotFoundHttpException("Personnel non trouvé");
          }
        $formulaire = $this->createForm(new PersonnelType(), $Personnel);
        $formulaire->add("Envoyer", "submit");
        $formulaire->handleRequest($request);

        if ($formulaire->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Personnel);
            $em->flush();

            return $this->redirect($this->generateUrl('zegilooocandidats_fc_liste_personnel'));
        }

        return $this->render('zegilooocandidatsFCBundle:Personnel:ajouter.html.twig', 
                                array(
                                'formulaire' => $formulaire->createView(),
                                'action'=>'modifier'
                                )
                            );
    }
    public function supprimerAction(Request $request, $id = null){
        $em = $this->getDoctrine()->getManager();
        $Personnel = $em->find('zegilooocandidatsFCBundle:Personnel', $id);
        if (!$Personnel) 
          {
            throw new NotFoundHttpException("Personnel non trouvé");
          }
          $em->remove($Personnel);
          $em->flush();
        return $this->redirect($this->generateUrl('zegilooocandidats_fc_liste_personnel'));
    }

    public function listerAction(){
        $repository = $this->getDoctrine()->getRepository('zegilooocandidatsFCBundle:Personnel');
        $Personnel = $repository->findAll();        
        return $this->render('zegilooocandidatsFCBundle:Personnel:lister.html.twig', array('Personnel' => $Personnel));
    }

}
