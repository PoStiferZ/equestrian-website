<?php

class Contact
{
    private $nom;
    private $prenom;
    private $mail;
    private $sujet;
    private $message;
    private $errmessage;

    public function __construct($nom, $prenom, $mail, $sujet, $message)
    {
        $this->nom = $nom;
        $this->$prenom = $prenom;
        $this->$mail = $mail;
        $this->$sujet = $sujet;
        $this->$message = $message;
    }



    public function create($nom, $prenom, $mail, $sujet, $message, $dateContact)
    {
        global $db;
        $request = "INSERT INTO contact (nom, prenom, mail, sujet, commentaire, dateContact) VALUES(:nom, :prenom, :mail, :sujet, :commentaire, :dateContact)";
        $sql = $db->prepare($request);
        $sql->bindValue(':nom', $nom, PDO::PARAM_STR);
        $sql->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $sql->bindValue(':mail', $mail, PDO::PARAM_STR);
        $sql->bindValue(':sujet', $sujet, PDO::PARAM_STR);
        $sql->bindValue(':commentaire', $message, PDO::PARAM_STR);
        $sql->bindValue(':dateContact', $dateContact, PDO::PARAM_STR);
        try {
            return $sql->execute();
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function findAll()
    {
        global $db;
        $request = "SELECT * FROM contact";
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
