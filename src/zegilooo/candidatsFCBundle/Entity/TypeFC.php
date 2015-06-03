<?php

namespace zegilooo\candidatsFCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeFC
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class TypeFC
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;
    
   /**
     * @var ArrayCollection $dossiers
     *
     * @ORM\OneToMany(targetEntity="DossierSuivi", mappedBy="typeFC_id", cascade={"persist", "remove", "merge"})
     */
    private $dossiers;

    public function __toString(){
        return $this->nom;
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
     * Set nom
     *
     * @param string $nom
     * @return TypeFC
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
     * Constructor
     */
    public function __construct()
    {
        $this->dossiers = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add dossiers
     *
     * @param \zegilooo\candidatsFCBundle\Entity\DossierSuivi $dossiers
     * @return TypeFC
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
}
