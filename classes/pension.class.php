<?php

class Pension
{
    private $idTypePension;
    private $idTarif;
    private $idCheval;
    private $dateDebut;
    private $dateFin;
    private $errmessage;


    public function __construct($idTP, $idTar, $idChev, $dDeb, $dFin)
    {
        $this->idTypePension = $idTP;
        $this->idTarif = $idTar;
        $this->idCheval = $idChev;
        $this->dateDebut = $dDeb;
        $this->dateFin = $dFin;
    }

    /**
     * Get the value of dateFin
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set the value of dateFin
     *
     * @return  self
     */
    public function setDateFin($dFin)
    {
        $this->dateFin = $dFin;

        return $this;
    }

    /**
     * Get the value of dateDebut
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set the value of dateDebut
     *
     * @return  self
     */
    public function setDateDebut($dDeb)
    {
        $this->dateDebut = $dDeb;

        return $this;
    }

    /**
     * Get the value of idCheval
     */
    public function getIdCheval()
    {
        return $this->idCheval;
    }

    /**
     * Set the value of idCheval
     *
     * @return  self
     */
    public function setIdCheval($idChev)
    {
        $this->idCheval = $idChev;

        return $this;
    }

    /**
     * Get the value of idTarif
     */
    public function getIdTarif()
    {
        return $this->idTarif;
    }

    /**
     * Set the value of idTarif
     *
     * @return  self
     */
    public function setIdTarif($idTar)
    {
        $this->idTarif = $idTar;

        return $this;
    }

    /**
     * Get the value of idTypePension
     */
    public function getIdTypePension()
    {
        return $this->idTypePension;
    }

    /**
     * Set the value of idTypePension
     *
     * @return  self
     */
    public function setIdTypePension($idTP)
    {
        $this->idTypePension = $idTP;

        return $this;
    }

    public function updateById($idPers, $idTP, $idTar, $idChev, $dDeb, $dFin)
    {
        global $db;
        $request = "UPDATE pension SET ID_TP = :idTP, ID_Tarif = :idTar, ID_Cheval = :idChev, dateDebut = :dDeb, dateFin = :dFin WHERE ID_Pension = :idPers";
        $sql = $db->prepare($request);
        $sql->bindValue(':idPers', $idPers, PDO::PARAM_INT);
        $sql->bindValue(':idTP', $idTP, PDO::PARAM_INT);
        $sql->bindValue(':idTar', $idTar, PDO::PARAM_INT);
        $sql->bindValue(':idChev', $idChev, PDO::PARAM_INT);
        $sql->bindValue(':dDeb', $dDeb, PDO::PARAM_STR);
        $sql->bindValue(':dFin', $dFin, PDO::PARAM_STR);
        try {
            return $sql->execute();
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function create($idTP, $idTar, $idChev, $dDeb, $dFin)
    {
        global $db;
        $request = "INSERT INTO pension (ID_TP, ID_Tarif, ID_Cheval, dateDebut, dateFin, actif) VALUES(:idTP, :idTar, :idChev, :dDeb, :dFin, 1)";
        $sql = $db->prepare($request);
        $sql->bindValue(':idTP', $idTP, PDO::PARAM_INT);
        $sql->bindValue(':idTar', $idTar, PDO::PARAM_INT);
        $sql->bindValue(':idChev', $idChev, PDO::PARAM_INT);
        $sql->bindValue(':dDeb', $dDeb, PDO::PARAM_STR);
        $sql->bindValue(':dFin', $dFin, PDO::PARAM_STR);

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


    public function createSigne($idPers, $idPens)
    {
        global $db;
        $request = "INSERT INTO signe (ID_Personne, ID_Pension) VALUES(:idPers, :idPens)";
        $sql = $db->prepare($request);
        $sql->bindValue(':idPers', $idPers, PDO::PARAM_INT);
        $sql->bindValue(':idPens', $idPens, PDO::PARAM_INT);
        try {
            return $sql->execute();
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function updateSigne($idPers, $idPens)
    {
        global $db;
        $request = "UPDATE signe SET ID_Personne =:idPers WHERE ID_Pension = :idPens";
        $sql = $db->prepare($request);
        $sql->bindValue(':idPers', $idPers, PDO::PARAM_INT);
        $sql->bindValue(':idPens', $idPens, PDO::PARAM_INT);
        try {
            return $sql->execute();
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function findAll()
    {
        global $db;
        $request = "SELECT * FROM pension WHERE actif='1'";
        $sql = $db->prepare($request);
        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function findById($idP)
    {
        global $db;
        $request = "SELECT * FROM pension WHERE actif='1' AND ID_Pension =:idP";
        $sql = $db->prepare($request);
        $sql->bindValue(':idP', $idP, PDO::PARAM_INT);
        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function findByIDPersonne($idPersonne)
    {
        global $db;
        $request = "SELECT P.ID_Pension FROM pension P INNER JOIN signe SI ON P.ID_Pension = SI.ID_Pension WHERE SI.ID_Personne = :id";
        $sql = $db->prepare($request);
        $sql->bindValue(':id', $idPersonne, PDO::PARAM_INT);
        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function findByIdPension($idS)
    {
        global $db;
        $request = "SELECT SI.ID_Personne
        FROM pension Pens 
        INNER JOIN signe SI ON Pens.ID_Pension = SI.ID_Pension
        WHERE Pens.ID_Pension = :id";
        $sql = $db->prepare($request);
        $sql->bindValue(':id', $idS, PDO::PARAM_INT);
        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }
    public function findByIdSigne($idS)
    {
        global $db;
        $request = "SELECT PE.ID_Personne, PE.nom, PE.prenom
        FROM signe S 
        INNER JOIN pension P ON S.ID_Pension = P.ID_Pension
        INNER JOIN personne PE ON S.ID_Personne = PE.ID_Personne
        WHERE S.ID_Personne = :id";
        $sql = $db->prepare($request);
        $sql->bindValue(':id', $idS, PDO::PARAM_INT);
        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function deleteById($idP)
    {
        global $db;
        $request = "UPDATE pension SET actif = 0 WHERE ID_Pension = :idP";
        $sql = $db->prepare($request);
        $sql->bindValue(':idP', $idP, PDO::PARAM_INT);
        try {
            return $sql->execute();
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }
}
