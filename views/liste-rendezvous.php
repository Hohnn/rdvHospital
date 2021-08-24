<?php
require '../controllers/controller.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Liste</title>
    <link rel="stylesheet" href="../assets/style/style.css">

</head>
<body>
    <div class="container">
        <h1>Liste des rendez-vous</h1>
        <div class="row g-3 mb-4">
<?php 

foreach ($allRdv as $rdv) { ?>
            <div class="col-12">
                <div class="card d-flex flex-row myCard align-items-center">
                    <span><i class="bi bi-person-fill"></i> <?= $rdv['lastname'] ?> <?= $rdv['firstname'] ?></span>
                    <span><i class="bi bi-clock"></i> <?= $rdv['datehour'] ?></span>
                    <form action="./rendezvous.php" method="post">
                        <input type="hidden" name="id" value="<?= $rdv['id'] ?>">
                        <button type="submit" name="rdvInfo" value="ok" class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                    </form>
                    <form action="./liste-rendezvous.php" method="post" class="ms-3">
                        <input type="hidden" name="idApp" value="<?= $rdv['id'] ?>">
                        <button type="submit" name="deleteRdv" class="btn btn-primary"><i class="bi bi-x-square"></i></button>
                    </form>
                </div>
            </div>
<?php
    }?>
        </div>
        <div class="col-12 d-flex ">
            <div class="wrapBtn">
                <a href="../index.php" class="btn btn-outline-dark" >Accueil</a>
                <a href="./ajout-rendezvous.php" class="btn btn-primary" >Créer un rdv</a>
            </div>
        </div>
    </div>
</body>
</html>