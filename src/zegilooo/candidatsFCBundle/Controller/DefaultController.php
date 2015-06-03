<?php

namespace zegilooo\candidatsFCBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use zegilooo\candidatsFCBundle\Entity\Processus;

class DefaultController extends Controller
{
    public function indexAction()
    {
		$repository = $this->getDoctrine()->getRepository('zegilooocandidatsFCBundle:Processus');
		$Processus = $repository->findAll();		
        return $this->render('zegilooocandidatsFCBundle:Default:index.html.twig', array('Processus' => $Processus));
    }
}
