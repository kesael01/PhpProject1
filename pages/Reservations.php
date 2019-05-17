<div class = "container">
    <div class = "row">
        <?php
        if (!empty($_POST)) {
            $date = strtotime($_POST["date"]);
            $_POST["date"] = date('Y-m-d', $date);
            //var_dump($date);
            $ReservationsDB = new ReservationsDB($cnx);
            /*$newReservation = [
                "BUDGET" => $_POST["budget"],
                "DATE" => $_POST["date"],
                "DESTINATION" => $_POST["destination"],
                "EMAIL_CLIENT" => $_POST["email"],
                "NBR_PERSONNES" => $_POST["nbre"],
                "NOM_CLIENT" => $_POST["nom"],
                "PAYS_CLIENT" => $_POST["pays"],
                "TEL_CLIENT" => $_POST["tel"],
                "VILLE_CLIENT" => $_POST["ville"]
            ];*/
            //print_r($newReservations);
            $success = $ReservationsDB->addReservations($newReservation);
            if ($success) {
                $_SESSION["successReservation"] = "<strong>Réservation envoyée</strong>";
            }
        }
        if (isset($_SESSION["successReservation"])):
            ?>
            <div class="alert alert-info w-75" role="alert">
                <?= $_SESSION["successReservation"]; ?>
            </div>
            <?php
            unset($_SESSION["successReservation"]);
        endif;
        ?>

        <div class = "col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb30 text-center">
            <h2>Formulaire de réservation</h2>
        </div>
    </div>
    <div class = "row">

        <div class = "col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb30">
            <div class = "tour-booking-form">
                <form method="post">
                    <div class = "row">
                        <div class = "col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <h4 class = "tour-form-title">Demande de réservation</h4>
                        </div>
                        <div class = "col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class = "form-group">
                                <label class = "control-label required" for = "destination">Destination</label>
                                <div class = "select">
                                    <select id = "select" name = "destination" class = "form-control">
                                        <?php
                                        $Destinations = new DestinationsDB($cnx);
                                        $datas = $Destinations->getAllDestinations();
                                        foreach ($datas as $data):
                                            ?>
                                            <option value = "<?php print $data['id_desti']; ?>"><?php print $data['nom_desti']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class = "col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class = "form-group">
                                <label class = "control-label required">Date</label>
                                <div class = "container">
                                    <div class = "rowdate">
                                        <!-- Bootstrap Datepicker -->
                                        <link rel = "stylesheet"
                                              href = "//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css"/>
                                        <link rel = "stylesheet"
                                              href = "//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css"/>

                                        <script
                                        src = "//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>


                                        <div class = "form-group">
                                            <div class = "col-xs-5 date">
                                                <div class = "input-group input-append date" id = "datePicker">
                                                    <input type = "text" class = "form-control" name = "date"/>
                                                    <span class = "input-group-addon add-on"><span
                                                            class = "glyphicon glyphicon-calendar"></span></span>
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                            $(document).ready(function () {
                                                $('#datePicker')
                                                        .datepicker({
                                                            format: 'mm/dd/yyyy'
                                                        })
                                                        .on('changeDate', function (e) {
                                                            // Revalidate the date field
                                                            $('#eventForm').formValidation('revalidateField', 'date');
                                                        });

                                                $('#eventForm').formValidation({
                                                    framework: 'bootstrap',
                                                    icon: {
                                                        valid: 'glyphicon glyphicon-ok',
                                                        invalid: 'glyphicon glyphicon-remove',
                                                        validating: 'glyphicon glyphicon-refresh'
                                                    },
                                                    fields: {
                                                        name: {
                                                            validators: {
                                                                notEmpty: {
                                                                    message: 'The name is required'
                                                                }
                                                            }
                                                        },
                                                        date: {
                                                            validators: {
                                                                notEmpty: {
                                                                    message: 'The date is required'
                                                                },
                                                                date: {
                                                                    format: 'MM/DD/YYYY',
                                                                    message: 'The date is not a valid'
                                                                }
                                                            }
                                                        }
                                                    }
                                                });
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--<div class = "col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class = "form-group">
                                <label class = "control-label required" for = "nbre">Nombre d'enfants moins de 2 ans</label>
                                <div class = "select">
                                    <select id = "select" name = "nbre" class = "form-control">
                                        <option value = "1">01</option>
                                        <option value = "2">02</option>
                                        <option value = "3">03</option>
                                        <option value = "4">04</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class = "col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class = "form-group">
                                <label class = "control-label required" for = "budget">billet</label>
                                <div class = "select">
                                    <select id = "select" name = "budget" class = "form-control">
                                        <option value = "150">150</option>
                                        <option value = "300">300</option>
                                        <option value = "500">500</option>
                                        <option value = "1000">1000</option>
                                        <option value = "1500">1500</option>
                                        <option value = "2000">2000</option>
                                    </select>
                                </div>
                            </div>
                        </div> -->
                        <div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12 mt30">
                            <h4 class = "tour-form-title">Vos coordonnées</h4>
                        </div>
                        <div class = "col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class = "form-group">
                                <label class = "control-label" for = "nom">Nom</label>
                                <input id = "name" type = "text" name="nom" placeholder = "Votre nom" class = "form-control" required>
                            </div>
                        </div>
                        <div class = "col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class = "form-group">
                                <label class = "control-label" for = "email">Email</label>
                                <input id = "email" type = "text" name="email" placeholder = "xxxx@xxxx.xxx" class = "form-control"
                                       required>
                            </div>
                        </div>
                        <div class = "col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                            <div class = "form-group">
                                <label class = "control-label" for = "tel">Téléphone</label>
                                <input id = "phone" type = "text" name="tel" placeholder = "xxxx/xx/xx/xx" class = "form-control"
                                       required>
                            </div>
                        </div>
                        <div class = "col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                            <div class = "form-group">
                                <label class = "control-label" for = "pays">Pays</label>
                                <input id = "country" type = "text" name = "pays" placeholder = "Belgique" class = "form-control"
                                       required>
                            </div>
                        </div>
                        <div class = "col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                            <div class = "form-group">
                                <label class = "control-label" for = "ville">Ville</label>
                                <input id = "city" type = "text" name="ville" placeholder = "Mons" class = "form-control"
                                       required>
                            </div>
                        </div>
                        <div class = "col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <button type = "submit" name = "singlebutton" class = "btn btn-primary">envoyer la demande</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>
</div