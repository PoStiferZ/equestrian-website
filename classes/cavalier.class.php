<?php

/**
 * Personne Cavalier (hérite de Personne)
 */
class Cavalier extends Personne
{
    //Propriétés 

    /**
     * lien de la photo du cavalier
     *
     * @var string
     */
    private $photo;

    /**
     * nombre de galop du cavalier
     *
     * @var int
     */
    private $niveauGalop;

    /**
     * numéro de la licence FFE du cavalier
     *
     * @var string
     */
    private $numeroLicence;

    private $errmessage;
    /**
     * constructeur d'un Cavalier
     *
     * @param string $nom
     * @param string $prenom
     * @param string $dna
     * @param string $mail
     * @param integer $tel
     * @param string $mdp
     * @param boolean $actif
     * @param integer $photo
     * @param string $galop
     * @param string $licence
     */
    public function __construct(string $n, string $p, string $dna, string $m, string $t, string $mdp, bool $a = true, string $ph, int $g, string $l)
    {
        // On transfère les informations nécessaires au constructeur de Cavalier
        parent::__construct($n, $p, $dna, $m, $t, $mdp, $a);
        $this->photo = $ph;
        $this->niveauGalop = $g;
        $this->numeroLicence = $l;
    }


    /**
     * Get lien de la photo du cavalier
     *
     * @return  string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set lien de la photo du cavalier
     *
     * @param  string  $photo  lien de la photo du cavalier
     *
     * @return  self
     */
    public function setPhoto(string $photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get nombre de galop du cavalier
     *
     * @return  int
     */
    public function getNiveauGalop()
    {
        return $this->niveauGalop;
    }

    /**
     * Set nombre de galop du cavalier
     *
     * @param  int  $niveauGalop  nombre de galop du cavalier
     *
     * @return  self
     */
    public function setniveauGalop(int $galop)
    {
        $this->niveauGalop = $galop;

        return $this;
    }

    /**
     * Get numéro de la licence FFE du cavalier
     *
     * @return  string
     */
    public function getnumeroLicence()
    {
        return $this->numeroLicence;
    }

    /**
     * Set numéro de la licence FFE du cavalier
     *
     * @param  string  $numeroLicence  numéro de la licence FFE du cavalier
     *
     * @return  self
     */
    public function setnumeroLicence(string $numeroLicence): self
    {
        $this->numeroLicence = $numeroLicence;

        return $this;
    }

    const errmessage = "Une erreur s'est produite, signalez la à l'administrateur \n";



    public function create($nom, $prenom, $dna, $mail, $telephone, $file, $galop, $licence, $lastID)
    {
        global $db;

        function password_generate($chars)
        {
            $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
            return substr(str_shuffle($data), 0, $chars);
        }

        // Traitement des images 
        $dir_name = "../../assets/uploadimg/";

        /* if (isset($_POST['submit'])) { */

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
            echo "Mauvaise extension ou taille trop grande";
        }

        $request = "INSERT INTO personne (nom, prenom, dateNaissance, mail, telephone, photo, niveauGalop, numeroLicence, ID_Responsable, actif, mdp) VALUES(:nom, :prenom, :dateNaissance, :mail, :telephone, :photo, :niveauGalop, :numeroLicence, :idResp, 1, :mdp)";
        $sql = $db->prepare($request);
        $sql->bindValue(':nom', $nom, PDO::PARAM_STR);
        $sql->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $sql->bindValue(':dateNaissance', $dna, PDO::PARAM_STR);
        $sql->bindValue(':mail', $mail, PDO::PARAM_STR);
        $sql->bindValue(':photo', $file, PDO::PARAM_STR);
        $sql->bindValue(':telephone', $telephone, PDO::PARAM_STR);
        $sql->bindValue(':niveauGalop', $galop, PDO::PARAM_INT);
        $sql->bindValue(
            ':mdp',
            password_generate(12),
            PDO::PARAM_STR
        );


        $sql->bindValue(':numeroLicence', $licence, PDO::PARAM_STR);
        if ($lastID == 0) {
            $sql->bindValue(':idResp', NULL, PDO::PARAM_INT);
        } else {
            $sql->bindValue(':idResp', $lastID, PDO::PARAM_INT);
        }

        try {
            return $sql->execute();
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function findAll($filter_galop, $filter_major)
    {
        global $db;
        $request = "SELECT * FROM personne WHERE actif='1' AND ville IS NULL";

        if (!empty($filter_galop)) {
            $request .= " AND niveauGalop IN ('" . implode("','", $filter_galop) . "')";
        }
        if (!empty($filter_major)) {
            if ($filter_major == "true") {
                $request .= " AND DATEDIFF(CURDATE(), dateNaissance) >= 6570";
            } else if ($filter_major == "false") {
                $request .= " AND DATEDIFF(CURDATE(), dateNaissance) < 6570";
            }
        }

        $sql = $db->prepare($request);
        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function findResp($idResp)
    {
        global $db;

        $request = "SELECT RESP.nom, RESP.prenom, RESP.dateNaissance, RESP.mail, RESP.telephone, RESP.rue, RESP.complementAdresse, RESP.codePostal, RESP.ville
        FROM personne CAV 
        LEFT OUTER JOIN personne RESP
        ON CAV.ID_Responsable = RESP.ID_Personne
        WHERE CAV.ID_Responsable = :id";
        $sql = $db->prepare($request);
        $sql->bindValue(':id', $idResp, PDO::PARAM_INT);
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

    public function updatePassword($id, $oldPassword, $newPassword)
    {
        global $db;
        $check = false;
        $request = "SELECT mdp FROM personne WHERE ID_Personne =:id";
        $sql = $db->prepare($request);
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $pass) {
            if ($pass['mdp'] == $oldPassword) {
                $check = true;
                $request = "UPDATE personne SET mdp =:new WHERE ID_Personne = :id";
                $sql = $db->prepare($request);
                $sql->bindValue(':id', $id, PDO::PARAM_INT);
                $sql->bindValue(':new', $newPassword, PDO::PARAM_STR);
                $sql->execute();
            }
        }
        try {
            $sql->execute();
            return $check;
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function updateById($id, $nom, $prenom, $dna, $mail, $telephone, $file, $galop, $licence)
    {
        global $db;

        // Traitement des images 
        $dir_name = "../../assets/uploadimg/";

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
