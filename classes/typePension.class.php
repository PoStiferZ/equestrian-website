<?php
class TypePension
{
    private $libelle_tp;
    private $errmessage;


    public function __construct($ltp)
    {
        $this->libelle_tp = $ltp;
    }

    /**
     * Get the value of libelle_tp
     */
    public function getLibelle_tp()
    {
        return $this->libelle_tp;
    }

    /**
     * Set the value of libelle_tp
     *
     * @return  self
     */
    public function setLibelle_tp($libelle_tp)
    {
        $this->libelle_tp = $libelle_tp;

        return $this;
    }

    public function create($ltp)
    {
        global $db;
        $request = "INSERT INTO typepension (libelle_TP, actif) VALUES(:ltp, 1)";
        $sql = $db->prepare($request);
        $sql->bindValue(':ltp', $ltp, PDO::PARAM_STR);
        try {
            return $sql->execute();
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function findAll()
    {
        global $db;
        $request = "SELECT * FROM typepension WHERE actif='1'";
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
        $request = "SELECT * FROM typepension WHERE actif='1' AND ID_TP =:id";
        $sql = $db->prepare($request);
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }


    public function updateById($id, $ltp)
    {
        global $db;
        $request = "UPDATE typepension SET libelle_TP = :ltp WHERE ID_TP = :id";
        $sql = $db->prepare($request);
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->bindValue(':ltp', $ltp, PDO::PARAM_STR);
        try {
            return $sql->execute();
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function deleteById($id)
    {
        global $db;
        $request = "UPDATE typepension SET actif = 0 WHERE ID_TP = :id";
        $sql = $db->prepare($request);
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        try {
            return $sql->execute();
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }
}
