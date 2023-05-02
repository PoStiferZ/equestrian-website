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
        $request = "SELECT * FROM contact WHERE actif = 1";
        $sql = $db->prepare($request);
        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }


    public function deleteById($id)
    {
        global $db;
        $request = "UPDATE contact SET actif = 0 WHERE id = :id";
        $sql = $db->prepare($request);
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        try {
            return $sql->execute();
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }
}
