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

<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 mb-3">Affichage des courriers </h1>
        </div>
        <form action="accueilGestionCourrier.php?" class="p-4 p-md-5 border rounded-3 bg-light" id="form1" name="form1" method="post" >
            <div class="form-floating mb-3">
                <input value="<?php if(isset($_GET['contenu'])){echo $_GET['contenu'];}?>" class="form-control" type="text" name="contenu" id="contenu" placeholder="contenu">
                <label for="contenu">Mots clés à chercher</label>
            </div>
            <div class="form-floating mb-3">
                <input value ="<?php if(isset($_GET['date'])){echo $_GET['date'];}?>" type="text" class="form-control" name="date" id="date" placeholder="date">
                <label for="date">Date à rechercher</label>
                <button name="triDate" id="triDate" onclick="a();"  class="w-100 btn btn-lg btn-primary" >trier
            </div>
            <div id = "result" class="form-floating mb-3">
                <?php  if(!isset($_POST["triDate"])){affichage();}?>
            </div>

<script>
    document.getElementById("contenu").focus();
    function a(){
        document.getElementById("form1").action += "contenu=";
        document.getElementById("form1").action += document.getElementById("contenu").value;
        document.getElementById("form1").action += "&date=";
        document.getElementById("form1").action += document.getElementById("date").value;
    }


</script>
<?php



function affichage()
{
//    voir si possible d'utiliser PDO a la place de mysqli et du coup changer la façon d'afficher les résultats en
//      pdo au lieu de mysqli
//    plus qu'a mettre a jour a chaque fois que l'on tape/cherche qq chose et en appuyant sur un bouton pour lancer la recherche triée
    $phpconnect = mysqli_connect("localhost", "root", "", "gestioncourrier2");
//     if (isset($_POST["test"])) {
//         if (isset($_POST["date"]) || isset($_POST["contenu"])) {
//             if (isset($_POST["date"])) {
//                 $linfo = "date";
//
//             }
//             elseif (isset($_POST["contenu"])) {
//                 $linfo = "contenu";
//
//             }
//             else {
//                 $query = "SELECT * FROM entrant ORDER BY dateReception";
//                 $stmt = $phpconnect->prepare($query);
//
//             }
//             switch ($linfo) {
//                 case "date" :
//
//                     $query = "SELECT * FROM entrant WHERE dateReception LIKE :dateReception ORDER BY dateReception";
//                     $stmt = $phpconnect->prepare($query);
//                     $stmt->bind_param(':dateReception', $_POST["date"]);
//                     break;
//                 case "contenu" :
//
//                     $query = "SELECT * FROM entrant WHERE contenu LIKE %:contenu% ORDER BY dateReception";
//                     $stmt = $phpconnect->prepare($query);
//                     $stmt->bind_param(':contenu', $lecontenu);
//                     break;
//                 default:
//
//                     $query = "SELECT * FROM entrant ORDER BY dateReception";
//                     $stmt = $phpconnect->prepare($query);
//             }
//         }
//         else {
//             $query = "SELECT * FROM entrant ORDER BY dateReception";
//             $stmt = $phpconnect->prepare($query);
//         }
//     }
    $query = "SELECT * FROM entrant ORDER BY dateReception";
    $stmt = $phpconnect->prepare($query);
    $stmt->execute();
    $res = $stmt->get_result();
    echo "<table  class='table align-middle table-success table-bordered border-secondary'>";
    $i =0;
    while ($row = $res->fetch_assoc()) {
        $i +=1;
        echo "<tr><th>Courrier entrant n°", $i, ":</th></tr>", "<tr><th>Contenu: </th>", "<th>Date de réception: </th> ",  "<th>Etat: </th>", "<th>Provenance:  </th>", "<th>Urgence de traitement:  </th></tr><tr><td>", $row['contenu'], "</td><td>",   $row['dateReception'], "</td><td>", $row['etat'], "</td><td>",  $row['provenance'], "</td><td>",  $row['urgenceTraitement'], "</td>", "</tr>";
    }
    echo "</table>";

    $query2 = "SELECT * FROM sortant ORDER BY dateEnvoi";
    $stmt2 = $phpconnect->prepare($query2);
    $stmt2->execute();
    $res2 = $stmt2->get_result();
    echo "<table  class='table align-middle table-danger table-bordered border-secondary'>";
    $k =0;
    while ($row2 = $res2->fetch_assoc()) {
        $k +=1;
        echo "<tr><th>Courrier sortant n°", $k, ":</th></tr>", "<tr><th>Contenu: </th>", "<th>Date d'envoi: </th> ",  "<th>Type: </th>", "<th>Provenance:  </th>", "</tr><tr><td>", $row2['contenu'], "</td><td>",   $row2['dateEnvoi'], "</td><td>", $row2['typeEnvoi'], "</td><td>", $row2['provenance'], "</td>", "</tr>";
    }
    echo "</table>";
}

function search1(){
    $pdo = new PDO("mysql:dbname=gestioncourrier2;host=127.0.0.1", "root", "");
    if(isset($_GET["contenu"])){
        $search = '%'.$_GET["contenu"].'%';
    }
    else{
        $search ='%';
    }
    if(isset($_GET["date"])){
        $search2 = $_GET["date"].'%';
    }
    else{
        $search2 = '%';
    }
    $stmtt = $pdo->prepare("SELECT * FROM entrant WHERE contenu LIKE :contenu AND dateReception LIKE :date ORDER BY dateReception");
    $stmtt->bindParam(':contenu', $search, PDO::PARAM_STR);
    $stmtt->bindParam(':date', $search2, PDO::PARAM_STR);
    $stmtt->execute();
    $rows = $stmtt->fetchAll(PDO::FETCH_ASSOC);
    $i = 0;
    foreach ($rows as $key => $row) {
        $i += 1;

        echo "<tr><th>Courrier entrant n°" . $i . ":</th> <th> <a href='courrierEntrantModif.php?id=".$row["id"]."&idDest=".$row["id_Destinataire"]."&idClot=".$row["id_raisonCloture"]."'>modifier</a></th><th><a href='courrierEntrantSupp.php?id=".$row["id"]."' >supprimer</a></th></tr>" . "<tr><th>Contenu: </th>" . "<th>Date de réception: </th> " . "<th>Etat: </th>" . "<th>Provenance:  </th>" . "<th>Urgence de traitement:  </th></tr><tr><td>" . $row['contenu'] . "</td><td>" . $row['dateReception'] . "</td><td>" . $row['etat'] . "</td><td>" . $row['provenance'] . "</td><td>" . $row['urgenceTraitement'] . "</td>" . "</tr>";
    }



}
function search2(){
    $pdo = new PDO("mysql:dbname=gestioncourrier2;host=127.0.0.1", "root", "");
    if(isset($_GET["contenu"])){
            $search = '%'.$_GET["contenu"].'%';
        }
    else{
        $search ='%';
    }
    if(isset($_GET["date"])){
        $search2 = $_GET["date"].'%';
    }
    else{
        $search2 = '%';
    }
    $stmtt = $pdo->prepare("SELECT * FROM sortant WHERE contenu LIKE :contenu AND dateEnvoi LIKE :date ORDER BY dateEnvoi");
    $stmtt->bindParam(':contenu', $search, PDO::PARAM_STR);
        $stmtt->bindParam(':date', $search2, PDO::PARAM_STR);

    $stmtt->execute();
    $rows = $stmtt->fetchAll(PDO::FETCH_ASSOC);
    $i = 0;
    foreach ($rows as $key => $row) {
        $i += 1;
        echo "<tr><th>Courrier sortant n°". $i, ":</th> <th> <a href='courrierSortantModif.php?id=".$row["id"]."&idDest=".$row["id_Destinataire"]."&idExp=".$row["id_expediteur"]."'>modifier</a></th><th><a href='courrierSortantSupp.php?id=".$row["id"]."' >supprimer</a></th></tr>". "<tr><th>Contenu: </th>". "<th>Date d'envoi: </th> ".  "<th>Type: </th>". "<th>Provenance:  </th>". "</tr><tr><td>". $row['contenu']. "</td><td>".   $row['dateEnvoi']. "</td><td>". $row['typeEnvoi']. "</td><td>". $row['provenance']. "</td>". "</tr>";
    }


}

if (isset($_POST["triDate"])) {

    for ($j=0; $j<2; $j+=1){
        if ($j==0){
            echo "<table  class='table align-middle table-success table-bordered border-secondary'>";
            search1();
        }
        else {
            echo "<table  class='table align-middle table-danger table-bordered border-secondary'>";
            search2();
        }
        echo "</table>";
    }
}


?>
        </form>
    <div class="form-floating mb-3">
        <form class="p-4 p-md-5 border rounded-3 bg-light" id="form2" name="form2" method="post" action="courrierEntrant.php?_ijt=ue38c0hkj8hp7mc2o42mbce2g7&_ij_reload=RELOAD_ON_SAVE">
            <button class="w-100 btn btn-lg btn-primary" id="nvCourrierEntrant" type="submit" value="nvCourrierEntrant">Entrez un nouveau courrier Entrant
        </form>
    </div>
    <div class="form-floating mb-3">
        <form  class="p-4 p-md-5 border rounded-3 bg-light" id="form3" name="form3" method="post" action="courrierSortant.php?_ijt=ue38c0hkj8hp7mc2o42mbce2g7&_ij_reload=RELOAD_ON_SAVE">
            <button class="w-100 btn btn-lg btn-primary" id="nvCourrierSortant" type="submit" value="nvCourrierSortant">Entrez un nouveau courrier sortant
        </form>
    </div>
        <div class="form-floating mb-3">
            <form name="test" id="formtest" method="post" action="accueilGestionCourrier.php?test=">
                <button  class="w-100 btn btn-lg btn-primary" id="test" name="test" onclick="a();" >test
            </form>
        </div>
    </div>
</div>
<!--a faire du $get pour mettre en url les info du courrier entrant à modifier via l'id du courrier
entré par 'lutilisateur quil veut modif et utiliser get pour ensuite lire les données et les
réutilisés pour pouvoir modifier ces informations--!>
