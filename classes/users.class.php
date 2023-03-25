<?php

class Users
{
    private $idConn;
    private $email;
    private $motDePasse;
    private $role;
    private $idPersonne;
    private $errmessage;

    public function __construct($email, $mdp, $role, $idPersonne)
    {
        $this->email = $email;
        $this->motDePasse = $mdp;
        $this->role = $role;
        $this->idPersonne = $idPersonne;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of mdp
     */
    public function getMotDPasse()
    {
        return  $this->motDePasse;
    }

    /**
     * Set the value of mdp
     *
     * @return  self
     */
    public function setMotDePasse($mdp)
    {
        $this->motDePasse = $mdp;

        return $this;
    }

    /**
     * Get the value of role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */
    public function setRole($role)
    {
        $this->role = $role;

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

    public function create($email, $mdp, $idPersonne)
    {
        global $db;
        $request = "INSERT INTO users (email, mot_de_passe, role, ID_personne, actif) VALUES(:email, :mdp, 1, :idPersonne)";
        $sql = $db->prepare($request);
        $sql->bindValue(':email', $email, PDO::PARAM_STR);
        $sql->bindValue(':mdp', $mdp, PDO::PARAM_STR);
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
            "SELECT ID_Conn, email, mot_de_passe, nom, prenom
                FROM users U
                INNER JOIN personne P ON U.ID_Personne = P.ID_Personne
                WHERE U.role='1'";
        $sql = $db->prepare($request);
        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function findById($idConn)
    {
        global $db;
        $request =
            "SELECT ID_Conn, email, mot_de_passe, nom, prenom
                FROM users U
                INNER JOIN personne P ON U.ID_Personne = P.ID_Personne
                WHERE U.role='1' and ID_Conn = :idConn";

        $sql = $db->prepare($request);
        $sql->bindValue(':idConn', $idConn, PDO::PARAM_INT);
        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }
    public function optionUtilisateur()
    {
        global $db;
        $request = "SELECT ID_Personne, nom, prenom FROM personne WHERE actif = 1";
        $sql = $db->prepare($request);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
