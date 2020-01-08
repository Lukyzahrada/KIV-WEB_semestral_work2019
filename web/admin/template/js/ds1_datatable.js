

var app = angular.module('ds1', ['datatables']);
app.controller('crudController', function($scope, $http){

    $scope.success = false;

    $scope.error = false;

    $scope.fetchData = function(){
        $scope.namesData = JSON.parse(document.getElementById('obyvatele_list').getAttribute("value"));
        console.log(document.getElementById('obyvatele_list').getAttribute("value"));
    };

    $scope.openModal = function(){
        var modal_popup = angular.element('#crudmodal');
        modal_popup.modal('show');
    };

    $scope.openModal2 = function(){
        var modal_popup = angular.element('#crudmodal2');
        modal_popup.modal('show');
    };

    $scope.closeModal = function(){
        var modal_popup = angular.element('#crudmodal');
        modal_popup.modal('hide');
    };

    $scope.closeModal2 = function(){
        var modal_popup = angular.element('#crudmodal2');
        modal_popup.modal('hide');
    };

    $scope.addData = function(){
        $scope.modalTitle = 'Add Data';
        $scope.submit_button = 'Insert';
        $scope.openModal();
    };

    $scope.fetchSingleData = function(id){
        console.log($scope.namesData);
        var result = $scope.namesData.filter(name => {
            return name.id === id;
        });
        console.log(result);
        if(result[0].jmeno !== null){
            document.getElementById("jmeno").setAttribute("value", result[0].jmeno);
        }
        if(result[0].prijmeni !== null){
            document.getElementById("prijmeni").setAttribute("value", result[0].prijmeni);
        }
        if(result[0].rodne_prijmeni !== null){
            document.getElementById("rodne_prijmeni").setAttribute("value", result[0].rodne_prijmeni);
        }
        if(result[0].datum_narozeni !== null) {
             document.getElementById("datum_narozeni").setAttribute("value", result[0].datum_narozeni);
        }
        if(result[0].tituly_pred !== null) {
            document.getElementById("tituly_pred").setAttribute("value", result[0].tituly_pred);
        }
        if(result[0].tituly_za !== null) {
            document.getElementById("tituly_za").setAttribute("value", result[0].tituly_za);
        }
        if(result[0].rodne_cislo !== null) {
            document.getElementById("rodne_cislo").setAttribute("value", result[0].rodne_cislo);
        }
        if(result[0].misto_narozeni !== null) {
            document.getElementById("misto_narozeni").setAttribute("value", result[0].misto_narozeni);
        }
        if(result[0].pojistovna_zkratka !== null) {
            document.getElementById("pojistovna_zkratka").setAttribute("value", result[0].pojistovna_zkratka);
        }
        if(result[0].cislo_pojistence !== null) {
            document.getElementById("cislo_pojistence").setAttribute("value", result[0].cislo_pojistence);
        }
        if(result[0].adresa_ulice !== null) {
            document.getElementById("adresa_ulice").setAttribute("value", result[0].adresa_ulice);
        }
        if(result[0].adresa_cp !== null) {
            document.getElementById("adresa_cp").setAttribute("value", result[0].adresa_cp);
        }
        if(result[0].adresa_mesto !== null) {
            document.getElementById("adresa_mesto").setAttribute("value", result[0].adresa_mesto);
        }
        if(result[0].op !== null) {
            document.getElementById("op").setAttribute("value", result[0].op);
        }
        if(result[0].op_platnost_do !== null) {
             document.getElementById("op_platnost_do").setAttribute("value", result[0].op_platnost_do);
        } else {
            document.getElementById("op_platnost_do").setAttribute("value", "2100-01-01");
        }
        if(result[0].kontaktni_osoba_jmeno !== null) {
            document.getElementById("kontaktni_osoba_jmeno").setAttribute("value", result[0].kontaktni_osoba_jmeno);
        }
        if(result[0].kontaktni_osoba_prijmeni !== null) {
            document.getElementById("kontaktni_osoba_prijmeni").setAttribute("value", result[0].kontaktni_osoba_prijmeni);
        }
        if(result[0].kontaktni_osoba_cislo !== null) {
            document.getElementById("kontaktni_osoba_cislo").setAttribute("value", result[0].kontaktni_osoba_cislo);
        }
        if(id !== null) {
            document.getElementById("obyvatel_id_submit").setAttribute("value", id);
        }
        $scope.openModal2();
    };

    $scope.deleteData = function(id){
        if(confirm("Are you sure you want to remove it?"))
        {
            $http({
                method:"POST",
                url:"insert.php",
                data:{'id':id, 'action':'Delete'}
            }).success(function(data){
                $scope.success = true;
                $scope.error = false;
                $scope.successMessage = data.message;
                $scope.fetchData();
            });
        }
    };

});