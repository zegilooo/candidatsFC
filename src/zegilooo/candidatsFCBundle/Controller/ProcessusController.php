<?php

namespace zegilooo\candidatsFCBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use zegilooo\candidatsFCBundle\Entity\Processus;
use zegilooo\candidatsFCBundle\Form\ProcessusType;

class ProcessusController extends Controller
{
    public function ajouterAction(Request $request){
        $Processus = new Processus();
        $formulaire = $this->createForm(new ProcessusType(), $Processus);
        $formulaire->add("Envoyer", "submit");
        $formulaire->handleRequest($request);

        if ($formulaire->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Processus);
            $em->flush();

            return $this->redirect($this->generateUrl('zegilooocandidats_fc_liste_processus'));
        }

        return $this->render('zegilooocandidatsFCBundle:Processus:ajouter.html.twig', 
                                array(
                                    'formulaire' => $formulaire->createView(),
                                    'action'=>'ajouter'
                                    )
                            );
    }

    public function modifierAction(Request $request, $id = null){
        $em = $this->getDoctrine()->getManager();
        $Processus = $em->find('zegilooocandidatsFCBundle:Processus', $id);
        if (!$Processus) 
          {
            throw new NotFoundHttpException("Processus non trouvé");
          }
        $formulaire = $this->createForm(new ProcessusType(), $Processus);
        $formulaire->add("Envoyer", "submit");
        $formulaire->handleRequest($request);

        if ($formulaire->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Processus);
            $em->flush();

            return $this->redirect($this->generateUrl('zegilooocandidats_fc_liste_processus'));
        }

        return $this->render('zegilooocandidatsFCBundle:Processus:ajouter.html.twig', 
                                array(
                                'formulaire' => $formulaire->createView(),
                                'action'=>'modifier'
                                )
                            );
    }
    public function supprimerAction(Request $request, $id = null){
        $em = $this->getDoctrine()->getManager();
        $Processus = $em->find('zegilooocandidatsFCBundle:Processus', $id);
        if (!$Processus) 
          {
            throw new NotFoundHttpException("Processus non trouvé");
          }
          $em->remove($Processus);
          $em->flush();
        return $this->redirect($this->generateUrl('zegilooocandidats_fc_liste_processus'));
    }

    public function listerAction(){
        $repository = $this->getDoctrine()->getRepository('zegilooocandidatsFCBundle:Processus');
        $Processus = $repository->findAll();        
        return $this->render('zegilooocandidatsFCBundle:Processus:lister.html.twig', array('Processus' => $Processus));
    }

}
