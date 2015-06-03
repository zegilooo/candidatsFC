<?php

namespace zegilooo\candidatsFCBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use zegilooo\candidatsFCBundle\Entity\DossierSuivi;
use zegilooo\candidatsFCBundle\Form\DossierSuiviType;

class DossierSuiviController extends Controller
{
	public function ajouterDossierSuiviAction(Request $request){
		$DossierSuivi = new DossierSuivi();
		$formulaire = $this->createForm(new DossierSuiviType(), $DossierSuivi);
		$formulaire->add("Envoyer", "submit");
		$formulaire->handleRequest($request);

		if ($formulaire->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$DossierSuivi->setNom(); // ajouter le nom
			$em->persist($DossierSuivi);
			$em->flush();

			return $this->redirect($this->generateUrl('zegilooocandidats_fc_listedossier'));
		}

		return $this->render('zegilooocandidatsFCBundle:DossierSuivi:form_DossierSuivi.html.twig', 
								array(
									'formulaire' => $formulaire->createView(),
									'action'=>'ajouter'
									)
							);
	}
	public function modifierDossierSuiviAction(Request $request, $id = null){
		$em = $this->getDoctrine()->getManager();
		$DossierSuivi = $em->find('zegilooocandidatsFCBundle:DossierSuivi', $id);
		if (!$DossierSuivi) 
		  {
		    throw new NotFoundHttpException("Dossier non trouvé");
		  }
		$formulaire = $this->createForm(new DossierSuiviType(), $DossierSuivi);
		$formulaire->add("Envoyer", "submit");
		$formulaire->handleRequest($request);

		if ($formulaire->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($DossierSuivi);
			$em->flush();

			return $this->redirect($this->generateUrl('zegilooocandidats_fc_listedossier'));
		}

		return $this->render('zegilooocandidatsFCBundle:DossierSuivi:form_DossierSuivi.html.twig', 
								array(
								'formulaire' => $formulaire->createView(),
								'action'=>'modifier'
								)
							);
	}
	public function supprimerDossierSuiviAction(Request $request, $id = null){
		$em = $this->getDoctrine()->getManager();
		$DossierSuivi = $em->find('zegilooocandidatsFCBundle:DossierSuivi', $id);
		if (!$DossierSuivi) 
		  {
		    throw new NotFoundHttpException("DossierSuivi non trouvé");
		  }
		  $em->remove($DossierSuivi);
		  $em->flush();
		return $this->redirect($this->generateUrl('zegilooocandidats_fc_listedossier'));
	}
	public function listerDossierSuiviAction(){
		$repository = $this->getDoctrine()->getRepository('zegilooocandidatsFCBundle:DossierSuivi');
		$DossierSuivis = $repository->findAll();		
        return $this->render('zegilooocandidatsFCBundle:DossierSuivi:liste_DossierSuivi.html.twig', array('DossierSuivis' => $DossierSuivis));
	}
}
