<?php

namespace zegilooo\candidatsFCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Personnel
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="zegilooo\candidatsFCBundle\Entity\PersonnelRepository")
 */
class Personnel
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
     * @var string
     *
     * @ORM\Column(name="civilite", type="string", length=255)
     */
    private $civilite;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

  /**
     * @var ArrayCollection $dossiers
     *
     * @ORM\OneToMany(targetEntity="DossierSuivi", mappedBy="idPersonnelFC", cascade={"persist", "remove", "merge"})
     */
    private $dossiers;

    /**
     * @var ArrayCollection $processus
     *
     * @ORM\OneToMany(targetEntity="Processus", mappedBy="responsable", cascade={"persist", "remove", "merge"})
     */
    private $processus;

    /**
     * @var ArrayCollection $taches_responsable
     *
     * @ORM\OneToMany(targetEntity="Tache", mappedBy="responsable", cascade={"persist", "remove", "merge"})
     */
    private $taches_responsable;

    /**
     * @var ArrayCollection $taches_acteur
     *
     * @ORM\OneToMany(targetEntity="Tache", mappedBy="acteur", cascade={"persist", "remove", "merge"})
     */
    private $taches_acteur;

    /**
     * @var ArrayCollection $taches_suppleant
     *
     * @ORM\OneToMany(targetEntity="Tache", mappedBy="suppleant", cascade={"persist", "remove", "merge"})
     */
    private $taches_suppleant;


    public function __toString(){
        return $this->civilite.' '.$this->prenom.' '.$this->nom;
    }

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
     * Set civilite
     *
     * @param string $civilite
     * @return Personnel
     */
    public function setCivilite($civilite)
    {
        $this->civilite = $civilite;

        return $this;
    }

    /**
     * Get civilite
     *
     * @return string 
     */
    public function getCivilite()
    {
        return $this->civilite;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Personnel
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Personnel
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->dossiers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->processus = new \Doctrine\Common\Collections\ArrayCollection();
        $this->taches_responsable = new \Doctrine\Common\Collections\ArrayCollection();
        $this->taches_acteur = new \Doctrine\Common\Collections\ArrayCollection();
        $this->taches_suppleant = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add dossiers
     *
     * @param \zegilooo\candidatsFCBundle\Entity\DossierSuivi $dossiers
     * @return Personnel
     */
    public function addDossier(\zegilooo\candidatsFCBundle\Entity\DossierSuivi $dossiers)
    {
        $this->dossiers[] = $dossiers;

        return $this;
    }

    /**
     * Remove dossiers
     *
     * @param \zegilooo\candidatsFCBundle\Entity\DossierSuivi $dossiers
     */
    public function removeDossier(\zegilooo\candidatsFCBundle\Entity\DossierSuivi $dossiers)
    {
        $this->dossiers->removeElement($dossiers);
    }

    /**
     * Get dossiers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDossiers()
    {
        return $this->dossiers;
    }

    /**
     * Add processus
     *
     * @param \zegilooo\candidatsFCBundle\Entity\Processus $processus
     * @return Personnel
     */
    public function addProcessus(\zegilooo\candidatsFCBundle\Entity\Processus $processus)
    {
        $this->processus[] = $processus;

        return $this;
    }

    /**
     * Remove processus
     *
     * @param \zegilooo\candidatsFCBundle\Entity\Processus $processus
     */
    public function removeProcessus(\zegilooo\candidatsFCBundle\Entity\Processus $processus)
    {
        $this->processus->removeElement($processus);
    }

    /**
     * Get processus
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProcessus()
    {
        return $this->processus;
    }

    /**
     * Add taches_responsable
     *
     * @param \zegilooo\candidatsFCBundle\Entity\Tache $tachesResponsable
     * @return Personnel
     */
    public function addTachesResponsable(\zegilooo\candidatsFCBundle\Entity\Tache $tachesResponsable)
    {
        $this->taches_responsable[] = $tachesResponsable;

        return $this;
    }

    /**
     * Remove taches_responsable
     *
     * @param \zegilooo\candidatsFCBundle\Entity\Tache $tachesResponsable
     */
    public function removeTachesResponsable(\zegilooo\candidatsFCBundle\Entity\Tache $tachesResponsable)
    {
        $this->taches_responsable->removeElement($tachesResponsable);
    }

    /**
     * Get taches_responsable
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTachesResponsable()
    {
        return $this->taches_responsable;
    }

    /**
     * Add taches_acteur
     *
     * @param \zegilooo\candidatsFCBundle\Entity\Tache $tachesActeur
     * @return Personnel
     */
    public function addTachesActeur(\zegilooo\candidatsFCBundle\Entity\Tache $tachesActeur)
    {
        $this->taches_acteur[] = $tachesActeur;

        return $this;
    }

    /**
     * Remove taches_acteur
     *
     * @param \zegilooo\candidatsFCBundle\Entity\Tache $tachesActeur
     */
    public function removeTachesActeur(\zegilooo\candidatsFCBundle\Entity\Tache $tachesActeur)
    {
        $this->taches_acteur->removeElement($tachesActeur);
    }

    /**
     * Get taches_acteur
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTachesActeur()
    {
        return $this->taches_acteur;
    }

    /**
     * Add taches_suppleant
     *
     * @param \zegilooo\candidatsFCBundle\Entity\Tache $tachesSuppleant
     * @return Personnel
     */
    public function addTachesSuppleant(\zegilooo\candidatsFCBundle\Entity\Tache $tachesSuppleant)
    {
        $this->taches_suppleant[] = $tachesSuppleant;

        return $this;
    }

    /**
     * Remove taches_suppleant
     *
     * @param \zegilooo\candidatsFCBundle\Entity\Tache $tachesSuppleant
     */
    public function removeTachesSuppleant(\zegilooo\candidatsFCBundle\Entity\Tache $tachesSuppleant)
    {
        $this->taches_suppleant->removeElement($tachesSuppleant);
    }

    /**
     * Get taches_suppleant
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTachesSuppleant()
    {
        return $this->taches_suppleant;
    }
}
