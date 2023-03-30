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

    /* public function create($idPersonne, $idCours)
    {
        global $db;
        $request2 = "SELECT id FROM events WHERE ID_Recurrence = :idCours";
        $sql2 = $db->prepare($request2);
        $sql2->bindValue(':idCours', $idCours, PDO::PARAM_INT);
        $sql2->execute();
        $idCours = $sql2->fetchAll(PDO::FETCH_ASSOC);

        foreach ($idCours as $unCours) {
            $request = "INSERT INTO inscription_cours (id_personne, id_cours, presence) VALUES (:id_personne, :id_cours, 1);";
            $sql = $db->prepare($request);
            $sql->bindValue(':id_personne', $idPersonne, PDO::PARAM_INT);
            $sql->bindValue(':id_cours', $unCours['id'], PDO::PARAM_INT);
        }
        try {
            return $sql->execute();
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    } */

    public function create($idPersonne, $idCours)
    {
        global $db;
        $request2 = "SELECT id FROM events WHERE ID_Recurrence = :idCours";
        $sql2 = $db->prepare($request2);
        $sql2->bindValue(':idCours', $idCours, PDO::PARAM_INT);
        $sql2->execute();
        $idCours = $sql2->fetchAll(PDO::FETCH_ASSOC);

        $success = true;
        foreach ($idCours as $unCours) {
            $request = "INSERT INTO inscription_cours (id_personne, id_cours, presence) VALUES (:id_personne, :id_cours, 1);";
            $sql = $db->prepare($request);
            $sql->bindValue(':id_personne', $idPersonne, PDO::PARAM_INT);
            $sql->bindValue(':id_cours', $unCours['id'], PDO::PARAM_INT);
            try {
                $success = $success && $sql->execute();
            } catch (PDOException $e) {
                $success = false;
                // Log or handle the error here.
            }
        }

        return $success;
    }

    public function findAll()
    {
        global $db;
        $request = "SELECT DISTINCT(ID_Recurrence), title FROM events";
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

    public function beMissing($idPersonne, $idCours)
    {
        global $db;
        $request = "UPDATE inscription_cours SET presence = 0 WHERE id_personne = :idPersonne AND id_cours = :idCours";
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
