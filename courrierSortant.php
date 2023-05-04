<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<div class="container">
    <header class="d-flex justify-content-center py-3">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a href="accueilGestionCourrier.php" class="nav-link">accueil</a>
            </li>
            <li class="nav-item">
                <a href="courrierEntrant.php" class="nav-link">Courrier entrant</a>
            </li>
            <li class="nav-item">
                <a href="courrierSortant.php " class="nav-link active" aria-current="page">Courrier sortant</a>
            </li>
        </ul>
    </header>
</div>

<div class="b-example-divider"></div>
<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 mb-3">Ajout de nouveaux courrier</h1>
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
            <form class="p-4 p-md-5 border rounded-3 bg-light" id="form1" name="form1" method="post">
                <div class="form-floating mb-3">
                    <textarea class="form-control" required name="contenu" id="contenu" placeholder="contenu"></textarea>
                    <label for="contenu">Contenu du courrier sortant</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" class="form-control"required name="dateEnvoi" id="dateEnvoi">
                    <label for="dateEnvoi">Date d'envoi du courrier sortant:</label>
                </div>
                <div class="list-group mx-0 w-auto"><h4>Provenance du courrier:</h4>
                    <label class="list-group-item d-flex gap-2">
                        <input class="form-check-input flex-shrink-0" type="radio" name="provenance" id="provenance1" value="mail" checked="">
                        <span>
                            Mail
                        </span>
                    </label>
                    <label class="list-group-item d-flex gap-2">
                        <input class="form-check-input flex-shrink-0" type="radio" name="provenance" id="provenance2" value="postal">
                        <span>
                            Postal
                        </span>
                    </label>
                    <label class="list-group-item d-flex gap-2">
                        <input class="form-check-input flex-shrink-0" type="radio" name="provenance" id="provenance3" value="depotEnMairie">
                        <span>
                            Depot en mairie
                         </span>
                    </label>
                    <label class="list-group-item d-flex gap-2">
                        <input class="form-check-input flex-shrink-0" type="radio" name="provenance" id="provenance4" value="remiseEnMainPropre">
                        <span>
                            Remise en main propre
                         </span>
                    </label>
                </div>
                <h4>Destinataire: </h4>
                <div class="form-floating mb-3">
                    <select name="destinataire" id="destinataire" class="form-select">
                        <?php selectDestinataire(); ?>
                    </select>
                </div>
                <div class="form-floating mb-3" id="nvDestinataire1">
                </div>
                <div class="form-floating mb-3" id="nvDestinataire2">
                </div>
                <h4>Expediteur:</h4>
                <div class="form-floating mb-3">
                    <select name="expediteur" id="expediteur" class="form-select">
                        <?php selectExpediteur(); ?>
                    </select>
                </div>
                <div class="form-floating mb-3" id="nvExpediteur1">
                </div>
                <div class="form-floating mb-3" id="nvExpediteur2">
                </div>
                <h4>Type d'envoi:</h4>
                <div class="list-group mx-0 w-auto">
                    <select  name="typeEnvoi" id="typeEnvoi" class="form-select">
                        <option class="dropdown-item rounded-2"id="1" value="mail">mail</option>
                        <option class="dropdown-item rounded-2" id="2" value="postal">postal</option>
                        <option class="dropdown-item rounded-2" id="3" value="remiseEnMainPropre">remise en main propre</option>
                    </select>
                </div>
                <div class="form-floating mb-3" id="nvCloture1">
                </div>
                <div class="form-floating mb-3" id="nvCloture2">
                </div>
                <div class="d-flex gap-5 justify-content-center">

                </div>

                </div>
                <div class="form-floating mb-3" id="nvDestinataire1">

                </div>
                <div class="form-floating mb-3" id="nvDestinataire2">
                </div>
                <button class="w-100 btn btn-lg btn-primary" value="ok" type="submit" name="ok" id="ok">Ok</button>
            </form>
        </div>
    </div>
</div>
<?php

function selectExpediteur()
{
    if(!isset($_POST["expediteur"])){
        $_POST["expediteur"] = "urbanisme";
    }
    $value = "urbanisme";
    for ($i=1; $i<7; $i++){
        if($_POST["expediteur"] == $value){
            $selected =" selected";
        }
        else{
            $selected="";
        }
        switch ($i){
            case 1:
                $value = "urbanisme";
                break;
            case 2:
                $value = "dynamisation";
                break;
            case 3:
                $value = "etatCivilComptabilite";
                $value2 = "état civil comptabilité";
                break;
            case 4:
                $value = "maire";
                break;
            case 5:
                $value = "adjoint";
                break;
            case 6:
                $value = "autre";
                break;
            default:
                $value = "erreur";
                break;
        }
        if ($value != "etatCivilComptabilite" ){
            echo '<option id=',$i, ' value =', $value,  $selected,'>', $value, '</option>';
        }
        else {
            echo '<option id=',$i, ' value =', $value, '>', $value2, '</option>';
        }
    }
}
function selectDestinataire()
{
    if(!isset($_POST["destinataire"])){
        $_POST["destinataire"] = "urbanisme";
    }
    $value = "urbanisme";
    for ($i=1; $i<7; $i++){
        if($_POST["destinataire"] == $value){
            $selected =" selected";
        }
        else{
            $selected="";
        }
        switch ($i){
            case 1:
                $value = "urbanisme";
                break;
            case 2:
                $value = "dynamisation";
                break;
            case 3:
                $value = "etatCivilComptabilite";
                $value2 = "état civil comptabilité";
                break;
            case 4:
                $value = "maire";
                break;
            case 5:
                $value = "adjoint";
                break;
            case 6:
                $value = "autre";
                break;
            default:
                $value = "erreur";
                break;
        }
        if ($value != "etatCivilComptabilite" ){
            echo '<option id=',$i, ' value =', $value,  $selected,'>', $value, '</option>';
        }
        else {
            echo '<option id=',$i, ' value =', $value, '>', $value2, '</option>';
        }
    }
}
?>
<script>
    document.getElementById("destinataire").addEventListener("change", creationElem2);
    function creationElem2(){
        if(document.getElementById("destinataire").value == "autre"){
            var btd = document.createElement("input");
            var bte = document.createElement("input");
            var label8 = document.createElement("label");
            var label7 = document.createElement("label");
            label7.innerText = "entrez le prenom du destinataire";
            label7.htmlFor = "prenomDestinataire";
            label7.id = "label7";
            label8.innerText = "entrez le nom du destinataire";
            label8.htmlFor = "nomDestinataire";
            label8.id = "label8";
            btd.id = "nomDestinataire";
            btd.className = "form-control";
            btd.name = "nomDestinataire";
            btd.placeholder = "entrer un destinataire ici";
            bte.className = "form-control";
            bte.id = "prenomDestinataire";
            bte.name = "prenomDestinataire";
            bte.placeholder = "entrez le prenom du destinataire si lieu detre ( hors organisations)";
            document.getElementById("nvDestinataire1").appendChild(btd);
            document.getElementById("nvDestinataire2").appendChild(bte);
            document.getElementById("nvDestinataire1").appendChild(label8);
            document.getElementById("nvDestinataire2").appendChild(label7);
        }
        else
        {
            var elem = document.getElementById("nomDestinataire");
            elem.parentNode.removeChild(elem);
            var elem6 = document.getElementById("prenomDestinataire");
            elem6.parentNode.removeChild(elem6);
            var elem7 = document.getElementById("label8")
            elem7.parentNode.removeChild(elem7)
            var elem8 = document.getElementById("label7")
            elem8.parentNode.removeChild(elem8)
        }
    }
    document.getElementById("expediteur").addEventListener("change", creationElem);
    function creationElem(){
        if(document.getElementById("expediteur").value == "autre"){
            var btn = document.createElement("input");
            var btz = document.createElement("input");
            var label3 = document.createElement("label");
            var label4 = document.createElement("label");
            label4.innerText = "entrez le prenom de l'expediteur";
            label4.htmlFor = "input4";
            label4.id = "label4";
            label3.innerText = "entrez le nom de  l'expediteur";
            label3.htmlFor = "input";
            label3.id = "label3";
            btn.id = "input";
            btn.className = "form-control";
            btn.name = "input";
            btn.placeholder = "entrer un expediteur ici";
            btz.className = "form-control";
            btz.id = "input4";
            btz.name = "input4";
            btz.placeholder = "entrez le prenom du expediteur si lieu detre ( hors organisations)";
            document.getElementById("nvExpediteur1").appendChild(btn);
            document.getElementById("nvExpediteur2").appendChild(btz);
            document.getElementById("nvExpediteur1").appendChild(label3);
            document.getElementById("nvExpediteur2").appendChild(label4);
        }
        else
        {
            var elem = document.getElementById("input");
            elem.parentNode.removeChild(elem);
            var elem10 = document.getElementById("input4");
            elem10.parentNode.removeChild(elem10);
            var elem11 = document.getElementById("label3")
            elem11.parentNode.removeChild(elem11)
            var elem12 = document.getElementById("label4")
            elem12.parentNode.removeChild(elem12)
        }
    }

    //document.getElementById(provenance1);
    //function go() {
    //  var userOption = document.getElementById('expediteur').value;
    //document.write(userOption);
    //}
    document.onkeydown=function(evt){
        var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
        if(keyCode == 13){
            document.form1.submit();
        }
    }
    function submit(){
        let form1 = document.getElementById("form1");
        form1.submit();

    }
</script>
<?php
$phpconnect = new PDO("mysql:dbname=gestioncourrier2;host=127.0.0.1", "adminMairie", "MairieLongeville55*");
$sql = "SELECT id FROM expediteur WHERE nom = :nom";
$stmt = $phpconnect->prepare($sql);
$stmt->bindParam(':nom', $_POST["expediteur"], PDO::PARAM_STR);
$stmt->execute();
while($row=$stmt->fetch()){
    $resultat = $row["id"];
}
$sql7 = "SELECT id FROM destinataire WHERE nom = :nom";
$stmt7 = $phpconnect->prepare($sql7);
$stmt7->bindParam(':nom', $_POST["destinataire"], PDO::PARAM_STR);
$stmt7->execute();
while($row7=$stmt7->fetch()){
    $resultat7 = $row7["id"];
}
$sqlCount = "SELECT COUNT(*) AS count FROM courrier";
$stmtCount = $phpconnect->prepare($sqlCount);
$stmtCount->execute();
while($row2=$stmtCount->fetch()){
    $resultatCount = $row2["count"];
}
$sqlCount3 = "SELECT COUNT(*) AS count FROM expediteur";
$stmtCount3 = $phpconnect->prepare($sqlCount3);
$stmtCount3->execute();
while($row4=$stmtCount3->fetch()){
$resultatCount3 = $row4["count"];
$resultatCount3+=1;
}

$sqlCount4 = "SELECT COUNT(*) AS count FROM destinataire";
$stmtCount4 = $phpconnect->prepare($sqlCount4);
$stmtCount4->execute();
while($row5=$stmtCount4->fetch()){
    $resultatCount4 = $row5["count"];
    $resultatCount4+=1;
}
function maxid($table){
    $phpconnect = new PDO("mysql:dbname=gestioncourrier2;host=127.0.0.1", "adminMairie", "MairieLongeville55*");
    $sqlMax = "SELECT MAX(id) FROM " . $table;
    $stmtMax = $phpconnect->prepare($sqlMax);
    $stmtMax->execute();
    return $stmtMax->fetch();
}
function champExiste($table, $id ){
    $phpconnect = new PDO("mysql:dbname=gestioncourrier2;host=127.0.0.1", "adminMairie", "MairieLongeville55*");
    $sqlExiste = "SELECT COUNT(*) AS count FROM" . $table . "WHERE id =" . $id;
    $stmtExiste = $phpconnect->prepare($sqlExiste);
    $stmtExiste->execute();
    return $stmtExiste->fetch();
}
if (isset($_POST['ok'])){
    if(isset($_POST['input'])){
        $stmt4 = $phpconnect->prepare("INSERT INTO expediteur (id, nom ,prenom) VALUES (:id_expediteur, :nomExpediteur, :prenomExpediteur)");
        $stmt4->bindParam(':id_expediteur', $resultatCount3, PDO::PARAM_INT);
        $stmt4->bindParam(':nomExpediteur', $_POST["input"], PDO::PARAM_STR);
        if($_POST["input4"] != ""){
            $stmt4->bindParam(':prenomExpediteur', $_POST["input4"], PDO::PARAM_STR);
        }
        else{
            $stmt4->bindParam(':prenomExpediteur', $null, PDO::PARAM_STR);
        }
        $stmt4->execute();

    }
    if(isset($_POST["nomDestinataire"])){
        $stmt3 = $phpconnect->prepare("INSERT INTO destinataire (id, nom, prenom) VALUES ($resultatCount4,:nomDestinataire, :prenomDestinataire)");
        $stmt3->bindParam(':nomDestinataire', $_POST["nomDestinataire"], PDO::PARAM_STR);
        if($_POST["prenomDestinataire"] != ""){
            $stmt3->bindParam(':prenomDestinataire', $_POST["prenomDestinataire"], PDO::PARAM_STR);
        }
        else{
            $stmt3->bindParam(':prenomDestinataire', $null, PDO::PARAM_STR);
        }
        $stmt3->execute();
    }


    $stmt2 = $phpconnect->prepare("INSERT INTO sortant (id, typeEnvoi, dateEnvoi, contenu,  provenance, id_Destinataire, id_expediteur)VALUES ($resultatCount + 1 , :typeEnvoi, :dateEnvoi, :contenu, :provenance,:IdDestinataire, :Id_expediteur)");
    $stmt2->bindParam(':typeEnvoi', $_POST["typeEnvoi"], PDO::PARAM_STR);
    $stmt2->bindParam(':dateEnvoi', $_POST["dateEnvoi"], PDO::PARAM_STR);
    $stmt2->bindParam(':contenu', $_POST["contenu"], PDO::PARAM_STR);
    $stmt2->bindParam(':provenance', $_POST["provenance"], PDO::PARAM_STR);
    if(!isset($resultat7)){

        $stmt2->bindParam(':IdDestinataire',$resultatCount4, PDO::PARAM_INT);
    }
    else {

        $stmt2->bindParam(':IdDestinataire',$resultat7, PDO::PARAM_INT);

    }
    if(!isset($resultat)){
        $stmt2->bindParam(':Id_expediteur',$resultatCount3, PDO::PARAM_INT);
    }
    else {
        $stmt2->bindParam(':Id_expediteur',$resultat, PDO::PARAM_INT);

    }
        $stmt2->execute();
}
?>