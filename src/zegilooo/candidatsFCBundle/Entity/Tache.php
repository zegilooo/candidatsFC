<?php

namespace zegilooo\candidatsFCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tache
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="zegilooo\candidatsFCBundle\Entity\TacheRepository")
 */
class Tache
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
     * @var Processus $processus
     *
     * @ORM\ManyToOne(targetEntity="Processus", inversedBy="taches", cascade={"persist", "merge"})
     * @ORM\JoinColumns({
     *  @ORM\JoinColumn(name="processus_id", referencedColumnName="id")
     * })
     */
    private $processus;

    /**
     * @var Personnel $responsable
     *
     * @ORM\ManyToOne(targetEntity="Personnel", inversedBy="taches_responsable", cascade={"persist", "merge"})
     * @ORM\JoinColumns({
     *  @ORM\JoinColumn(name="responsable_id", referencedColumnName="id")
     * })
     */
    private $responsable;

    /**
     * @var Personnel $acteur
     *
     * @ORM\ManyToOne(targetEntity="Personnel", inversedBy="taches_acteur", cascade={"persist", "merge"})
     * @ORM\JoinColumns({
     *  @ORM\JoinColumn(name="acteur_id", referencedColumnName="id")
     * })
     */
    private $acteur;

    /**
     * @var Personnel $suppleant
     *
     * @ORM\ManyToOne(targetEntity="Personnel", inversedBy="taches_suppleant", cascade={"persist", "merge"})
     * @ORM\JoinColumns({
     *  @ORM\JoinColumn(name="suppleant_id", referencedColumnName="id")
     * })
     */
    private $suppleant;

    /**
     * @var integer
     *
     * @ORM\Column(name="numDansProcessus", type="smallint")
     */
    private $numDansProcessus;

    /**
     * @var string
     *
     * @ORM\Column(name="conditionPrerequise", type="string", length=255, nullable=true)
     */
    private $conditionPrerequise;

    /**
     * @var string
     *
     * @ORM\Column(name="conditionFinExecution", type="string", length=255, nullable=true)
     */
    private $conditionFinExecution;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptif", type="text", nullable=true)
     */
    private $descriptif;

    /**
     * @var ArrayCollection $actions
     *
     * @ORM\OneToMany(targetEntity="Action", mappedBy="tache", cascade={"persist", "remove", "merge"})
     * @ORM\OrderBy({"numDansTache" = "ASC"})
     */
    private $actions;

    function __toString(){
        return $this->processus.' : '.$this->numDansProcessus.' - '.$this->libelle;
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
     * Set processus
     *
     * @param integer $processus
     * @return Tache
     */
    public function setProcessus($processus)
    {
        $this->processus = $processus;

        return $this;
    }

    /**
     * Get processus
     *
     * @return integer 
     */
    public function getProcessus()
    {
        return $this->processus;
    }

    /**
     * Set responsable
     *
     * @param integer $responsable
     * @return Tache
     */
    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;

        return $this;
    }

    /**
     * Get responsable
     *
     * @return integer 
     */
    public function getResponsable()
    {
        return $this->responsable;
    }

    /**
     * Set acteur
     *
     * @param integer $acteur
     * @return Tache
     */
    public function setActeur($acteur)
    {
        $this->acteur = $acteur;

        return $this;
    }

    /**
     * Get acteur
     *
     * @return integer 
     */
    public function getActeur()
    {
        return $this->acteur;
    }

    /**
     * Set suppleant
     *
     * @param integer $suppleant
     * @return Tache
     */
    public function setSuppleant($suppleant)
    {
        $this->suppleant = $suppleant;

        return $this;
    }

    /**
     * Get suppleant
     *
     * @return integer 
     */
    public function getSuppleant()
    {
        return $this->suppleant;
    }

    /**
     * Set numDansProcessus
     *
     * @param integer $numDansProcessus
     * @return Tache
     */
    public function setNumDansProcessus($numDansProcessus)
    {
        $this->numDansProcessus = $numDansProcessus;

        return $this;
    }

    /**
     * Get numDansProcessus
     *
     * @return integer 
     */
    public function getNumDansProcessus()
    {
        return $this->numDansProcessus;
    }

    /**
     * Set conditionPrerequise
     *
     * @param string $conditionPrerequise
     * @return Tache
     */
    public function setConditionPrerequise($conditionPrerequise)
    {
        $this->conditionPrerequise = $conditionPrerequise;

        return $this;
    }

    /**
     * Get conditionPrerequise
     *
     * @return string 
     */
    public function getConditionPrerequise()
    {
        return $this->conditionPrerequise;
    }

    /**
     * Set conditionFinExecution
     *
     * @param string $conditionFinExecution
     * @return Tache
     */
    public function setConditionFinExecution($conditionFinExecution)
    {
        $this->conditionFinExecution = $conditionFinExecution;

        return $this;
    }

    /**
     * Get conditionFinExecution
     *
     * @return string 
     */
    public function getConditionFinExecution()
    {
        return $this->conditionFinExecution;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return Tache
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set descriptif
     *
     * @param string $descriptif
     * @return Tache
     */
    public function setDescriptif($descriptif)
    {
        $this->descriptif = $descriptif;

        return $this;
    }

    /**
     * Get descriptif
     *
     * @return string 
     */
    public function getDescriptif()
    {
        return $this->descriptif;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->actions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add actions
     *
     * @param \zegilooo\candidatsFCBundle\Entity\Action $actions
     * @return Tache
     */
    public function addAction(\zegilooo\candidatsFCBundle\Entity\Action $actions)
    {
        $this->actions[] = $actions;

        return $this;
    }

    /**
     * Remove actions
     *
     * @param \zegilooo\candidatsFCBundle\Entity\Action $actions
     */
    public function removeAction(\zegilooo\candidatsFCBundle\Entity\Action $actions)
    {
        $this->actions->removeElement($actions);
    }

    /**
     * Get actions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getActions()
    {
        return $this->actions;
    }
}
