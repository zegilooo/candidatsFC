<?php

namespace zegilooo\candidatsFCBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use zegilooo\candidatsFCBundle\Entity\TypeFC;
use zegilooo\candidatsFCBundle\Form\TypeFCType;

class TypeFCController extends Controller
{
    public function ajouterAction(Request $request){
        $TypeFC = new TypeFC();
        $formulaire = $this->createForm(new TypeFCType(), $TypeFC);
        $formulaire->add("Envoyer", "submit");
        $formulaire->handleRequest($request);

        if ($formulaire->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($TypeFC);
            $em->flush();

            return $this->redirect($this->generateUrl('zegilooocandidats_fc_liste_typefc'));
        }

        return $this->render('zegilooocandidatsFCBundle:TypeFC:ajouter.html.twig', 
                                array(
                                    'formulaire' => $formulaire->createView(),
                                    'action'=>'ajouter'
                                    )
                            );
    }

    public function modifierAction(Request $request, $id = null){
        $em = $this->getDoctrine()->getManager();
        $TypeFC = $em->find('zegilooocandidatsFCBundle:TypeFC', $id);
        if (!$TypeFC) 
          {
            throw new NotFoundHttpException("TypeFC non trouvé");
          }
        $formulaire = $this->createForm(new TypeFCType(), $TypeFC);
        $formulaire->add("Envoyer", "submit");
        $formulaire->handleRequest($request);

        if ($formulaire->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($TypeFC);
            $em->flush();

            return $this->redirect($this->generateUrl('zegilooocandidats_fc_liste_typefc'));
        }

        return $this->render('zegilooocandidatsFCBundle:TypeFC:ajouter.html.twig', 
                                array(
                                'formulaire' => $formulaire->createView(),
                                'action'=>'modifier'
                                )
                            );
    }
    public function supprimerAction(Request $request, $id = null){
        $em = $this->getDoctrine()->getManager();
        $TypeFC = $em->find('zegilooocandidatsFCBundle:TypeFC', $id);
        if (!$TypeFC) 
          {
            throw new NotFoundHttpException("TypeFC non trouvé");
          }
          $em->remove($TypeFC);
          $em->flush();
        return $this->redirect($this->generateUrl('zegilooocandidats_fc_liste_typefc'));
    }

    public function listerAction(){
        $repository = $this->getDoctrine()->getRepository('zegilooocandidatsFCBundle:TypeFC');
        $TypeFC = $repository->findAll();        
        return $this->render('zegilooocandidatsFCBundle:TypeFC:lister.html.twig', array('TypeFC' => $TypeFC));
    }

}
