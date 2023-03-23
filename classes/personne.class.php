<?php
class Personne
{

    // Propriétés
    /**
     * identifiant de la personne (AI)
     * 
     * @var int
     */
    private $idPersonne;

    /**
     * nom de la personne 
     * 
     * @var string 
     */
    private $nom;

    /**
     * prenom de la personne
     *
     * @var string
     */
    private $prenom;

    /**
     * date de naissance de la personne
     *
     * @var string
     */
    private $dateNaissance;

    /**
     * email de la personne
     *
     * @var string
     */
    private $mail;

    /**
     * telephone de la personne
     *
     * @var int  
     */
    private $telephone;

    /**
     * status de la personne
     *
     * @var bool 
     */
    private $actif;
    private $errmessage;


    /**
     * constructeur d'une personne
     *
     * @param string $nom
     * @param string $prenom
     * @param string $dna
     * @param string $mail
     * @param int $tel
     * @param bool $actif
     */
    public function __construct(string $n, string $p, string $dna, string $m, string $t, bool $a = true)
    {
        $this->nom = $n;
        $this->prenom = $p;
        $this->dateNaissance = $dna;
        $this->mail = $m;
        $this->telephone = $t;
        $this->actif = $a;
    }

    /**
     * return identifiant de la personne
     *
     * @return int
     */
    public function getIdPersonne(): int
    {
        return $this->idPersonne;
    }


    /**
     * return nom du compte
     *
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * modifie le nom de la personne et retourne l'objet
     *
     * @param string $nom Nom de la personne
     * @return Personne la Personne 
     */
    public function setNom(string $nom): self
    {
        if ($nom != "") {
            $this->nom = $nom;
        }

        return $this;
    }

    /**
     * return le prenom de la personne 
     * 
     * @var string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * modifie le prenom de la personne et retourne l'objet
     * 
     * @param string $prenom prenom de la personne
     * @return Personne la Personne
     */
    public function setPrenom(string $prenom): self
    {
        if ($prenom != "") {
            $this->prenom = $prenom;
        }
        return $this;
    }


    /**
     * return la date de naissance de la personne
     *
     * @return integer
     */
    public function getDateNaissance(): string
    {
        return $this->dateNaissance;
    }

    /**
     * modifie la date de naissance de la personne et retourne l'objet
     *
     * @param string $dna date de naissance de la personne
     * @return Personne la Personne
     */
    public function setDateNaissance(string $dna): self
    {
        if ($dna != "") {
            $this->dateNaissance = $dna;
        }
        return $this;
    }

    /**
     * return l'email de la personne
     *
     * @return string
     */
    public function getMail(): string
    {
        return $this->mail;
    }


    /**
     * Modifie l'email de la personne
     *
     * @param string $mail l'email de la personne
     * @return Personne la Personne
     */
    public function setMail(string $mail): self
    {
        if ($mail != "") {
            $this->mail = $mail;
        }
        return $this;
    }

    /**
     * return le numéro de telephone de la personne
     *
     * @return integer
     */
    public function getTelephone(): int
    {
        return $this->telephone;
    }

    /**
     * Modifie le numéro de telephone de la personne
     *
     * @param integer $telephone le numéro de telephone de la personne
     * @return Personne La personne
     */
    public function setTelephone(int $telephone): self
    {
        if ($telephone != "") {
            $this->telephone = $telephone;
        }
        return $this;
    }

    /**
     * return le status de la personne
     *
     * @return boolean
     */
    public function getActif(): bool
    {
        return $this->actif;
    }

    /**
     * modifie le statut de la personne
     *
     * @param boolean $actif status de la personne
     * @return Personne La Personne
     */
    public function setActif(bool $actif): self
    {
        $this->actif = $actif;
        return $this;
    }
}
