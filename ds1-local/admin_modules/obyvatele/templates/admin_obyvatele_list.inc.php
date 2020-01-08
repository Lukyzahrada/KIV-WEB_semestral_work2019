<div class="container-fluid" ng-app="ds1">
    <div class="card">
        <div class="card-header">
            <div class="pull-left">
                Seznam obyvatel - <?php echo $obyvatele_list_name; ?>
            </div>
            <div class="pull-right">
                <!-- odkaz pro pridani obyvatele -->
                <a href="<?php echo $url_obyvatel_add_prepare;?>" class="btn btn-primary btn-sm"><i class="icon-plus"></i> Přidat obyvatele</a>
            </div>
        </div>
        <div ng-controller="crudController">

            <div class="container" ng-init="fetchData()">
                <br />
                <h3 align="center">AngularJS PHP CRUD (Create, Read, Update, Delete) using Bootstrap Modal</h3>
                <br />
                <div class="alert alert-success alert-dismissible" ng-show="success" >
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{successMessage}}
                </div>
                <div align="right">
                    <button type="button" name="add_button" ng-click="addData()" class="btn btn-success">Add</button>
                </div>
                <br />
                <div class="table-responsive" style="overflow-x: unset;">
                    <table datatable="ng" dt-options="vm.dtOptions" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Jméno</th>
                            <th>Přijmení</th>
                            <th>Věk</th>
                            <th>Datum narození</th>
                            <th>Zkratka pojištovny</th>
                            <th>OP platnost DO</th>
                            <th>Upravit</th>
                            <th>Detail</th>
                            <th>Ubytování</th>
<!--                            <th>Last Name</th>-->
<!--                            <th>Edit</th>-->
<!--                            <th>Delete</th>-->
                        </tr>
                        </thead>
                        <tbody>
                        <tr ng-repeat="name in namesData">
                            <td>{{name.jmeno}}</td>
                            <td>{{name.prijmeni}}</td>
                            <td>{{name.vek}}</td>
                            <td>{{name.datum_narozeni}}</td>
                            <td>{{name.pojistovna_zkratka}}</td>
                            <td>{{name.op_platnost_do}}</td>
                            <td><button type="button" ng-click="changeData(name.id)" class="btn btn-warning btn-xs">Upravit</button></td>//uprav fetch single data na modal
                            <td><button type="button" ng-click="detail(name.id)" class="btn btn-warning btn-xs">Detail</button></td>
                            <td><button type="button" ng-click="accomodate(name.id)" class="btn btn-warning btn-xs">Ubytovat</button></td>
<!--                            <td>{{name.last_name}}</td>-->
<!--                            -->
<!--                            <td><button type="button" ng-click="deleteData(name.id)" class="btn btn-danger btn-xs">Delete</button></td>-->
                        </tr>
                        </tbody>
                    </table>
                    <input hidden type="text" id="obyvatele_list" value='<?php $obyvatele_json = json_encode($obyvatele_list);
                                                                        echo $obyvatele_json?>'>
                </div>

            </div>
        </div>

    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="crudmodal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="container-fluid">

                <form method="post" action="<?php echo $form_submit_url; ?>">
                    <input type="hidden" name="action" value="<?php echo $form_action_insert_obyvatel; ?>"/>

                    <div class="row">

                        <!-- START DETAIL OBYVATELE PRO UPDATE -->
                        <div class="col-md-12">

                            <div class="card">
                                <div class="card-header">
                                    Přidat obyvatele
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <table class='table table-striped table-bordered'>
                                            <tr>
                                                <th class='w-25'>Jméno</th>
                                                <td class='w-75'>
                                                    <input type="text" class="form-control" name="obyvatel[jmeno]" required />
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class='w-25'>Příjmení</th>
                                                <td class='w-75'>
                                                    <input type="text" class="form-control" name="obyvatel[prijmeni]" required />
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class='w-25'>Datum narození</th>
                                                <td class='w-75'>
                                                    <input type="date" class="form-control" name="obyvatel[datum_narozeni]" required />
                                                </td>
                                            </tr>
                                        </table>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="pull-left">

                                                <input type="submit" class="btn btn-primary btn-lg" value="Vytvořit obyvatele" />

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- card -->

                        </div> <!--col-md-12-->
                        <!-- KONEC DETAIL OBYVATELE -->

                    </div><!-- konec row-->


                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="crudmodal2">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" action="<?php echo $form_submit_url; ?>">
                <input type="hidden" name="action" value="<?php echo $form_action_update_obyvatel; ?>"/>
                <input type="hidden" id="obyvatel_id_submit" name="obyvatel_id" value="" />

                <div class="row">

                    <!-- START DETAIL OBYVATELE PRO UPDATE -->
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-header">
                                Editace obyvatele #
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <?php
                                    $text_columns = array();
                                    $text_columns["jmeno"] = "Jméno";
                                    $text_columns["prijmeni"] = "Příjmení";
                                    $text_columns["rodne_prijmeni"] = "Rodné příjmení";

                                    $text_columns["datum_narozeni"] = "Datum narození";
                                    $text_columns["tituly_pred"] = "Tituly před";
                                    $text_columns["tituly_za"] = "Tituly za";
                                    $text_columns["rodne_cislo"] = "Rodné číslo";
                                    $text_columns["misto_narozeni"] = "Místo narození";

                                    $text_columns["pojistovna_zkratka"] = "Pojišťovna zkratka";
                                    $text_columns["cislo_pojistence"] = "Číslo pojištěnce";

                                    $text_columns["adresa_ulice"] = "Adresa - ulice";
                                    $text_columns["adresa_cp"] = "Adresa - čp";
                                    $text_columns["adresa_mesto"] = "Adresa - město";
                                    $text_columns["op"] = "OP";
                                    $text_columns["op_platnost_do"] = "OP platnost do";
                                    $text_columns["kontaktni_osoba_jmeno"] = "Jméno kontaktní osoby";
                                    $text_columns["kontaktni_osoba_prijmeni"] = "Příjmení kontaktní osoby";
                                    $text_columns["kontaktni_osoba_cislo"] = "Telefonní číslo kontaktní osoby";

                                    // definice, ktera pole jsou datumy
                                    $dates_text_columns_keys = array();
                                    $dates_text_columns_keys[] = "datum_narozeni";
                                    $dates_text_columns_keys[] = "op_platnost_do";

                                    // tridy pro konkretni polozky
                                    $classes_for_columns = array();
                                    //$classes_for_columns["prijmeni"] = array("tr" => "table-success");


                                    // napoveda pro vse
                                    $input_help_desc = array();
                                    $input_help_desc["rodne_cislo"] = "Rodné číslo ukládáme textově. Klidně s lomítkem.";
                                    $input_help_desc["pojistovna_zkratka"] = "Např. VZP. Zkratku je potřeba ukládat stále stejně.";
                                    $input_help_desc["kontaktni_osoba_cislo"] = "Vkládáme bez předvolby";
                                    // popisy
                                    $textarea_columns = array();
                                    /*
                                   $textarea_columns["minipopis"] = "Mini popis";
                                   $textarea_columns["popis"] = "Popis";
                                   $textarea_columns["obsah"] = "Obsah";

                                   // viditelne
                                   $viditelne_pom = array(0 => "ne", 1 => "ano");
                                    */

                                    if ($text_columns != null) {

                                        echo "<table class='table table-striped table-bordered'>";

                                        /*
                                        // viditelne
                                        echo "<tr><th>Viditelné na webu</th><td><select name='obyvatel[viditelne]' class=\"form-control col-md-3\">";
                                        foreach ($viditelne_pom as $key => $value) {

                                            $selected_pom = "";
                                            if ($key == $obyvatel["viditelne"]) {
                                                $selected_pom = "selected = \"selected\"";
                                            }

                                            echo "<option value=\"$key\" $selected_pom>$value</option>";
                                        }
                                        echo "</select></td></tr>";
                                        */


                                        // zakladni texty vcetne datumu
                                        foreach ($text_columns as $key => $value) {

                                            // tridy
                                            $tr_class_pom = "";

                                            if (array_key_exists($key, $classes_for_columns)) {
                                                if (array_key_exists("tr", $classes_for_columns[$key])) {
                                                    $tr_class_pom = "class=\"".$classes_for_columns[$key]["tr"]."\"";
                                                }
                                            }
                                            // konec tridy

                                            echo "<tr $tr_class_pom>";
                                            echo "<th class='w-30'>$value</th>";
                                            echo "<td class='w-40'>";

                                            $input_type = "text";
                                            if (in_array($key, $dates_text_columns_keys)) {
                                                // je to datum
                                                $input_type = "date";
                                            }

                                            echo "<input type=\"$input_type\" id=\"$key\" class=\"form-control\" name=\"obyvatel[$key]\" value=\"\" />";
                                            echo "</td>";
                                            echo "<td class='w-30'>";
                                            // napoveda
                                            if (array_key_exists($key, $input_help_desc)) {
                                                // vypsat napovedu
                                                echo $input_help_desc[$key];
                                            }
                                            echo "</td>";
                                            echo "</tr>";
                                        }

                                        // prihodit popisy

                                        echo "</table>";
                                    }
                                    ?>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pull-left">

                                            <input type="submit" class="btn btn-primary btn-lg" value="Uložit změny" />

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- konec col-6 -->
                    <!-- KONEC DETAIL OBYVATELE -->

                </div><!-- konec row-->

            </form>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="crudmodal3">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Detail uživatele</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="row">

                <!-- START DETAIL OBYVATELE PRO UPDATE -->
                <div class="col-md-12">
            <table class="table table-striped table-bordered">
                <tbody>
                    <tr>
                        <th scope="col">Jméno</th>
                        <td id="table_jmeno"></td>
                        <th scope="col">Příjmení</th>
                        <td id="table_prijmeni"></td>
                    </tr>
                    <tr>
                        <th scope="col">Rodné příjmení</th>
                        <td id="table_rodne_prijmeni"></td>
                        <th scope="col">Datum narození</th>
                        <td id="table_datum_narozeni"></td>
                    </tr>
                    <tr>
                        <th scope="col">Tituly před</th>
                        <td id="table_tituly_pred"></td>
                        <th scope="col">Tituly za</th>
                        <td id="table_tituly_za"></td>
                    </tr>
                    <tr>
                        <th scope="col">Rodné číslo</th>
                        <td id="table_rodne_cislo"></td>
                        <th scope="col">Místo narození</th>
                        <td id="table_misto_narozeni"></td>
                    </tr>
                    <tr>
                        <th scope="col">Pojišťovna zkratka</th>
                        <td id="table_pojistovna_zkratka"></td>
                        <th scope="col">Číslo pojištěnce</th>
                        <td id="table_cislo_pojistence"></td>
                    </tr>
                    <tr>
                        <th scope="col">Ulice</th>
                        <td id="table_adresa_ulice"></td>
                        <th scope="col">ČP</th>
                        <td id="table_adresa_cp"></td>
                    </tr>
                    <tr>
                        <th scope="col">Město</th>
                        <td id="table_adresa_mesto"></td>
                        <th scope="col">Občanský průkaz</th>
                        <td id="table_op"></td>
                    </tr>
                    <tr>
                        <th scope="col">Platnost OP</th>
                        <td id="table_op_platnost_do"></td>
                        <th scope="col">Kontaktní osoba jméno</th>
                        <td id="table_kontaktni_osoba_jmeno"></td>
                    </tr>
                    <tr>
                        <th scope="col">Kontaktní osoba příjmení</th>
                        <td id="table_kontaktni_osoba_prijmeni"></td>
                        <th scope="col">Kontaktní osoba číslo</th>
                        <td id="table_kontaktni_osoba_cislo"></td>
                    </tr>
                </tbody>
            </table>
                    <div id="ubytovani">
                    <div class="modal-header">
                    <h3>Ubytování</h3>
                    </div>
                        <table class="table table-striped table-bordered">
                            <tbody>
                            <tr>
                                <th scope="col">Název pokoje</th>
                                <td id="table_pokoj_nazev"></td>
                                <th scope="col">Popis pokoje</th>
                                <td id="table_pokoj_popis"></td>
                            </tr>
                            <tr>
                                <th scope="col">Poschodí</th>
                                <td id="table_pokoj_poschodi"></td>
                                <th scope="col">Sociální zařízení</th>
                                <td id="table_pokoj_socialni_zarizeni"></td>
                            </tr>
                            <tr>
                                <th scope="col">Datum od</th>
                                <td id="table_pokoj_datum_od"></td>
                                <th scope="col">Datum do</th>
                                <td id="table_pokoj_datum_do"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="ubytovani_none">
                        <div class="modal-header">
                            Tento obyvatel není umístěn na žádném pokoji
                        </div>
                    </div>
        </div>
    </div>
</div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="crudmodal4">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" action="<?php echo $form_submit_url; ?>">
                <input type="hidden" id="hidden1" name="obyvatel_id" value=""/>
                <input type="hidden" id="hidden2" name="obyvatel[obyvatel_id]" value=""/>
                <input type="hidden" name="action" value="<?php echo $form_action; ?>"/>

                <div class="row">

                    <!-- START DETAIL OBYVATELE PRO UPDATE -->
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-header">
                                Přidat obyvatele na pokoj
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <table class='table table-striped table-bordered'>
                                        <tr>
                                            <th class='w-25'>Datum OD</th>
                                            <td class='w-75'>
                                                <input type="date" class="form-control" name="obyvatel[datum_od]" required />
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class='w-25'>Datum DO</th>
                                            <td class='w-75'>
                                                <input type="date" class="form-control" name="obyvatel[datum_do]"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class='w-25'>Pokoj</th>
                                            <td class='w-75'>
                                                <?php
                                                // printr($pokoje_list);

                                                if ($pokoje_list != null) {
                                                    echo "<select name=\"obyvatel[pokoj_id]\" required>";

                                                    foreach ($pokoje_list as $pokoj_item) {
                                                        echo "<option value=\"$pokoj_item[id]\">$pokoj_item[nazev] (poschodi: $pokoj_item[poschodi], kapacita: $pokoj_item[kapacita_osob] osob)</option>";
                                                    }

                                                    echo "</select>";
                                                }
                                                else {
                                                    echo "Chyba: pokoje nejsou k dispozici";
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    </table>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pull-left">

                                            <input type="submit" class="btn btn-primary btn-lg" value="Přidat obyvatele na pokoj" />

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- card -->

                    </div> <!--col-md-12-->


                </div><!-- konec row-->
            </form>
        </div>
    </div>
</div>