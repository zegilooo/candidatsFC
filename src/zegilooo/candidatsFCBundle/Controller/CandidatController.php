<?php

namespace zegilooo\candidatsFCBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use zegilooo\candidatsFCBundle\Entity\Candidat;
use zegilooo\candidatsFCBundle\Form\CandidatType;

class CandidatController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('zegilooocandidatsFCBundle:Default:index.html.twig', array('name' => $name));
    }
	public function ajouterCandidatAction(Request $request){
		$candidat = new Candidat();
		$formulaire = $this->createForm(new CandidatType(), $candidat);
		$formulaire->add("Envoyer", "submit");
		$formulaire->handleRequest($request);

		if ($formulaire->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($candidat);
			$em->flush();

			return $this->redirect($this->generateUrl('zegilooocandidats_fc_liste'));
		}

		return $this->render('zegilooocandidatsFCBundle:Candidat:form_candidat.html.twig', 
								array(
									'formulaire' => $formulaire->createView(),
									'action'=>'ajouter'
									)
							);
	}
	public function modifierCandidatAction(Request $request, $id = null){
		$em = $this->getDoctrine()->getManager();
		$candidat = $em->find('zegilooocandidatsFCBundle:Candidat', $id);
		if (!$candidat) 
		  {
		    throw new NotFoundHttpException("candidat non trouvé");
		  }
		$formulaire = $this->createForm(new CandidatType(), $candidat);
		$formulaire->add("Envoyer", "submit");
		$formulaire->handleRequest($request);

		if ($formulaire->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($candidat);
			$em->flush();

			return $this->redirect($this->generateUrl('zegilooocandidats_fc_liste'));
		}

		return $this->render('zegilooocandidatsFCBundle:Candidat:form_candidat.html.twig', 
								array(
								'formulaire' => $formulaire->createView(),
								'action'=>'modifier'
								)
							);
	}
	public function supprimerCandidatAction(Request $request, $id = null){
		$em = $this->getDoctrine()->getManager();
		$candidat = $em->find('zegilooocandidatsFCBundle:Candidat', $id);
		if (!$candidat) 
		  {
		    throw new NotFoundHttpException("candidat non trouvé");
		  }
		  $em->remove($candidat);
		  $em->flush();
		return $this->redirect($this->generateUrl('zegilooocandidats_fc_homepage'));
	}
	public function listerCandidatAction(){
		$repository = $this->getDoctrine()->getRepository('zegilooocandidatsFCBundle:Candidat');
		$candidats = $repository->findAll();		
        return $this->render('zegilooocandidatsFCBundle:Candidat:liste_candidat.html.twig', array('candidats' => $candidats));
	}
}
