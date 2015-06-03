<?php

namespace zegilooo\candidatsFCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * action
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="zegilooo\candidatsFCBundle\Entity\ActionRepository")
 */
class Action
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
     * @var Tache $tache
     *
     * @ORM\ManyToOne(targetEntity="Tache", inversedBy="actions", cascade={"persist", "merge"})
     * @ORM\JoinColumns({
     *  @ORM\JoinColumn(name="tache_id", referencedColumnName="id")
     * })
     */
    private $tache;

    /**
     * @var integer
     *
     * @ORM\Column(name="numDansTache", type="smallint")
     */
    private $numDansTache;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var integer
     *
     * @ORM\Column(name="saisie", type="integer", nullable=true)
     */
    private $saisie;


    function __toString(){
        return $this->libelle;
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
     * Set tache
     *
     * @param string $tache
     * @return Action
     */
    public function setTache($tache)
    {
        $this->tache = $tache;

        return $this;
    }

    /**
     * Get tache
     *
     * @return string 
     */
    public function getTache()
    {
        return $this->tache;
    }
    /**
     * Set numDansTache
     *
     * @param string $numDansTache
     * @return Action
     */
    public function setNumDansTache($numDansTache)
    {
        $this->numDansTache = $numDansTache;

        return $this;
    }

    /**
     * Get numDansTache
     *
     * @return string 
     */
    public function getNumDansTache()
    {
        return $this->numDansTache;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return Action
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
     * Set saisie
     *
     * @param integer $saisie
     * @return Action
     */
    public function setSaisie($saisie)
    {
        $this->saisie = $saisie;

        return $this;
    }

    /**
     * Get saisie
     *
     * @return integer 
     */
    public function getSaisie()
    {
        return $this->saisie;
    }
}
