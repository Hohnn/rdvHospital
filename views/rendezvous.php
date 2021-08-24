<?php
require '../controllers/controller.php';
if (empty($_POST)) {
    header('Location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Profil</title>
    <link rel="stylesheet" href="../assets/style/style.css">
</head>
<body>
    <div class="container">
    <form class="row g-3 needs-validation myForm"  action="" method="post" novalidate>
        <input type="hidden" name="id" value="<?= $_POST['id'] ?>">
        <div class="col-12">
        <label for="name" class="form-label">Nom Prénom</label>
            <select class="form-select" aria-label="Default select example" name="idRdv" id="name" disabled>
                <option selected value="<?= $rdvInfo['idPatients'] ?>"><?= $rdvInfo['firstname'] ?> <?= $rdvInfo['lastname'] ?></option>
<?php foreach ($patientsInfos as $patient) { ?>
                <option value="<?= $patient['id'] ?>"><?= $patient['firstname'] ?> <?= $patient['lastname'] ?></option>
<?php } ?>
                </select>
            </div>
            <div class="col-12">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="<?= $date ?>" required disabled>
                <div class="valid-feedback">
                Looks good!
                </div>
            </div>
            <div class="col-12">
                <label for="hour" class="form-label">Heure</label>
                <select class="form-select" aria-label="Default select example" name="hour" required disabled>
                    <option selected hidden><?= $hour ?></option>
<?php  for ($i=8; $i < 18; $i++) { 
    if ($i >=  8 || $i <= 17) {  ?>
                    <option value="<?= $i ?>" <?= $i == 12 ? 'disabled' : '' ?>><?= $i ?> : 00</option>
<?php }} ?>
                </select>                
                <div class="valid-feedback">
                Looks good!
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary w-100" type="button" id="edit">modifier</button>
            </div>
            <div class="col-12">
                <button class="btn btn-primary w-100 d-none" id="submit" type="submit" name="submitUpdateRdv" value="ok">Envoyé</button>
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
            <h5 class="modal-title" id="exampleModalLabel">Modification</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            La modification a bien été prise en compte.
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>

    </div>
    <script>
        const edit = document.getElementById('edit');
        const inputs = document.querySelectorAll('input, select');
        edit.addEventListener('click', () => {
            inputs.forEach(input => {
                input.removeAttribute('readonly');
                input.removeAttribute('disabled');
            })
            edit.classList.add('d-none');
            submit.classList.remove('d-none')
        })
        
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

        <script> var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
            keyboard: false
        })
<?php if ($update) { ?>
            myModal.show();
        </script>
<?php } ?>
</body>
</html>