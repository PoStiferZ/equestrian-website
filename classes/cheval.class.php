<?php

class Cheval
{
    private $ID_Cheval;
    private $nomCheval;
    private $dateNaissanceCheval;
    private $sir;
    private $photo;
    private $idRobe;

    private $errmessage;

    public function __construct($nomC, $dnaC, $sir, $photo, $idRobe)
    {
        $this->nomCheval = $nomC;
        $this->dateNaissanceCheval = $dnaC;
        $this->sir = $sir;
        $this->photo = $photo;
        $this->idRobe = $idRobe;
    }

    /**
     * Get the value of nomCheval
     */
    public function getNomCheval()
    {
        return $this->nomCheval;
    }

    /**
     * Set the value of nomCheval
     *
     * @return  self
     */
    public function setNomCheval($nomC)
    {
        $this->nomCheval = $nomC;

        return $this;
    }


    /**
     * Get the value of dateNaissanceCheval
     */
    public function getDateNaissanceCheval()
    {
        return $this->dateNaissanceCheval;
    }

    /**
     * Set the value of dateNaissanceCheval
     *
     * @return  self
     */
    public function setDateNaissanceCheval($dnaC)
    {
        $this->dateNaissanceCheval = $dnaC;

        return $this;
    }

    /**
     * Get the value of SirCheval
     */
    public function getSir()
    {
        return $this->sir;
    }

    /**
     * Set the value of SirCheval
     *
     * @return  self
     */
    public function setSirCheval($sir)
    {
        $this->sir = $sir;

        return $this;
    }

    /**
     * Get the value of ID_Cheval
     */
    public function getID_Cheval()
    {
        return $this->ID_Cheval;
    }

    /**
     * Get the value of photo
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set the value of photo
     *
     * @return  self
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get the value of SirCheval
     */
    public function getIdRobe()
    {
        return $this->idRobe;
    }

    /**
     * Set the value of SirCheval
     *
     * @return  self
     */
    public function setIdRobe($idRobe)
    {
        $this->idRobe = $idRobe;

        return $this;
    }

    public function create($nomC, $dnaC, $photo, $sir, $idRobe)
    {
        global $db;

        // Traitement des images 
        $dir_name = "../../assets/uploadimg/";

        /* if (isset($_POST['submit'])) { */

        $tmpName = $_FILES['photo']['tmp_name'];
        $name = $_FILES['photo']['name'];
        $size = $_FILES['photo']['size'];
        $error = $_FILES['photo']['error'];

        $tabExtension = explode('.', $name);
        $extension = strtolower(end($tabExtension));

        $format = ['jpg', 'png', 'jpeg', 'gif'];
        $maxSize = 4000000;

        if (in_array($extension, $format) && $size <= $maxSize && $error == 0) {
            $uniqueName = uniqid('', true);
            //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
            $file = $uniqueName . "." . $extension;
            //$file = 5f586bf96dcd38.73540086.jpg
            move_uploaded_file($tmpName, $dir_name . $file);
        } else {
            echo "Mauvaise extension ou taille trop grande";
        }


        $request = "INSERT INTO cheval (nom_Cheval, DateNaissance_Cheval, photo, SIR, ID_Robe, actif) VALUES(:nomC, :dnaC, :photo, :sir, :idRobe, 1)";
        $sql = $db->prepare($request);
        $sql->bindValue(':nomC', $nomC, PDO::PARAM_STR);
        $sql->bindValue(':dnaC', $dnaC, PDO::PARAM_STR);
        $sql->bindValue(':sir', $sir, PDO::PARAM_INT);
        $sql->bindValue(':photo', $file, PDO::PARAM_STR);
        $sql->bindValue(':idRobe', $idRobe, PDO::PARAM_INT);
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
            "SELECT ID_Cheval, nom_Cheval, DateNaissance_Cheval, photo, SIR, libelleRobe
        FROM cheval C
        INNER JOIN robe R ON C.ID_Robe = R.ID_Robe
        WHERE C.actif='1'";
        $sql = $db->prepare($request);
        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function findById($idC)
    {
        global $db;
        $request =
            "SELECT * FROM cheval WHERE actif='1' AND ID_Cheval = :idC";
        $sql = $db->prepare($request);
        $sql->bindValue(':idC', $idC, PDO::PARAM_INT);
        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function updateById($idC, $nomC, $dnaC, $photo, $sir, $idRobe)
    {
        global $db;
        // Traitement des images 
        $dir_name = "../../assets/uploadimg/";

        $tmpName = $_FILES['photo']['tmp_name'];
        $name = $_FILES['photo']['name'];
        $size = $_FILES['photo']['size'];
        $error = $_FILES['photo']['error'];

        $tabExtension = explode('.', $name);
        $extension = strtolower(end($tabExtension));

        $format = ['jpg', 'png', 'jpeg', 'gif'];
        $maxSize = 4000000;

        if (in_array($extension, $format) && $size <= $maxSize && $error == 0) {
            $uniqueName = uniqid('', true);
            //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
            $file = $uniqueName . "." . $extension;
            //$file = 5f586bf96dcd38.73540086.jpg
            move_uploaded_file($tmpName, $dir_name . $file);
        } else {
            $dir_name = "false";
        }

        $request = "UPDATE cheval SET nom_Cheval = :nomC, DateNaissance_Cheval = :dnaC, photo = :photo, SIR = :sir, ID_Robe = :idRobe WHERE ID_Cheval = :idC";
        $sql = $db->prepare($request);
        $sql->bindValue(':idC', $idC, PDO::PARAM_INT);
        $sql->bindValue(':nomC', $nomC, PDO::PARAM_STR);
        $sql->bindValue(':dnaC', $dnaC, PDO::PARAM_STR);
        $sql->bindValue(':sir', $sir, PDO::PARAM_INT);
        if ($dir_name == "false") {
            $request2 = "SELECT photo FROM cheval WHERE actif='1' AND ID_Cheval =:id";
            $sql2 = $db->prepare($request2);
            $sql2->bindValue(':id', $idC, PDO::PARAM_INT);
            $sql2->execute();
            $photo = $sql2->fetchAll(PDO::FETCH_ASSOC);
            foreach ($photo as $value) {
                $sql->bindValue(':photo', $value['photo'], PDO::PARAM_STR);
            }
        } else {
            $sql->bindValue(':photo', $file, PDO::PARAM_STR);
        }
        $sql->bindValue(':idRobe', $idRobe, PDO::PARAM_INT);
        try {
            return $sql->execute();
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function deleteById($idC)
    {
        global $db;
        $request = "UPDATE cheval SET actif = 0 WHERE ID_Cheval = :idC";
        $sql = $db->prepare($request);
        $sql->bindValue(':idC', $idC, PDO::PARAM_INT);
        try {
            return $sql->execute();
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }
}
