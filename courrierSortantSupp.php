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
            <h1 class="display-4 fw-bold lh-1 mb-3">Suppression du courrier </h1>
            <h2>êtes vous sûr de vouloir supprimer ce courrier?</h2>
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
            <form  class="p-4 p-md-5 border rounded-3 bg-light" id="form1" name="form1" method="post">


                <button class="w-100 btn btn-lg btn-primary" value="ok" type="submit" name="ok" id="ok">Oui</button>
            </form>
        </div>
    </div>
</div>
<?php
$id = $_GET["id"];
if(isset($_POST["ok"])){
    $pdo = new PDO("mysql:dbname=gestioncourrier2;host=127.0.0.1", "root", "");
    $stmtsupp = $pdo->prepare("DELETE FROM sortant WHERE id = :id; DELETE FROM courrier WHERE id = :id");
    $stmtsupp->bindParam(':id', $id, PDO::PARAM_INT);
    $stmtsupp->execute();

}
?>