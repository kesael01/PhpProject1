<hgroup>
    <h3 class="aligner txtGras">Catalogue des destinations</h3>
    <h4 class="text-muted aligner">DVD - Blu Ray</h4>
</hgroup>
<?php

//récupération des films
$vue = new DestinationsDB($cnx);
$liste = array();
$liste = null;

$liste = $vue->getAllDestinations();
$nbr = count($liste);
?>

<div class="row">
    <div class="col-sm-12">
        <a href="./pages/printCatalogue.php" class="pull-right" target="_blank">Imprimer</a>
    </div>
</div>

<br/>

<h2 id="titre">Illustration d'un tableau dynamique</h2>

<div class="container table">
    <table class="table-responsive">
        <tr>
            <th class="ecart">Id</th>
            <th class="ecart">type</th>
            <th class="ecart">genre</th>
            <th class="ecart">denomination</th>
			<th class="ecart">description</th>
			<th class="ecart">prix</th>
            <th class="ecart">places</th>
        </tr>
        <?php
        for ($i = 0; $i < $nbr; $i++) {
            ?>
            <tr>
                <td class="ecart"><?php print $liste[$i]['id_desti']; ?></td>
                <td class="ecart"><?php print $liste[$i]['id_genre']; ?></td>
                <td class="ecart"><?php print $liste[$i]['id_type']; ?></td>
                <td><span contenteditable="true" name="nom_desti" class="ecart" id="<?php print $liste[$i]['id_desti']; ?>">
                        <?php print $liste[$i]['nom_desti']; ?></span>
                </td>
                <td><span contenteditable="true" name="description" class="ecart" id="<?php print $liste[$i]['id_desti']; ?>">
                        <?php print $liste[$i]['description']; ?></span>
                </td>
                <td><span contenteditable="true" name="prix" class="ecart" id="<?php print $liste[$i]['id_desti']; ?>">
                        <?php print $liste[$i]['prix']; ?></span>
                </td>
                <td><span contenteditable="true" name="places" class="ecart" id="<?php print $liste[$i]['id_desti']; ?>">
                        <?php print $liste[$i]['places']; ?></span>
                </td>
            </tr>
            <?php
        }
        ?>

    </table>  
</div>