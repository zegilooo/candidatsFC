<?php

namespace zegilooo\candidatsFCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DossierSuivi
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class DossierSuivi
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
     * @var Candidat $candidat
     *
     * @ORM\ManyToOne(targetEntity="Candidat", inversedBy="dossiers", cascade={"persist", "merge"})
     * @ORM\JoinColumns({
     *  @ORM\JoinColumn(name="candidat_id", referencedColumnName="id")
     * })
     */
    private $candidat;    

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var TypePrestation $typePrestation
     *
     * @ORM\ManyToOne(targetEntity="TypePrestation", inversedBy="dossiers", cascade={"persist", "merge"})
     * @ORM\JoinColumns({
     *  @ORM\JoinColumn(name="typePrestation_id", referencedColumnName="id")
     * })
     */
    private $typePrestation;

    /**
     * @var TypeFC $typeFC
     *
     * @ORM\ManyToOne(targetEntity="TypeFC", inversedBy="dossiers", cascade={"persist", "merge"})
     * @ORM\JoinColumns({
     *  @ORM\JoinColumn(name="typeFC_id", referencedColumnName="id")
     * })
     */
    private $typeFC;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="text", nullable=true)
     */
    private $commentaire;

     /**
     * @var Personnel $idPersonnelFC
     *
     * @ORM\ManyToOne(targetEntity="Personnel", inversedBy="dossiers", cascade={"persist", "merge"})
     * @ORM\JoinColumns({
     *  @ORM\JoinColumn(name="personnel_id", referencedColumnName="id")
     * })
     */
    private $idPersonnelFC;

    /**
     * @var \DateTime $created
     *
     * @ORM\Column(type="datetime")
     */
    private $created;

    function __construct(){
        $this->created = new \DateTime();
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
     * Set Candidat
     *
     * @param Candidat $Candidat
     * @return DossierSuivi
     */
    public function setCandidat(Candidat $Candidat)
    {
        $this->candidat = $Candidat;

        return $this;
    }

    /**
     * Get Candidat
     *
     * @return Candidat 
     */
    public function getCandidat()
    {
        return $this->candidat;
    }    

    /**
     * Set nom
     *
     * @param string $nom
     * @return DossierSuivi
     */
    public function setNom()
    {
        $this->nom = $this->typePrestation->getNom().
                    ' / '.$this->typeFC->getNom();
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
     * Set typePrestation
     *
     * @param integer $typePrestation
     * @return DossierSuivi
     */
    public function setTypePrestation($typePrestation)
    {
        $this->typePrestation = $typePrestation;

        return $this;
    }

    /**
     * Get typePrestation
     *
     * @return integer 
     */
    public function getTypePrestation()
    {
        return $this->typePrestation;
    }

    /**
     * Set typeFC
     *
     * @param integer $typeFC
     * @return DossierSuivi
     */
    public function setTypeFC($typeFC)
    {
        $this->typeFC = $typeFC;

        return $this;
    }

    /**
     * Get typeFC
     *
     * @return integer 
     */
    public function getTypeFC()
    {
        return $this->typeFC;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     * @return DossierSuivi
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string 
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set idPersonnelFC
     *
     * @param integer $idPersonnelFC
     * @return DossierSuivi
     */
    public function setIdPersonnelFC($idPersonnelFC)
    {
        $this->idPersonnelFC = $idPersonnelFC;

        return $this;
    }

    /**
     * Get idPersonnelFC
     *
     * @return integer 
     */
    public function getIdPersonnelFC()
    {
        return $this->idPersonnelFC;
    }


    public function getCreated()
    {
        return $this->created;
    }


    /**
     * Set created
     *
     * @param \DateTime $created
     * @return DossierSuivi
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }
}
