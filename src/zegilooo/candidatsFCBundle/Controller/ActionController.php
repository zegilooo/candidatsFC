<?php

namespace zegilooo\candidatsFCBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use zegilooo\candidatsFCBundle\Entity\Action;
use zegilooo\candidatsFCBundle\Form\ActionType;

class ActionController extends Controller
{
    public function ajouterAction(Request $request){
        $Action = new Action();
        $formulaire = $this->createForm(new ActionType(), $Action);
        $formulaire->add("Envoyer", "submit");
        $formulaire->handleRequest($request);

        if ($formulaire->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Action);
            $em->flush();

            return $this->redirect($this->generateUrl('zegilooocandidats_fc_liste_action'));
        }

        return $this->render('zegilooocandidatsFCBundle:Action:ajouter.html.twig', 
                                array(
                                    'formulaire' => $formulaire->createView(),
                                    'action'=>'ajouter'
                                    )
                            );
    }

    public function modifierAction(Request $request, $id = null){
        $em = $this->getDoctrine()->getManager();
        $Action = $em->find('zegilooocandidatsFCBundle:Action', $id);
        if (!$Action) 
          {
            throw new NotFoundHttpException("Action non trouvé");
          }
        $formulaire = $this->createForm(new ActionType(), $Action);
        $formulaire->add("Envoyer", "submit");
        $formulaire->handleRequest($request);

        if ($formulaire->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Action);
            $em->flush();

            return $this->redirect($this->generateUrl('zegilooocandidats_fc_liste_action'));
        }

        return $this->render('zegilooocandidatsFCBundle:Action:ajouter.html.twig', 
                                array(
                                'formulaire' => $formulaire->createView(),
                                'action'=>'modifier'
                                )
                            );
    }
    public function supprimerAction(Request $request, $id = null){
        $em = $this->getDoctrine()->getManager();
        $Action = $em->find('zegilooocandidatsFCBundle:Action', $id);
        if (!$Action) 
          {
            throw new NotFoundHttpException("Action non trouvé");
          }
          $em->remove($Action);
          $em->flush();
        return $this->redirect($this->generateUrl('zegilooocandidats_fc_liste_action'));
    }

    public function listerAction(){
        $repository = $this->getDoctrine()->getRepository('zegilooocandidatsFCBundle:Action');
        $Action = $repository->findAll();        
        return $this->render('zegilooocandidatsFCBundle:Action:lister.html.twig', array('Action' => $Action));
    }

}
