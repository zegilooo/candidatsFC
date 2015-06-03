<?php

namespace zegilooo\candidatsFCBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use zegilooo\candidatsFCBundle\Entity\Tache;
use zegilooo\candidatsFCBundle\Form\TacheType;

class TacheController extends Controller
{
    public function ajouterAction(Request $request){
        $Tache = new Tache();
        $formulaire = $this->createForm(new TacheType(), $Tache);
        $formulaire->add("Envoyer", "submit");
        $formulaire->handleRequest($request);

        if ($formulaire->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Tache);
            $em->flush();

            return $this->redirect($this->generateUrl('zegilooocandidats_fc_liste_tache'));
        }

        return $this->render('zegilooocandidatsFCBundle:Tache:ajouter.html.twig', 
                                array(
                                    'formulaire' => $formulaire->createView(),
                                    'action'=>'ajouter'
                                    )
                            );
    }

    public function modifierAction(Request $request, $id = null){
        $em = $this->getDoctrine()->getManager();
        $Tache = $em->find('zegilooocandidatsFCBundle:Tache', $id);
        if (!$Tache) 
          {
            throw new NotFoundHttpException("Tache non trouvé");
          }
        $formulaire = $this->createForm(new TacheType(), $Tache);
        $formulaire->add("Envoyer", "submit");
        $formulaire->handleRequest($request);

        if ($formulaire->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Tache);
            $em->flush();

            return $this->redirect($this->generateUrl('zegilooocandidats_fc_liste_tache'));
        }

        return $this->render('zegilooocandidatsFCBundle:Tache:ajouter.html.twig', 
                                array(
                                'formulaire' => $formulaire->createView(),
                                'action'=>'modifier'
                                )
                            );
    }
    public function supprimerAction(Request $request, $id = null){
        $em = $this->getDoctrine()->getManager();
        $Tache = $em->find('zegilooocandidatsFCBundle:Tache', $id);
        if (!$Tache) 
          {
            throw new NotFoundHttpException("Tache non trouvé");
          }
          $em->remove($Tache);
          $em->flush();
        return $this->redirect($this->generateUrl('zegilooocandidats_fc_liste_tache'));
    }

    public function listerAction(){
        $repository = $this->getDoctrine()->getRepository('zegilooocandidatsFCBundle:Tache');
        $Tache = $repository->findAll();        
        return $this->render('zegilooocandidatsFCBundle:Tache:lister.html.twig', array('Tache' => $Tache));
    }

}
