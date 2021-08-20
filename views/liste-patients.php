<?php
require '../controllers/controller.php';
require '../controllers/liste-controller.php'
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
        <h1>Liste des patients</h1>
        <div class="row g-3 mb-4">
<?php 

foreach ($patientsInfos as $patient) { ?>
            <div class="col-12">
                <div class="card d-flex flex-row myCard">
                    <span><i class="bi bi-person-fill"></i> <?= $patient['lastname'] ?> <?= $patient['firstname'] ?></span>
                    <span><i class="bi bi-envelope"></i> <?= $patient['mail'] ?></span>
                    <form action="./profil-patient.php" method="post">
                        <input type="hidden" name="id" value="<?= $patient['id'] ?>">
                        <button type="submit" name="profil" value="ok" class="btn btn-primary"><i class="bi bi-person-lines-fill"></i></button>
                    </form>
                    <form action="" method="get" class="ms-3">
                        <input type="hidden" name="id" value="<?= $patient['id'] ?>">
                        <button type="submit" name="delete" value="ok" class="btn btn-primary"><i class="bi bi-x-square"></i></button>
                    </form>
                </div>
            </div>
<?php
    }?>
        </div>
        <div class="col-12 d-flex ">
            <div class="wrapBtn">
                <a href="../index.php" class="btn btn-outline-dark" >Accueil</a>
                <a href="./ajout-patient.php" class="btn btn-primary" >Inscription</a>
            </div>
        </div>
    </div>
</body>
</html>