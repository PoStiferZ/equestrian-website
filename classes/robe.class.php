<?php

class Robe
{
    private $ID_Robe;
    private $libelleRobe;
    private $errmessage;


    public function __construct($libR)
    {
        $this->libelleRobe = $libR;
    }

    /**
     * Get the value of ID_Robe
     */
    public function getID_Robe()
    {
        return $this->ID_Robe;
    }

    /**
     * Get the value of libelleRobe
     */
    public function getLibelleRobe()
    {
        return $this->libelleRobe;
    }

    /**
     * Set the value of libelleRobe
     *
     * @return  self
     */
    public function setLibelleRobe($libR)
    {
        $this->libelleRobe = $libR;

        return $this;
    }


    public function create($libR)
    {
        global $db;
        $request = "INSERT INTO robe (libelleRobe, actif) VALUES(:libR, 1)";
        $sql = $db->prepare($request);
        $sql->bindValue(':libR', $libR, PDO::PARAM_STR);
        try {
            return $sql->execute();
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function findAll()
    {
        global $db;
        $request = "SELECT * FROM robe WHERE actif='1'";
        $sql = $db->prepare($request);
        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function findById($idR)
    {
        global $db;
        $request = "SELECT * FROM robe WHERE actif='1' AND ID_Robe =:idR";
        $sql = $db->prepare($request);
        $sql->bindValue(':idR', $idR, PDO::PARAM_INT);
        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function updateById($idR, $libR)
    {
        global $db;
        $request = "UPDATE robe SET libelleRobe = :libR WHERE ID_Robe = :idR";
        $sql = $db->prepare($request);
        $sql->bindValue(':idR', $idR, PDO::PARAM_INT);
        $sql->bindValue(':libR', $libR, PDO::PARAM_STR);
        try {
            return $sql->execute();
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function deleteById($idR)
    {
        global $db;
        $request = "UPDATE robe SET actif = 0 WHERE ID_Robe = :idR";
        $sql = $db->prepare($request);
        $sql->bindValue(':idR', $idR, PDO::PARAM_INT);
        try {
            return $sql->execute();
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }
}
