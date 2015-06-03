<?php

namespace zegilooo\candidatsFCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Processus
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="zegilooo\candidatsFCBundle\Entity\ProcessusRepository")
 */
class Processus
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
     * @var Personnel $responsable
     *
     * @ORM\ManyToOne(targetEntity="Personnel", inversedBy="processus", cascade={"persist", "merge"})
     * @ORM\JoinColumns({
     *  @ORM\JoinColumn(name="responsable_id", referencedColumnName="id")
     * })
     */
    private $responsable;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var ArrayCollection $taches
     *
     * @ORM\OneToMany(targetEntity="Tache", mappedBy="processus", cascade={"persist", "remove", "merge"})
     * @ORM\OrderBy({"numDansProcessus" = "ASC"})
     */
    private $taches;
    
    public function __toString(){
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
     * Set responsable
     *
     * @param integer $responsable
     * @return Processus
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
     * Set libelle
     *
     * @param string $libelle
     * @return Processus
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
     * Constructor
     */
    public function __construct()
    {
        $this->taches = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add taches
     *
     * @param \zegilooo\candidatsFCBundle\Entity\Tache $taches
     * @return Processus
     */
    public function addTach(\zegilooo\candidatsFCBundle\Entity\Tache $taches)
    {
        $this->taches[] = $taches;

        return $this;
    }

    /**
     * Remove taches
     *
     * @param \zegilooo\candidatsFCBundle\Entity\Tache $taches
     */
    public function removeTach(\zegilooo\candidatsFCBundle\Entity\Tache $taches)
    {
        $this->taches->removeElement($taches);
    }

    /**
     * Get taches
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTaches()
    {
        return $this->taches;
    }
}
