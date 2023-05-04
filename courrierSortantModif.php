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
                    <label for="contenu">Contenu du courrier sortant</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" class="form-control"required name="dateEnvoi" id="dateEnvoi" value="<?php echo getinfo(2, null); ?>">
                    <label for="dateEnvoi">Date d'expedition du courrier sortant:</label>
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
                <div class="list-group mx-0 w-auto"><h4>Envoi du courrier:</h4>
                    <label class="list-group-item d-flex gap-2">
                        <input class="form-check-input flex-shrink-0" type="radio" name="envoi" id="envoi1" value="mail" <?php echo getinfo(4, 'mail'); ?>>
                        <span>
                            Mail
                        </span>
                    </label>
                    <label class="list-group-item d-flex gap-2">
                        <input class="form-check-input flex-shrink-0" type="radio" name="envoi" id="envoi2" value="postal" <?php echo getinfo(4, 'postal'); ?>>
                        <span>
                            Postal
                        </span>
                    </label>
                    <label class="list-group-item d-flex gap-2">
                        <input class="form-check-input flex-shrink-0" type="radio" name="envoi" id="envoi3" value="remiseEnMainPropre" <?php echo getinfo(4, 'remiseEnMainPropre'); ?>>
                        <span>
                            Remise en main propre
                         </span>
                    </label>
                </div>
                <label for="destinataire"><h4>Destinataire:</h4></label>
                <select name="destinataire" id="destinataire" class="form-select">
                    <?php selectDestinataire(); ?>
                </select>
                <div class="form-floating mb-3" id="nvDestinataire1">
                </div>
                <div class="form-floating mb-3" id="nvDestinataire2">
                </div>
                <label for="expediteur"><h4>Expediteur:</h4></label>
                <select name="expediteur" id="expediteur" class="form-select">
                    <?php selectExpediteur(); ?>
                </select>
                <div class="form-floating mb-3" id="nvExpediteur1">
                </div>
                <div class="form-floating mb-3" id="nvExpediteur2">
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
function selectExpediteur()
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

        if(selectExp(1)==$value){
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

    if(document.getElementById("destinataire").value == "autre"){
        creationElem();
    }
    if(document.getElementById("expediteur").value == "autre"){
        creationElem2();
    }
    document.getElementById("expediteur").addEventListener("change", creationElem2);
    function creationElem2(){
        if(document.getElementById("expediteur").value == "autre"){
            var btd = document.createElement("input");
            var bte = document.createElement("input");
            var label1 = document.createElement("label");
            var label2 = document.createElement("label");
            label2.innerText = "entrez le prenom de l'expediteur";
            label2.htmlFor = "input2";
            label2.id = "label2";
            label1.innerText = "entrez le nom de l'expediteur";
            label1.htmlFor = "input1";
            label1.id = "label1";
            btd.id = "input1";
            btd.className = "form-control";
            btd.name = "input1";
            btd.placeholder = "entrer un expediteur ici";
            bte.className = "form-control";
            bte.id = "input2";
            bte.name = "input2";
            btd.value = "<?php selectExp(2); ?>";
            bte.value = "<?php selectExp(3); ?>";
            bte.placeholder = "entrez le prenom de l'expediteur si lieu detre ( hors organisations)";
            document.getElementById("nvExpediteur1").appendChild(btd);
            document.getElementById("nvExpediteur2").appendChild(bte);
            document.getElementById("nvExpediteur1").appendChild(label1);
            document.getElementById("nvExpediteur2").appendChild(label2);
        }
        else
        {
            var elem2 = document.getElementById("input1");
            elem2.parentNode.removeChild(elem2);
            var elem3 = document.getElementById("input2");
            elem3.parentNode.removeChild(elem3);
            var elem4 = document.getElementById("label1");
            elem4.parentNode.removeChild(elem4);
            var elem5 = document.getElementById("label2");
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
$sqlCount2 = "SELECT COUNT(*) AS count FROM expediteur";
$stmtCount2 = $phpconnect->prepare($sqlCount2);
$stmtCount2->execute();
while($row3=$stmtCount2->fetch()){
    $resultatCount2 = $row3["count"] ;
    $resultatCount2+=1;
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
    if($_GET["idExp"] > 5) {
        if (isset($_POST['input1'])) {
            $stmt51 = $phpconnect->prepare("UPDATE expediteur SET nom = :nom, prenom = :prenom WHERE id = :idExpediteur");
            $stmt51->bindParam(':idExpediteur', $_GET["idExp"], PDO::PARAM_INT);
            $stmt51->bindParam(':nom', $_POST["input1"], PDO::PARAM_STR);
            if ($_POST["input2"] != "") {
                $stmt51->bindParam(':prenom', $_POST["input2"], PDO::PARAM_STR);
            } else {
                $stmt51->bindParam(':prenom', $null, PDO::PARAM_STR);
            }
            $stmt51->execute();
        }
    }
    else{
        if(isset($_POST["input1"])) {
            $stmt31 = $phpconnect->prepare("INSERT INTO expediteur (id, nom, prenom) VALUES (:idExpediteur, :nomExpediteur, :prenomExpediteur)");
            $stmt31->bindParam(':idExpediteur', $resultatCount2, PDO::PARAM_INT);
            $stmt31->bindParam(':nomExpediteur', $_POST["input1"], PDO::PARAM_STR);
            if ($_POST["input2"] != "") {
                $stmt31->bindParam(':prenomExpediteur', $_POST["input2"], PDO::PARAM_STR);
            } else {
                $stmt31->bindParam(':prenomExpediteur', $null, PDO::PARAM_STR);
            }
            $stmt31->execute();
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

    $sql2 = "SELECT id FROM expediteur WHERE nom = :nom";
    $stmtsql2=  $phpconnect->prepare($sql2);
    if($_POST["expediteur"] == "autre"){
        $stmtsql2->bindParam(':nom', $_POST["input1"], PDO::PARAM_STR);
    }
    else{
        $stmtsql2->bindParam(':nom', $_POST["expediteur"], PDO::PARAM_STR);
    }
    $stmtsql2->execute();
    while($rowsql2=$stmtsql2->fetch()){
        $resultat2 = $rowsql2["id"];
    }

    $stmt2 = $phpconnect->prepare("UPDATE sortant SET  id_expediteur = :IdExpediteur, id = :id, dateEnvoi = :DateEnvoi,contenu = :Contenu, provenance = :Provenance, id_Destinataire = :IdDestinataire, typeEnvoi = :typeEnvoi WHERE id = :id");
    $stmt2->bindParam(':id', $_GET["id"], PDO::PARAM_INT);
    $stmt2->bindParam(':typeEnvoi', $_POST["envoi"], PDO::PARAM_STR);
    $stmt2->bindParam(':DateEnvoi', $_POST["dateEnvoi"], PDO::PARAM_STR);
    $stmt2->bindParam(':Contenu', $_POST["contenu"], PDO::PARAM_STR);
    $stmt2->bindParam(':Provenance', $_POST["provenance"], PDO::PARAM_STR);
    if(isset($_POST["input"])){
        echo"yes";
        $stmt2->bindParam(':IdDestinataire', $resultat, PDO::PARAM_INT);
    }
    else {
        echo"no";
        $stmt2->bindParam(':IdDestinataire',$resultat, PDO::PARAM_INT);

    }
    if(isset($_POST["input1"])){
        echo"yes";
        $stmt2->bindParam(':IdExpediteur', $resultat2, PDO::PARAM_INT);
    }
    else {
        echo"no";
        $stmt2->bindParam(':IdExpediteur' ,$resultat2, PDO::PARAM_INT);

    }
    $stmt2->execute();

}

function getinfo($num, $type){
    $phpconnect = new PDO("mysql:dbname=gestioncourrier2;host=127.0.0.1", "root", "");


    $getinfo = $phpconnect->prepare("SELECT * FROM sortant WHERE id = :id");
    $getinfo->bindParam(':id', $_GET["id"], PDO::PARAM_INT);
    $getinfo->execute();
    $rowinfo = $getinfo->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rowinfo as $key => $row) {
        switch($num){
            case 1:
                echo  $row["contenu"];
                break;
            case 2:
                echo $row["dateEnvoi"];
                break;
            case 3:
                if($type == $row["provenance"]){
                    echo "checked";
                }
                break;
            case 4:
                if($type == $row["typeEnvoi"]){
                    echo "checked";
                }
                break;
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
function selectExp($param )
{
    $phpconnect = new PDO("mysql:dbname=gestioncourrier2;host=127.0.0.1", "root", "");
    $stmt4 = $phpconnect->prepare("SELECT * FROM expediteur WHERE id = :idExpediteur");
    $stmt4->bindParam(':idExpediteur', $_GET["idExp"], PDO::PARAM_INT);
    $stmt4->execute();
    $row4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);
    foreach ($row4 as $key => $row44){
        switch ($param){
            case 1:
                if ($_GET["idExp"] > 5){
                    return "autre";
                }
                else{
                    return $row44["nom"];
                }
                break;
            case 2:
                echo $row44["prenom"];
                break;
            case 3:
                if($_GET["idExp"] <= 5){
                    return $row44["nom"];
                }
                else{
                    echo $row44["nom"];
                }
                break;
        }
    }
}
?>