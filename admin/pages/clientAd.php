<hgroup>
    <h3 class="aligner txtGras">Liste des Clients</h3>
    <h4 class="text-muted aligner"> </h4>
</hgroup>
<?php

//récupération des destinations
$vue = new ClientDB($cnx);
$liste = array();
$liste = null;

$liste = $vue->getClient();
$nbr = count($liste);
?>

<div class="row">
    <div class="col-sm-12">
        <a href="./pages/printClientAd.php" class="pull-right" target="_blank">Imprimer</a>
    </div>
</div>

<br/>

<h2 id="titre">Illustration d'un tableau dynamique</h2>

<div class="container table">
    <table class="table-responsive">
        <tr>
            <th class="ecart">Id</th>
            <th class="ecart">Nom</th>
            <th class="ecart">Email</th>
            <th class="ecart">Password</th>
	    <th class="ecart">Adresse</th>
            <th class="ecart">Numero</th>
	    <th class="ecart">Localite</th>
	   <th class="ecart">Code Postal</th>
        </tr>
        <?php
        for ($i = 0; $i < $nbr; $i++) {
            ?>
            <tr>
                <td class="ecart"><?php print $liste[$i]['id_client']; ?></td>
              
                <td><span contenteditable="true" name="nom" class="ecart" id="<?php print $liste[$i]['id_client']; ?>">
                        <?php print $liste[$i]['nom']; ?></span>
                </td>
                <td><span contenteditable="true" name="email" class="ecart" id="<?php print $liste[$i]['id_client']; ?>">
                        <?php print $liste[$i]['email_client']; ?></span>
                </td>
                <td><span contenteditable="true" name="password" class="ecart" id="<?php print $liste[$i]['id_client']; ?>">
                        <?php print $liste[$i]['password_client']; ?></span>
                </td>
				<td><span contenteditable="true" name="adresse" class="ecart" id="<?php print $liste[$i]['id_client']; ?>">
                        <?php print $liste[$i]['adresse']; ?></span>
                </td>
                <td><span contenteditable="true" name="numero" class="ecart" id="<?php print $liste[$i]['id_client']; ?>">
                        <?php print $liste[$i]['numero']; ?></span>
                </td>
				<td><span contenteditable="true" name="localite" class="ecart" id="<?php print $liste[$i]['id_client']; ?>">
                        <?php print $liste[$i]['localite']; ?></span>
                </td>
				<td><span contenteditable="true" name="cp" class="ecart" id="<?php print $liste[$i]['id_client']; ?>">
                        <?php print $liste[$i]['cp']; ?></span>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>  
</div>
