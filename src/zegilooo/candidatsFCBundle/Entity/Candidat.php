<?php
namespace zegilooo\candidatsFCBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
;;
/**
 * @ORM\Entity
 */
class Candidat
{
	 /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string",length=20, nullable=false)
     * @Assert\NotBlank()
     */    
    private $civilite;
	/**
     * @ORM\Column(type="string",length=255, nullable=false)
     * @Assert\NotBlank()
     */    
    private $nom;
	/**
     * @ORM\Column(type="string",length=255, nullable=true)
     */    
    private $nom_de_naissance;
	/**
     * @ORM\Column(type="string",length=255, nullable=true)
     */    
    private $nom_marital;
	/**
     * @ORM\Column(type="string",length=255, nullable=false)
     * @Assert\NotBlank()
     */    
    private $prenom;
    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank()
     */ 
	private $date_naissance;
	/**
     * @ORM\Column(type="string",length=1)
     * @Assert\NotBlank()
     */    
    private $sexe;
	/**
     * @ORM\Column(type="string",length=3, nullable=true)
     */    
    private $departement_naissance;
	/**
     * @ORM\Column(type="string",length=80, nullable=true)
     */    
    private $situation_de_famille;
	/**
     * @ORM\Column(type="string",length=255)
     * @Assert\NotBlank()
     */    
    private $adresse;
	/**
     * @ORM\Column(type="string",length=255, nullable=true)
     */    
    private $complement_adresse;
	/**
     * @ORM\Column(type="string",length=5)
     * @Assert\NotBlank()
     */    
    private $code_postal;
	/**
     * @ORM\Column(type="string",length=255)
     * @Assert\NotBlank()
     */    
    private $ville;
	/**
     * @ORM\Column(type="string",length=15, nullable=true)
     */    
    private $telephone;
	/**
     * @ORM\Column(type="string",length=255, nullable=true)
     */    
    private $email;
	/**
     * @ORM\Column(type="string",length=255, nullable=true)
     */    
    private $emploi_statut;
	/**
     * @ORM\Column(type="string",length=255, nullable=true)
     */    
    private $emploi_metier;
	/**
     * @ORM\Column(type="string",length=255, nullable=true)
     */    
    private $emploi_fonction;
	/**
     * @ORM\Column(type="string",length=255, nullable=true)
     */    
    private $emploi_secteur_activite;
	/**
     * @ORM\Column(type="string",length=255, nullable=true)
     */    
    private $chomeur_categorie;
	/**
     * @ORM\Column(type="date", nullable=true)
     */    
    private $chomeur_date_inscription_anpe;

    /**
     * @var ArrayCollection $dossiers
     *
     * @ORM\OneToMany(targetEntity="DossierSuivi", mappedBy="candidat", cascade={"persist", "remove", "merge"})
     */
    private $dossiers;

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
     * @return Candidat
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
     * @return Candidat
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
     * Set nom_de_naissance
     *
     * @param string $nomDeNaissance
     * @return Candidat
     */
    public function setNomDeNaissance($nomDeNaissance)
    {
        $this->nom_de_naissance = $nomDeNaissance;

        return $this;
    }

    /**
     * Get nom_de_naissance
     *
     * @return string 
     */
    public function getNomDeNaissance()
    {
        return $this->nom_de_naissance;
    }

    /**
     * Set nom_marital
     *
     * @param string $nomMarital
     * @return Candidat
     */
    public function setNomMarital($nomMarital)
    {
        $this->nom_marital = $nomMarital;

        return $this;
    }

    /**
     * Get nom_marital
     *
     * @return string 
     */
    public function getNomMarital()
    {
        return $this->nom_marital;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Candidat
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
     * Set date_naissance
     *
     * @param \DateTime $dateNaissance
     * @return Candidat
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->date_naissance = $dateNaissance;

        return $this;
    }

    /**
     * Get date_naissance
     *
     * @return \DateTime 
     */
    public function getDateNaissance()
    {
        return $this->date_naissance;
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     * @return Candidat
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string 
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set departement_naissance
     *
     * @param string $departementNaissance
     * @return Candidat
     */
    public function setDepartementNaissance($departementNaissance)
    {
        $this->departement_naissance = $departementNaissance;

        return $this;
    }

    /**
     * Get departement_naissance
     *
     * @return string 
     */
    public function getDepartementNaissance()
    {
        return $this->departement_naissance;
    }

    /**
     * Set situation_de_famille
     *
     * @param string $situationDeFamille
     * @return Candidat
     */
    public function setSituationDeFamille($situationDeFamille)
    {
        $this->situation_de_famille = $situationDeFamille;

        return $this;
    }

    /**
     * Get situation_de_famille
     *
     * @return string 
     */
    public function getSituationDeFamille()
    {
        return $this->situation_de_famille;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Candidat
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set complement_adresse
     *
     * @param string $complementAdresse
     * @return Candidat
     */
    public function setComplementAdresse($complementAdresse)
    {
        $this->complement_adresse = $complementAdresse;

        return $this;
    }

    /**
     * Get complement_adresse
     *
     * @return string 
     */
    public function getComplementAdresse()
    {
        return $this->complement_adresse;
    }

    /**
     * Set code_postal
     *
     * @param string $codePostal
     * @return Candidat
     */
    public function setCodePostal($codePostal)
    {
        $this->code_postal = $codePostal;

        return $this;
    }

    /**
     * Get code_postal
     *
     * @return string 
     */
    public function getCodePostal()
    {
        return $this->code_postal;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Candidat
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return Candidat
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Candidat
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set emploi_statut
     *
     * @param string $emploiStatut
     * @return Candidat
     */
    public function setEmploiStatut($emploiStatut)
    {
        $this->emploi_statut = $emploiStatut;

        return $this;
    }

    /**
     * Get emploi_statut
     *
     * @return string 
     */
    public function getEmploiStatut()
    {
        return $this->emploi_statut;
    }

    /**
     * Set emploi_metier
     *
     * @param string $emploiMetier
     * @return Candidat
     */
    public function setEmploiMetier($emploiMetier)
    {
        $this->emploi_metier = $emploiMetier;

        return $this;
    }

    /**
     * Get emploi_metier
     *
     * @return string 
     */
    public function getEmploiMetier()
    {
        return $this->emploi_metier;
    }

    /**
     * Set emploi_fonction
     *
     * @param string $emploiFonction
     * @return Candidat
     */
    public function setEmploiFonction($emploiFonction)
    {
        $this->emploi_fonction = $emploiFonction;

        return $this;
    }

    /**
     * Get emploi_fonction
     *
     * @return string 
     */
    public function getEmploiFonction()
    {
        return $this->emploi_fonction;
    }

    /**
     * Set emploi_secteur_activite
     *
     * @param string $emploiSecteurActivite
     * @return Candidat
     */
    public function setEmploiSecteurActivite($emploiSecteurActivite)
    {
        $this->emploi_secteur_activite = $emploiSecteurActivite;

        return $this;
    }

    /**
     * Get emploi_secteur_activite
     *
     * @return string 
     */
    public function getEmploiSecteurActivite()
    {
        return $this->emploi_secteur_activite;
    }

    /**
     * Set chomeur_categorie
     *
     * @param string $chomeurCategorie
     * @return Candidat
     */
    public function setChomeurCategorie($chomeurCategorie)
    {
        $this->chomeur_categorie = $chomeurCategorie;

        return $this;
    }

    /**
     * Get chomeur_categorie
     *
     * @return string 
     */
    public function getChomeurCategorie()
    {
        return $this->chomeur_categorie;
    }

    /**
     * Set chomeur_date_inscription_anpe
     *
     * @param string $chomeurDateInscriptionAnpe
     * @return Candidat
     */
    public function setChomeurDateInscriptionAnpe($chomeurDateInscriptionAnpe)
    {
        $this->chomeur_date_inscription_anpe = $chomeurDateInscriptionAnpe;

        return $this;
    }

    /**
     * Get chomeur_date_inscription_anpe
     *
     * @return string 
     */
    public function getChomeurDateInscriptionAnpe()
    {
        return $this->chomeur_date_inscription_anpe;
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
     * @return Candidat
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
