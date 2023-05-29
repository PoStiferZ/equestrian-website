<?php

class Cours
{

    private $id;
    private $title;
    private $startEvent;
    private $endEvent;
    private $color;
    private $textColor;
    private $idRecurrence;

    public function __construct($id, $t, $sE, $eE, $c, $tC, $iR)
    {
        $this->id = $id;
        $this->title = $t;
        $this->startEvent = $sE;
        $this->endEvent = $eE;
        $this->color = $c;
        $this->textColor = $tC;
        $this->idRecurrence = $iR;
    }


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of startEvent
     */
    public function getStartEvent()
    {
        return $this->startEvent;
    }

    /**
     * Set the value of startEvent
     *
     * @return  self
     */
    public function setStartEvent($startEvent)
    {
        $this->startEvent = $startEvent;

        return $this;
    }

    /**
     * Get the value of endEvent
     */
    public function getEndEvent()
    {
        return $this->endEvent;
    }

    /**
     * Set the value of endEvent
     *
     * @return  self
     */
    public function setEndEvent($endEvent)
    {
        $this->endEvent = $endEvent;

        return $this;
    }

    /**
     * Get the value of color
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get the value of textColor
     */
    public function getTextColor()
    {
        return $this->textColor;
    }

    /**
     * Set the value of textColor
     *
     * @return  self
     */
    public function setTextColor($textColor)
    {
        $this->textColor = $textColor;

        return $this;
    }

    /**
     * Get the value of idRecurrence
     */
    public function getIdRecurrence()
    {
        return $this->idRecurrence;
    }

    /**
     * Set the value of idRecurrence
     *
     * @return  self
     */
    public function setIdRecurrence($idRecurrence)
    {
        $this->idRecurrence = $idRecurrence;

        return $this;
    }

    private $errmessage = "Erreur Cours";

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
        $request = "SELECT * FROM events";
        $sql = $db->prepare($request);
        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function findById($idPersonne, $limit, $offset)
    {
        global $db;
        $request = "SELECT I.idP, I.presence, E.id, E.title, E.startEvent, E.end_event, 
        TIMESTAMPDIFF(HOUR, E.startEvent, E.end_event) AS duree
        FROM inscription_cours I 
        INNER JOIN events E ON I.idC = E.id
        WHERE idP = :idPersonne
        AND E.startEvent >= NOW()
        ORDER BY E.startEvent ASC
        LIMIT :limite OFFSET :offset";
        $sql = $db->prepare($request);
        $sql->bindValue(':idPersonne', $idPersonne, PDO::PARAM_INT);
        $sql->bindValue(':limite', $limit, PDO::PARAM_INT);
        $sql->bindValue(':offset', $offset, PDO::PARAM_INT);
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
