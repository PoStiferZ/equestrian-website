<?php

class Inscription
{
    // Propriétés

    private $idInscription;
    private $annee;
    private $cotisationFFE;
    private $cotisationCentre;
    private $idPersonne;
    private $errmessage;


    public function __construct($an, $cffe, $cc, $idPersonne)
    {

        $this->annee = $an;
        $this->cotisationFFE = $cffe;
        $this->cotisationCentre = $cc;
        $this->idPersonne = $idPersonne;
    }


    /**
     * Get the value of an
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set the value of an
     *
     * @return  self
     */
    public function setAnnee($an)
    {
        $this->annee = $an;

        return $this;
    }

    /**
     * Get the value of cffe
     */
    public function getCotisationFFE()
    {
        return $this->cotisationFFE;
    }

    /**
     * Set the value of cffe
     *
     * @return  self
     */
    public function setCotisationFFE($cffe)
    {
        $this->cotisationFFE = $cffe;

        return $this;
    }

    /**
     * Get the value of cc
     */
    public function getCotisationCentre()
    {
        return $this->cotisationCentre;
    }

    /**
     * Set the value of cc
     *
     * @return  self
     */
    public function setCotisationCentre(int $cc)
    {
        $this->cotisationCentre = $cc;

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

    public function create($an, $cffe, $cc, $idPersonne)
    {
        global $db;
        $request = "INSERT INTO inscription (annee, CotisationFFE, CotisationCentre, ID_personne, actif) VALUES(:an, :cffe, :cc, :idPersonne,1)";
        $sql = $db->prepare($request);
        $sql->bindValue(':an', $an, PDO::PARAM_STR);
        $sql->bindValue(':cffe', $cffe, PDO::PARAM_INT);
        $sql->bindValue(':cc', $cc, PDO::PARAM_INT);
        $sql->bindValue(':idPersonne', $idPersonne, PDO::PARAM_INT);
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
            "SELECT ID_Inscription, annee, CotisationFFE, CotisationCentre, nom, prenom
            FROM inscription I
            INNER JOIN personne P ON I.idPersonne = P.idPersonne
            WHERE I.actif='1'";
        $sql = $db->prepare($request);
        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function findById($idInscription)
    {
        global $db;
        $request =
            "SELECT ID_Inscription, annee, CotisationFFE, CotisationCentre, nom, prenom
            FROM inscription I
            INNER JOIN personne P ON I.idPersonne = P.idPersonne
            WHERE I.actif='1' and ID_Inscription = :idInscription";

        $sql = $db->prepare($request);
        $sql->bindValue(':idInscription', $idInscription, PDO::PARAM_INT);
        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function updateById($idInscription, $an, $cffe, $cc, $idPersonne)
    {
        global $db;
        $request = "UPDATE inscription SET annee = :an, CotisationFFE = :cffe, CotisationCentre = :cc, idPersonne = :idPersonne WHERE ID_Inscription = :idInscription";
        $sql = $db->prepare($request);
        $sql->bindValue(':idInscription', $idInscription, PDO::PARAM_INT);
        $sql->bindValue(':an', $an, PDO::PARAM_STR);
        $sql->bindValue(':cffe', $cffe, PDO::PARAM_INT);
        $sql->bindValue(':cc', $cc, PDO::PARAM_INT);
        $sql->bindValue(':idPersonne', $idPersonne, PDO::PARAM_INT);
        try {
            return $sql->execute();
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function deleteById($idInscription)
    {
        global $db;
        $request = "UPDATE inscription SET actif = 0 WHERE ID_Inscription = :idInscription";
        $sql = $db->prepare($request);
        $sql->bindValue(':idInscription', $idInscription, PDO::PARAM_INT);
        try {
            return $sql->execute();
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function optionPersonne()
    {
        global $db;
        $request = "SELECT idPersonne, nom, prenom FROM personne WHERE actif = 1";
        $sql = $db->prepare($request);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
