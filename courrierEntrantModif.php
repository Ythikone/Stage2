<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<div class="container">
    <header class="d-flex justify-content-center py-3">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a href="accueilGestionCourrier.php" class="nav-link active" aria-current="page">accueil</a>
            </li>
            <li class="nav-item">
                <a href="courrierEntrant.php" class="nav-link">Courrier entrant</a>
            </li>
            <li class="nav-item">
                <a href="courrierSortant.php" class="nav-link">Courrier sortant</a>
            </li>
        </ul>
    </header>
</div>
<div class="b-example-divider"></div>
<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 mb-3">Modification du courrier <?php //echo $_GET["id"]; ?></h1>
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
            <form  class="p-4 p-md-5 border rounded-3 bg-light" id="form1" name="form1" method="post">
                <div class="form-floating mb-3">
                    <textarea class="form-control" required name="contenu" id="contenu" placeholder="contenu"> <?php echo getinfo(1, null); ?> </textarea>
                    <label for="contenu">Contenu du courrier entrant</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" class="form-control"required name="dateReception" id="dateReception" value="<?php echo getinfo(2, null); ?>">
                    <label for="dateReception">Date de réception du courrier entrant:</label>
                </div>
                <div class="list-group mx-0 w-auto"><h4>Provenance du courrier:</h4>
                    <label class="list-group-item d-flex gap-2">
                        <input class="form-check-input flex-shrink-0" type="radio" name="provenance" id="provenance1" value="mail" <?php echo getinfo(3, 'mail'); ?>>
                        <span>
                            Mail
                        </span>
                    </label>
                    <label class="list-group-item d-flex gap-2">
                        <input class="form-check-input flex-shrink-0" type="radio" name="provenance" id="provenance2" value="postal" <?php echo getinfo(3, 'postal'); ?>>
                        <span>
                            Postal
                        </span>
                    </label>
                    <label class="list-group-item d-flex gap-2">
                        <input class="form-check-input flex-shrink-0" type="radio" name="provenance" id="provenance3" value="depotEnMairie" <?php echo getinfo(3, 'depotEnMairie'); ?>>
                        <span>
                            Depot en mairie
                         </span>
                    </label>
                    <label class="list-group-item d-flex gap-2">
                        <input class="form-check-input flex-shrink-0" type="radio" name="provenance" id="provenance4" value="remiseEnMainPropre" <?php echo getinfo(3, 'remiseEnMainPropre'); ?>>
                        <span>
                            Remise en main propre
                         </span>
                    </label>
                </div>
                <div class="list-group mx-0 w-auto">
                    <label for="suivi"><h4>Etat du courrier:</h4></label>
                    <select  name="suivi" id="suivi" class="form-select">
                        <option class="dropdown-item rounded-2" id="1" value="nouveau" <?php echo getinfo(4, "nouveau");?>>nouveau</option>
                        <option class="dropdown-item rounded-2" id="2" value="ouvert" <?php echo getinfo(4, "ouvert");?>>ouvert</option>
                        <option class="dropdown-item rounded-2" id="3" value="cloture" <?php echo getinfo(4, "cloture");?>>cloture</option>
                    </select>

                    <div class="form-floating mb-3" id="nvCloture1">
                    </div>
                    <div class="form-floating mb-3" id="nvCloture2">
                    </div>
                    <label for="destinataire"><h4>Destinataire:</h4></label>
                    <select name="destinataire" id="destinataire" class="form-select">
                        <?php selectDestinataire(); ?>
                    </select>
                </div>
                <div class="form-floating mb-3" id="nvDestinataire1">
                </div>
                <div class="form-floating mb-3" id="nvDestinataire2">
                </div>
                <div class="list-group mx-0 w-auto">
                    <label for="urgence"><h4>Urgence du traitement:</h4></label>
                    <select name="urgence" id="urgence" class="form-select">
                        <option class="dropdown-item rounded-2" id="1" value="normal" <?php echo getinfo(6, "normal");?>>normal</option>
                        <option class="dropdown-item rounded-2" id="2" value="urgent" <?php echo getinfo(6, "urgent");?>>urgent</option>
                    </select>
                </div>
                <div hidden="hidden" id="secret"> <?php getinfo(7,null);?></div>
                    <button class="w-100 btn btn-lg btn-primary" value="ok" type="submit" name="ok" id="ok">Ok</button>
            </form>
        </div>
    </div>
</div>
<?php
function selectDestinataire()
{
    for ($i=1; $i<7; $i++){
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

        if(selectDest(1)==$value){
              $selected = "selected";
        }
//        elseif (selectDest(1)!=$value){
//            $selected = "selected";
//        }
        else{
            $selected = "";
        }
        if ($value != "etatCivilComptabilite" ){

            echo '<option id='.$i. ' value ='. $value. " ".$selected.'>'. $value .'</option>';
        }
        else {
            echo '<option id='.$i. ' value ='. $value. " ".$selected.'>'. $value2. '</option>';
        }
    }
}
?>
<script>
    document.getElementById("destinataire").addEventListener("change", creationElem);
    function creationElem(){
        if(document.getElementById("destinataire").value == "autre"){
            var btn = document.createElement("input");
            var btz = document.createElement("input");
            var label3 = document.createElement("label");
            var label4 = document.createElement("label");
            label4.innerText = "entrez le prenom du destinataire";
            label4.htmlFor = "input4";
            label4.id = "label4";
            label3.innerText = "entrez le nom du destinataire";
            label3.htmlFor = "input";
            label3.id = "label3";
            btn.id = "input";
            btn.className = "form-control";
            btn.name = "input";
            btn.placeholder = "entrer un destinataire ici";
            btz.className = "form-control";
            btz.id = "input4";
            btz.name = "input4";
            btz.value = "<?php selectDest(2); ?>";
            btn.value = "<?php selectDest(3); ?>";
            btz.placeholder = "entrez le prenom du destinataire si lieu detre ( hors organisations)";
            document.getElementById("nvDestinataire1").appendChild(btn);
            document.getElementById("nvDestinataire2").appendChild(btz);
            document.getElementById("nvDestinataire1").appendChild(label3);
            document.getElementById("nvDestinataire2").appendChild(label4);
        }
        else
        {
            var elem = document.getElementById("input");
            elem.parentNode.removeChild(elem);
            var elem6 = document.getElementById("input4");
            elem6.parentNode.removeChild(elem6);
            var elem7 = document.getElementById("label3");
            elem7.parentNode.removeChild(elem7);
            var elem8 = document.getElementById("label4");
            elem8.parentNode.removeChild(elem8);
        }
    }
    if(document.getElementById("suivi").value == "cloture"){
        creationElem2();
    }
    if(document.getElementById("destinataire").value == "autre"){
        creationElem();
    }
    document.getElementById("suivi").addEventListener("change", creationElem2);
    function creationElem2(){
        if(document.getElementById("suivi").value == "cloture"){
            var btp = document.createElement("textarea");
            var btd = document.createElement("input");
            var label = document.createElement("label");
            var label2 = document.createElement("label");
            label2.innerText = "entrez une date de cloturation";
            label2.htmlFor = "input3";
            label2.id = "label2";
            label.innerText = "entrez une raison de la cloture ici";
            label.htmlFor = "input2";
            label.id = "label1";
            btp.id = "input2";
            btp.className = "form-control";
            btp.name = "input2";
            btp.placeholder = "entrer une raison de la cloture ici";
            btp.required = true;
            btd.required = true;
            btd.id = "input3";
            btd.name = "input3";
            btd.type = "date";
            btd.className = "form-control";
            btd.placeholder = "entrez une date de cloturation ici";
            btp.innerText = "<?php selectCloture(1); ?>";
            btd.value = "<?php selectCloture(2); ?>";
            document.getElementById("nvCloture1").appendChild(btp);
            document.getElementById("nvCloture1").appendChild(label);
            document.getElementById("nvCloture2").appendChild(btd);
            document.getElementById("nvCloture2").appendChild(label2);
        }
        else{
            var elem2 = document.getElementById("input2");
            var elem3 = document.getElementById("input3");
            var elem4 = document.getElementById("label1");
            var elem5 = document.getElementById("label2");
            elem2.parentNode.removeChild(elem2);
            elem3.parentNode.removeChild(elem3);
            elem4.parentNode.removeChild(elem4);
            elem5.parentNode.removeChild(elem5);
        }
    }
    //document.getElementById(provenance1);
    //function go() {
      //  var userOption = document.getElementById('destinataire').value;
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

$phpconnect = new PDO("mysql:dbname=gestioncourrier2;host=127.0.0.1", "root", "");


$sqlCount = "SELECT COUNT(*) AS count FROM courrier";
$stmtCount = $phpconnect->prepare($sqlCount);
$stmtCount->execute();
while($row2=$stmtCount->fetch()){
    $resultatCount = $row2["count"];
}
$sqlCount2 = "SELECT COUNT(*) AS count FROM raisoncloture";
$stmtCount2 = $phpconnect->prepare($sqlCount2);
$stmtCount2->execute();
while($row3=$stmtCount2->fetch()){
    $resultatCount2 = $row3["count"] ;
}
$sqlCount3 = "SELECT COUNT(*) AS count FROM destinataire";
$stmtCount3 = $phpconnect->prepare($sqlCount3);
$stmtCount3->execute();
while($row4=$stmtCount3->fetch()){
    $resultatCount3 = $row4["count"];
    $resultatCount3+=1;
}
if (isset($_POST['ok'])){
    if($_GET["idDest"] > 5) {
        if (isset($_POST['input'])) {
            $stmt5 = $phpconnect->prepare("UPDATE destinataire SET nom = :nom, prenom = :prenom WHERE id = :idDestinataire");
            $stmt5->bindParam(':idDestinataire', $_GET["idDest"], PDO::PARAM_INT);
            $stmt5->bindParam(':nom', $_POST["input"], PDO::PARAM_STR);
            if ($_POST["input4"] != "") {
                $stmt5->bindParam(':prenom', $_POST["input4"], PDO::PARAM_STR);
            } else {
                $stmt5->bindParam(':prenom', $null, PDO::PARAM_STR);
            }
            $stmt5->execute();
        }
    }
    else{
        if(isset($_POST["input"])) {
            $stmt3 = $phpconnect->prepare("INSERT INTO destinataire (id, nom, prenom) VALUES (:idDestinataire, :nomDestinataire, :prenomDestinataire)");
            $stmt3->bindParam(':idDestinataire', $resultatCount3, PDO::PARAM_INT);
            $stmt3->bindParam(':nomDestinataire', $_POST["input"], PDO::PARAM_STR);
            if ($_POST["input4"] != "") {
                $stmt3->bindParam(':prenomDestinataire', $_POST["input4"], PDO::PARAM_STR);
            } else {
                $stmt3->bindParam(':prenomDestinataire', $null, PDO::PARAM_STR);
            }
            $stmt3->execute();
        }
    }
//    if(isset($_POST["input2"])){
//        $stmt = $phpconnect->prepare("INSERT INTO  raisoncloture (id, libelle, cloturerLe) VALUES (:IdRaisonCloture, :Libelle, :ClotureLe)");
//        $resultatCount2 +=1;
//        $stmt->bindParam(':IdRaisonCloture', $resultat2, PDO::PARAM_INT);
//        $stmt->bindParam(':Libelle', $_POST["input2"], PDO::PARAM_STR);
//        $stmt->bindParam(':ClotureLe', $_POST["input3"], PDO::PARAM_STR);
//        $stmt->execute();
//    }
    //si $get de idclot etc.. existe alors update sinon insert ( existe pas car pas d'id de clot donc on doit insert
    if ($_GET["idClot"]!=null) {
        echo "aa";
        if ($_POST["suivi"] == "cloture") {
            $stmt = $phpconnect->prepare("UPDATE raisoncloture  SET libelle = :Libelle, cloturerLe = :ClotureLe WHERE id = :IdRaisonCloture");
            $stmt->bindParam(':IdRaisonCloture', $_GET["idClot"], PDO::PARAM_INT);
            $stmt->bindParam(':Libelle', $_POST["input2"], PDO::PARAM_STR);
            $stmt->bindParam(':ClotureLe', $_POST["input3"], PDO::PARAM_STR);
            $stmt->execute();
        }
    }
    else{

        if($_POST["suivi"] == "cloture"){
            $stmt = $phpconnect->prepare("INSERT INTO  raisoncloture (id, libelle, cloturerLe) VALUES (:IdRaisonCloture, :Libelle, :ClotureLe)");
            $resultatCount2 +=1;
            $stmt->bindParam(':IdRaisonCloture', $resultatCount2, PDO::PARAM_INT);
            $stmt->bindParam(':Libelle', $_POST["input2"], PDO::PARAM_STR);
            $stmt->bindParam(':ClotureLe', $_POST["input3"], PDO::PARAM_STR);
            $stmt->execute();
        }
        else {
            echo "l";
        }

    }

    $sql = "SELECT id FROM destinataire WHERE nom = :nom";
    $stmt6 = $phpconnect->prepare($sql);
    if ($_POST["destinataire"] == "autre"){
        $stmt6->bindParam(':nom', $_POST["input"], PDO::PARAM_STR);
    }
    else {
        $stmt6->bindParam(':nom', $_POST["destinataire"], PDO::PARAM_STR);
    }
    $stmt6->execute();
    while($row6=$stmt6->fetch()){
        $resultat = $row6["id"];
    }

    $sql2 = "SELECT id FROM raisoncloture WHERE libelle = :libelle";
    $stmtsql2=  $phpconnect->prepare($sql2);
    if($_POST["suivi"] == "cloture"){
        $stmtsql2->bindParam(':libelle', $_POST["input2"], PDO::PARAM_STR);
    }
    else{
        $stmtsql2->bindParam(':libelle', $null, PDO::PARAM_STR);
    }
    $stmtsql2->execute();
    while($rowsql2=$stmtsql2->fetch()){
        $resultat2 = $rowsql2["id"];
    }

    $stmt2 = $phpconnect->prepare("UPDATE entrant SET  id_raisonCloture = :IdRaisonCloture , id = :id, dateReception = :DateReception, urgenceTraitement = :UrgenceTraitement,contenu = :Contenu, provenance = :Provenance, id_Destinataire = :IdDestinataire, etat = :Etat WHERE id = :id");
    $stmt2->bindParam(':id', $_GET["id"], PDO::PARAM_INT);
    $stmt2->bindParam(':DateReception', $_POST["dateReception"], PDO::PARAM_STR);
    $stmt2->bindParam(':UrgenceTraitement', $_POST["urgence"], PDO::PARAM_STR);
    $stmt2->bindParam(':Etat', $_POST["suivi"], PDO::PARAM_STR);
    $stmt2->bindParam(':Contenu', $_POST["contenu"], PDO::PARAM_STR);
    $stmt2->bindParam(':Provenance', $_POST["provenance"], PDO::PARAM_STR);
    if(isset($_POST["input"])){
        $stmt2->bindParam(':IdDestinataire', $resultat, PDO::PARAM_INT);
    }
    else {
        $stmt2->bindParam(':IdDestinataire',$resultat, PDO::PARAM_INT);

    }
    if($_POST["suivi"] == "cloture"){
        $resultatCount2;
        $stmt2->bindParam(':IdRaisonCloture', $resultat2, PDO::PARAM_INT);
    }
    else{
            $stmt2->bindParam(':IdRaisonCloture', $null, PDO::PARAM_INT);
    }
    $stmt2->execute();

}

function getinfo($num, $type){
    $phpconnect = new PDO("mysql:dbname=gestioncourrier2;host=127.0.0.1", "root", "");


    $getinfo = $phpconnect->prepare("SELECT * FROM entrant WHERE id = :id");
    $getinfo->bindParam(':id', $_GET["id"], PDO::PARAM_INT);
    $getinfo->execute();
    $rowinfo = $getinfo->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rowinfo as $key => $row) {
            switch($num){
                case 1:
                    echo  $row["contenu"];
                    break;
                case 2:
                    echo $row["dateReception"];
                    break;
                case 3:
                     if($type == $row["provenance"]){
                        echo "checked";
                     }
                    break;
                case 4:
                    if($type == $row["etat"]){
                       echo "selected";
                    }
                    break;

                case 6:
                    if($type == $row["urgenceTraitement"]){
                        echo "selected";
                        break;
                    }
                case 7:
                    echo $row["id_Destinataire"];
            }
        }
}
function selectDest($param )
{
    $phpconnect = new PDO("mysql:dbname=gestioncourrier2;host=127.0.0.1", "root", "");
    $stmt3 = $phpconnect->prepare("SELECT * FROM destinataire WHERE id = :idDestinataire");
    $stmt3->bindParam(':idDestinataire', $_GET["idDest"], PDO::PARAM_INT);
    $stmt3->execute();
    $row3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
    foreach ($row3 as $key => $row33){
        switch ($param){
            case 1:
                if ($_GET["idDest"] > 5){
                    return "autre";
                }
                else{
                    return $row33["nom"];
                }
                break;
            case 2:
                echo $row33["prenom"];
                break;
            case 3:
                if($_GET["idDest"] <= 5){
                    return $row33["nom"];
                }
                else{
                    echo $row33["nom"];
                }
                break;
        }
    }
}
function selectCloture($param) {
    $phpconnect = new PDO("mysql:dbname=gestioncourrier2;host=127.0.0.1", "root", "");
    $stmt4 = $phpconnect->prepare("SELECT * FROM raisoncloture WHERE id = :idCloture");
    $stmt4->bindParam(':idCloture', $_GET["idClot"], PDO::PARAM_INT);
    $stmt4->execute();
    $rowcloture = $stmt4->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rowcloture as $key =>$rowclotures){
        switch($param){
            case 1:
                echo $rowclotures["libelle"];
                break;
            case 2:
                echo $rowclotures["cloturerLe"];
                break;
        }
    }
}
?>