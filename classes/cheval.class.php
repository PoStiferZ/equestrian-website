<?php

class Cheval
{
    private $ID_Cheval;
    private $nomCheval;
    private $dateNaissanceCheval;
    private $sir;
    private $idRobe;

    private $errmessage;

    public function __construct($nomC, $dnaC, $sir, $idRobe)
    {
        $this->nomCheval = $nomC;
        $this->dateNaissanceCheval = $dnaC;
        $this->sir = $sir;
        $this->idRobe = $idRobe;
    }

    /**
     * Get the value of nomCheval
     */
    public function getNomCheval()
    {
        return $this->nomCheval;
    }

    /**
     * Set the value of nomCheval
     *
     * @return  self
     */
    public function setNomCheval($nomC)
    {
        $this->nomCheval = $nomC;

        return $this;
    }


    /**
     * Get the value of dateNaissanceCheval
     */
    public function getDateNaissanceCheval()
    {
        return $this->dateNaissanceCheval;
    }

    /**
     * Set the value of dateNaissanceCheval
     *
     * @return  self
     */
    public function setDateNaissanceCheval($dnaC)
    {
        $this->dateNaissanceCheval = $dnaC;

        return $this;
    }

    /**
     * Get the value of SirCheval
     */
    public function getSir()
    {
        return $this->sir;
    }

    /**
     * Set the value of SirCheval
     *
     * @return  self
     */
    public function setSirCheval($sir)
    {
        $this->sir = $sir;

        return $this;
    }

    /**
     * Get the value of SirCheval
     */
    public function getIdRobe()
    {
        return $this->idRobe;
    }

    /**
     * Set the value of SirCheval
     *
     * @return  self
     */
    public function setIdRobe($idRobe)
    {
        $this->idRobe = $idRobe;

        return $this;
    }

    public function create($nomC, $dnaC, $sir, $idRobe)
    {
        global $db;
        $request = "INSERT INTO cheval (nom_Cheval, DateNaissance_Cheval, SIR, ID_Robe, actif) VALUES(:nomC, :dnaC, :sir, :idRobe, 1)";
        $sql = $db->prepare($request);
        $sql->bindValue(':nomC', $nomC, PDO::PARAM_STR);
        $sql->bindValue(':dnaC', $dnaC, PDO::PARAM_STR);
        $sql->bindValue(':sir', $sir, PDO::PARAM_INT);
        $sql->bindValue(':idRobe', $idRobe, PDO::PARAM_INT);
        try {
            return $sql->execute();
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function findAll()
    {
        global $db;
        $request =
            "SELECT ID_Cheval, nom_Cheval, DateNaissance_Cheval, SIR, libelleRobe
        FROM cheval C
        INNER JOIN robe R ON C.ID_Robe = R.ID_Robe
        WHERE C.actif='1'";
        $sql = $db->prepare($request);
        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function findById($idC)
    {
        global $db;
        $request =
            "SELECT * FROM cheval WHERE actif='1' AND ID_Cheval = :idC";
        $sql = $db->prepare($request);
        $sql->bindValue(':idC', $idC, PDO::PARAM_INT);
        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function updateById($idC, $nomC, $dnaC, $sir, $idRobe)
    {
        global $db;
        $request = "UPDATE cheval SET nom_Cheval = :nomC, DateNaissance_Cheval = :dnaC, SIR = :sir, ID_Robe = :idRobe WHERE ID_Cheval = :idC";
        $sql = $db->prepare($request);
        $sql->bindValue(':idC', $idC, PDO::PARAM_INT);
        $sql->bindValue(':nomC', $nomC, PDO::PARAM_STR);
        $sql->bindValue(':dnaC', $dnaC, PDO::PARAM_STR);
        $sql->bindValue(':sir', $sir, PDO::PARAM_INT);
        $sql->bindValue(':idRobe', $idRobe, PDO::PARAM_INT);
        try {
            return $sql->execute();
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function deleteById($idC)
    {
        global $db;
        $request = "UPDATE cheval SET actif = 0 WHERE ID_Cheval = :idC";
        $sql = $db->prepare($request);
        $sql->bindValue(':idC', $idC, PDO::PARAM_INT);
        try {
            return $sql->execute();
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    /**
     * Get the value of ID_Cheval
     */
    public function getID_Cheval()
    {
        return $this->ID_Cheval;
    }
}
