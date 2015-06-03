<?php

namespace zegilooo\candidatsFCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * temoinActionFaite
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="zegilooo\candidatsFCBundle\Entity\TemoinActionFaiteRepository")
 */
class TemoinActionFaite
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="action", type="integer")
     */
    private $action;

    /**
     * @var integer
     *
     * @ORM\Column(name="stagiaire", type="integer")
     */
    private $stagiaire;

    /**
     * @var integer
     *
     * @ORM\Column(name="dossierSuivi", type="integer")
     */
    private $dossierSuivi;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ok", type="boolean")
     */
    private $ok;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateExecution", type="datetime")
     */
    private $dateExecution;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set action
     *
     * @param integer $action
     * @return TemoinActionFaite
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action
     *
     * @return integer 
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set stagiaire
     *
     * @param integer $stagiaire
     * @return TemoinActionFaite
     */
    public function setStagiaire($stagiaire)
    {
        $this->stagiaire = $stagiaire;

        return $this;
    }

    /**
     * Get stagiaire
     *
     * @return integer 
     */
    public function getStagiaire()
    {
        return $this->stagiaire;
    }

    /**
     * Set dossierSuivi
     *
     * @param integer $dossierSuivi
     * @return TemoinActionFaite
     */
    public function setDossierSuivi($dossierSuivi)
    {
        $this->dossierSuivi = $dossierSuivi;

        return $this;
    }

    /**
     * Get dossierSuivi
     *
     * @return integer 
     */
    public function getDossierSuivi()
    {
        return $this->dossierSuivi;
    }

    /**
     * Set ok
     *
     * @param boolean $ok
     * @return TemoinActionFaite
     */
    public function setOk($ok)
    {
        $this->ok = $ok;

        return $this;
    }

    /**
     * Get ok
     *
     * @return boolean 
     */
    public function getOk()
    {
        return $this->ok;
    }

    /**
     * Set dateExecution
     *
     * @param \DateTime $dateExecution
     * @return TemoinActionFaite
     */
    public function setDateExecution($dateExecution)
    {
        $this->dateExecution = $dateExecution;

        return $this;
    }

    /**
     * Get dateExecution
     *
     * @return \DateTime 
     */
    public function getDateExecution()
    {
        return $this->dateExecution;
    }
}
