<?php

/**
 * Personne Cavalier (hérite de Personne)
 */
class Responsable extends Personne
{
    //Propriétés 

    /**
     * lien de la photo du cavalier
     *
     * @var string
     */
    private $rue;

    /**
     * nombre de galop du cavalier
     *
     * @var int
     */
    private $complementAdresse;

    /**
     * numéro de la licence FFE du cavalier
     *
     * @var string
     */
    private $codePostal;


    /**
     * numéro de la licence FFE du cavalier
     *
     * @var ville
     */
    private $ville;
    private $errmessage;


    /**
     * constructeur d'un Cavalier
     *
     * @param string $nom
     * @param string $prenom
     * @param string $dna
     * @param string $mail
     * @param integer $tel
     * @param boolean $actif
     * @param integer $photo
     * @param string $galop
     * @param string $licence
     */
    public function __construct(string $n, string $p, string $dna, string $m, string $t, string $ca, string $r, string $cp, string $v)
    {
        // On transfère les informations nécessaires au constructeur de Cavalier
        parent::__construct($n, $p, $dna, $m, $t);
        $this->rue = $r;
        $this->complementAdresse = $ca;
        $this->codePostal = $cp;
        $this->ville = $v;
    }

    /**
     * Get nombre de galop du cavalier
     *
     * @return  int
     */
    public function getComplementAdresse()
    {
        return $this->complementAdresse;
    }

    /**
     * Set nombre de galop du cavalier
     *
     * @param  int  $complementAdresse  nombre de galop du cavalier
     *
     * @return  self
     */
    public function setComplementAdresse(int $ca)
    {
        $this->complementAdresse = $ca;

        return $this;
    }

    /**
     * Get lien de la photo du cavalier
     *
     * @return  string
     */
    public function getRue()
    {
        return $this->rue;
    }

    /**
     * Set lien de la photo du cavalier
     *
     * @param  string  $rue  lien de la photo du cavalier
     *
     * @return  self
     */
    public function setRue(string $r)
    {
        $this->rue = $r;

        return $this;
    }

    /**
     * Get numéro de la licence FFE du cavalier
     *
     * @return  string
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set numéro de la licence FFE du cavalier
     *
     * @param  string  $codePostal  numéro de la licence FFE du cavalier
     *
     * @return  self
     */
    public function setCodePostal(string $cp)
    {
        $this->codePostal = $cp;

        return $this;
    }

    /**
     * Get numéro de la licence FFE du cavalier
     *
     * @return  ville
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set numéro de la licence FFE du cavalier
     *
     * @param  ville  $ville  numéro de la licence FFE du cavalier
     *
     * @return  self
     */
    public function setVille(string $v)
    {
        $this->ville = $v;

        return $this;
    }



    const errmessage = "Une erreur s'est produite, signalez la à l'administrateur \n";


    public function create($nom, $prenom, $dna, $mail, $telephone, $r, $cp, $v)
    {
        global $db;

        $request = "INSERT INTO personne (nom, prenom, dateNaissance, mail, telephone, rue, codePostal, ville, actif) VALUES(:nom, :prenom, :dateNaissance, :mail, :telephone, :rue, :cp, :ville, 1)";
        $sql = $db->prepare($request);
        $sql->bindValue(':nom', $nom, PDO::PARAM_STR);
        $sql->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $sql->bindValue(':dateNaissance', $dna, PDO::PARAM_STR);
        $sql->bindValue(':mail', $mail, PDO::PARAM_STR);
        $sql->bindValue(':telephone', $telephone, PDO::PARAM_STR);
        $sql->bindValue(':rue', $r, PDO::PARAM_STR);
        $sql->bindValue(':cp', $cp, PDO::PARAM_STR);
        $sql->bindValue(':ville', $v, PDO::PARAM_STR);
        try {
            return $sql->execute();
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function lastIdCreate()
    {
        global $db;

        $request = "SELECT LAST_INSERT_ID()";
        $sql = $db->prepare($request);
        $sql->execute();

        try {
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function findAll()
    {
        global $db;
        $request = "SELECT * FROM personne WHERE actif='1'";
        $sql = $db->prepare($request);
        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function findAllNonActif()
    {
        global $db;
        $request = "SELECT * FROM personne WHERE actif='0'";
        $sql = $db->prepare($request);
        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function findById($id)
    {
        global $db;
        $request = "SELECT * FROM personne WHERE actif='1' AND ID_Personne =:id";
        $sql = $db->prepare($request);
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function updateById($id, $nom, $prenom, $dna, $mail, $telephone, $file, $galop, $licence)
    {
        global $db;

        // Traitement des images 
        $dir_name = "../../styles/uploadimg/";

        $tmpName = $_FILES['photo']['tmp_name'];
        $name = $_FILES['photo']['name'];
        $size = $_FILES['photo']['size'];
        $error = $_FILES['photo']['error'];

        $tabExtension = explode('.', $name);
        $extension = strtolower(end($tabExtension));

        $format = ['jpg', 'png', 'jpeg', 'gif'];
        $maxSize = 4000000;

        if (in_array($extension, $format) && $size <= $maxSize && $error == 0) {
            $uniqueName = uniqid('', true);
            //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
            $file = $uniqueName . "." . $extension;
            //$file = 5f586bf96dcd38.73540086.jpg
            move_uploaded_file($tmpName, $dir_name . $file);
        } else {
            $dir_name = "false";
        }

        $request = "UPDATE personne SET nom =:nom, prenom =:prenom, dateNaissance =:dateNaissance, mail =:mail, telephone =:telephone, photo =:photo, niveauGalop =:niveauGalop, numeroLicence =:numeroLicence WHERE ID_Personne = :id";
        $sql = $db->prepare($request);
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->bindValue(':nom', $nom, PDO::PARAM_STR);
        $sql->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $sql->bindValue(':dateNaissance', $dna, PDO::PARAM_STR);
        $sql->bindValue(':mail', $mail, PDO::PARAM_STR);
        if ($dir_name == "false") {
            $request2 = "SELECT photo FROM personne WHERE actif='1' AND ID_Personne =:id";
            $sql2 = $db->prepare($request2);
            $sql2->bindValue(':id', $id, PDO::PARAM_INT);
            $sql2->execute();
            $photo = $sql2->fetchAll(PDO::FETCH_ASSOC);
            foreach ($photo as $value) {
                $sql->bindValue(':photo', $value['photo'], PDO::PARAM_STR);
            }
        } else {
            $sql->bindValue(':photo', $file, PDO::PARAM_STR);
        }
        $sql->bindValue(':telephone', $telephone, PDO::PARAM_STR);
        $sql->bindValue(':niveauGalop', $galop, PDO::PARAM_INT);
        $sql->bindValue(':numeroLicence', $licence, PDO::PARAM_STR);
        try {
            return $sql->execute();
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function deleteById($id)
    {
        global $db;
        $request = "UPDATE personne SET actif = 0 WHERE ID_Personne = :id";
        $sql = $db->prepare($request);
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        try {
            $sql = $sql->execute();
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }
}



/* 
REQUETE ID Responsable
SELECT CAV.nom, CAV.prenom
FROM personne cav LEFT JOIN
PersonneResp
ON CAV.idResp = Resp.idpers
*/