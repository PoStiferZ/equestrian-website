<?php

class InscriptionCours
{

    private $idPersonne;
    private $idCours;
    private $presence;

    public function __construct($idPersonne, $idCours, $presence)
    {
        $this->idPersonne = $idPersonne;
        $this->idCours = $idCours;
        $this->presence = $presence;
    }

    private $errmessage = "Erreur Inscription Cours";


    /**
     * Get the value of idCours
     */
    public function getIdCours()
    {
        return $this->idCours;
    }

    /**
     * Set the value of idCours
     *
     * @return  self
     */
    public function setIdCours($idCours)
    {
        $this->idCours = $idCours;

        return $this;
    }

    /**
     * Get the value of idPersonne
     */
    public function getIdPersonne()
    {
        return $this->idPersonne;
    }

    /**
     * Set the value of idPersonne
     *
     * @return  self
     */
    public function setIdPersonne($idPersonne)
    {
        $this->idPersonne = $idPersonne;

        return $this;
    }

    /**
     * Get the value of presence
     */
    public function getPresence()
    {
        return $this->presence;
    }

    /**
     * Set the value of presence
     *
     * @return  self
     */
    public function setPresence($presence)
    {
        $this->presence = $presence;

        return $this;
    }



    public function create($idPersonne, $idCours)
    {
        global $db;
        $request2 = "SELECT id FROM events WHERE idRecurrence = :idCours";
        $sql2 = $db->prepare($request2);
        $sql2->bindValue(':idCours', $idCours, PDO::PARAM_INT);
        $sql2->execute();
        $idDesCours = $sql2->fetchAll(PDO::FETCH_ASSOC);

        $success = true;
        foreach ($idDesCours as $unCours) {
            $request = "INSERT INTO inscription_cours (idP, idC, idRecurrence, presence) VALUES (:idP, :idC, :idRecurrence, 1);";
            $sql = $db->prepare($request);
            $sql->bindValue(':idP', $idPersonne, PDO::PARAM_INT);
            $sql->bindValue(':idC', $unCours['id'], PDO::PARAM_INT);
            $sql->bindValue(':idRecurrence', $idCours, PDO::PARAM_INT);
            try {
                $success = $success && $sql->execute();
            } catch (PDOException $e) {
                $success = false;
                // Log or handle the error here.
            }
        }

        return $success;
    }

    public function deleteInscription($idPersonne, $idRecurrence)
    {
        global $db;
        $request = "DELETE FROM inscription_cours WHERE idP = :idPersonne AND idRecurrence = :idRecurrence";
        $sql = $db->prepare($request);
        $sql->bindValue(':idRecurrence', $idRecurrence, PDO::PARAM_INT);
        $sql->bindValue(':idPersonne', $idPersonne, PDO::PARAM_INT);
        $sql->execute();
    }
    public function inscriptionSiNonInscrit($idPersonne)
    {
        global $db;
        $request = "SELECT DISTINCT E.idRecurrence, E.title 
        FROM events E
        LEFT JOIN inscription_cours I ON E.idRecurrence = I.idRecurrence AND I.idP = :idPersonne
        WHERE I.idRecurrence IS NULL;
        ";
        $sql = $db->prepare($request);
        $sql->bindValue(':idPersonne', $idPersonne, PDO::PARAM_INT);
        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function inscriptionById($idPersonne)
    {
        global $db;
        $request = "SELECT DISTINCT title, I.idRecurrence
        FROM inscription_cours I
        INNER JOIN events E ON I.idRecurrence = E.idRecurrence
        WHERE idP = :idPersonne";
        $sql = $db->prepare($request);
        $sql->bindValue(':idPersonne', $idPersonne, PDO::PARAM_INT);
        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function pagination($idPersonne)
    {
        global $db;
        $request = "SELECT COUNT(*) FROM inscription_cours WHERE idP = :idPersonne";
        $sql = $db->prepare($request);
        $sql->bindValue(':idPersonne', $idPersonne, PDO::PARAM_INT);
        $sql->execute();
        $total = $sql->fetchColumn();
        try {
            return $pages = ceil($total / 5);
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

    public function beMissing($idPersonne, $idCours)
    {
        global $db;
        $request = "UPDATE inscription_cours SET presence = 0 WHERE idP = :idPersonne AND idC = :idCours";
        $sql = $db->prepare($request);
        $sql->bindValue(':idPersonne', $idPersonne, PDO::PARAM_INT);
        $sql->bindValue(':idCours', $idCours, PDO::PARAM_INT);
        try {
            return $sql->execute();
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function bePresent($idPersonne, $idCours)
    {
        global $db;
        $request = "UPDATE inscription_cours SET presence = 1 WHERE idP = :idPersonne AND idC = :idCours";
        $sql = $db->prepare($request);
        $sql->bindValue(':idPersonne', $idPersonne, PDO::PARAM_INT);
        $sql->bindValue(':idCours', $idCours, PDO::PARAM_INT);
        try {
            return $sql->execute();
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }
}
