<?php
require '../controllers/controller.php';
require '../controllers/liste-controller.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>RDV</title>
    <link rel="stylesheet" href="../assets/style/style.css">
</head>
<body>
    <div class="container">
        <form class="row g-3 needs-validation myForm"  action="" method="post" novalidate>
            <div class="col-12">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
                <div class="valid-feedback">
                Looks good!
                </div>
            </div>
            <div class="col-12">
                <label for="hour" class="form-label">Heure</label>
                <select class="form-select" aria-label="Default select example" name="hour">
                    <option selected>Open this select menu</option>
<?php  for ($i=8; $i < 18; $i++) { 
    if ($i < 12 || $i > 13) {  ?>
                    <option value="<?= $i ?>"><?= $i ?>:00</option>
<?php }} ?>
                </select>                
                <div class="valid-feedback">
                Looks good!
                </div>
            </div>
            <div class="col-12">
                <select class="form-select" aria-label="Default select example" name="idRdv">
                    <option selected>Open this select menu</option>
<?php foreach ($patientsInfos as $patient) { ?>
                    <option value="<?= $patient['id'] ?>"><?= $patient['firstname'] ?> <?= $patient['lastname'] ?></option>
<?php } ?>
                </select>
            </div>
            <div class="col-12">
                <button class="btn btn-primary w-100" type="submit" name="submitRdv">Envoyé</button>
            </div>
            <div class="col-12 d-flex justify-content-between">
                <a href="../index.php" class="btn btn-outline-dark" >Accueil</a>
                <a href="./liste-rendezvous.php" class="btn btn-primary" >Liste</a>
            </div>
        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Rendez-vous</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Votre rendez-vous a bien été prise en compte.
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        </div>
        </div>
    </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    
    <?php if ($register) { ?>
        <script>var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
            keyboard: false
          })
          myModal.show();</script>
   <?php } ?>

</body>
</html>