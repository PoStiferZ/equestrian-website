<?php

class Tarif
{
    private $libelleTarif;
    private $prixMois;
    private $errmessage;


    public function __construct($libT, $pM)
    {
        $this->libelleTarif = $libT;
        $this->prixMois = $pM;
    }

    /**
     * Get the value of libelleTarif
     */
    public function getLibelleTarif()
    {
        return $this->libelleTarif;
    }

    /**
     * Set the value of libelleTarif
     *
     * @return  self
     */
    public function setLibelleTarif($libT)
    {
        $this->libelleTarif = $libT;

        return $this;
    }

    /**
     * Get the value of prixMois
     */
    public function getPrixMois()
    {
        return $this->prixMois;
    }

    /**
     * Set the value of prixMois
     *
     * @return  self
     */
    public function setPrixMois($pM)
    {
        $this->prixMois = $pM;

        return $this;
    }

    public function create($libT, $pM)
    {
        global $db;
        $request = "INSERT INTO tarif (libelleTarif, prixMois, actif) VALUES(:libT, :pM, 1)";
        $sql = $db->prepare($request);
        $sql->bindValue(':libT', $libT, PDO::PARAM_STR);
        $sql->bindValue(':pM', $pM, PDO::PARAM_INT);
        try {
            return $sql->execute();
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function updateById($idT, $libT, $pM)
    {
        global $db;
        $request = "UPDATE tarif SET libelleTarif = :libT, prixMois = :pM WHERE ID_Tarif = :idT";
        $sql = $db->prepare($request);
        $sql->bindValue(':idT', $idT, PDO::PARAM_INT);
        $sql->bindValue(':libT', $libT, PDO::PARAM_STR);
        $sql->bindValue(':pM', $pM, PDO::PARAM_INT);
        try {
            return $sql->execute();
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function findById($idT)
    {
        global $db;
        $request = "SELECT * FROM tarif WHERE actif='1' AND ID_Tarif =:idT";
        $sql = $db->prepare($request);
        $sql->bindValue(':idT', $idT, PDO::PARAM_INT);
        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function findAll()
    {
        global $db;
        $request = "SELECT * FROM tarif WHERE actif='1'";
        $sql = $db->prepare($request);
        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function deleteById($idT)
    {
        global $db;
        $request = "UPDATE tarif SET actif = 0 WHERE ID_Tarif = :idT";
        $sql = $db->prepare($request);
        $sql->bindValue(':idT', $idT, PDO::PARAM_INT);
        try {
            return $sql->execute();
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }
}
