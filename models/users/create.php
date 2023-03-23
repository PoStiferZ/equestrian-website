<a href="index.php">Liste</a>
<!-- Conteneur GRID principal -->
<div class="container-grid">
    <!-- Deuxième Conteneur GRID (Title + Photo) -->
    <div class="items items-photo">
        <!-- Div Title -->
        <div class="subItem-left-title">
            <p class="title_cav">AJOUTER UN UTILISATEUR</p>
        </div>
        <!-- Div Photo -->
        <div class="subItem-left-photo">
            <img src="../../styles/css/assets/img/form/cavalier3.PNG" alt="">
        </div>
    </div>
    <form class="items items-form" method="POST" action="traitement.php" enctype="multipart/form-data">
        <div class="subItem-right-1">
            <div class="subItem-name">
                <label>Email</label>
                <input type="text" name="email">
            </div>
            <div class="subItem-name">
                <label>Mot de passe</label>
                <input type="password" name="mdp">
                <div class="subItem-right-6">
                    <button class="btn btn-next" name="submit">AJOUTER</button>
                </div> 
            </div>
        </div>

            <div class="subItem-name">
                <?php //$utilisateur = $oUsers->optionUtilisateur();?>
                <select name="idPersonne">
                    <optgroup>
                        <?php
                        foreach ($utilisateur as $value) {
                            echo "<option value='" . $value['ID_Personne'] . "' >" . $value['nom'] . $value['prenom'] . "</option>";
                        }
                        ?>
                    </optgroup>
                </select>
            </div>
        </div>
 
 
</div>