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
        <h1 class="text-center text-uppercase mt-3">Information Patient</h1>
        <form class="row g-3 needs-validation myForm"  action="./profil-patient.php" method="post" novalidate>
            <input type="hidden" name="id" value="<?= $patientInfo['id'] ?>">
            <div class="col-12">
                <label for="firstname" class="form-label">Prénom</label>
                <input type="text" class="form-control" value="<?= $patientInfo['firstname'] ?>" id="firstname" name="firstName" required disabled readonly>
                <div class="valid-feedback">
                Looks good!
                </div>
            </div>
            <div class="col-12">
                <label for="lastname" class="form-label">Nom</label>
                <input type="text" class="form-control" value="<?= $patientInfo['lastname'] ?>" id="lastname" name="lastName" required disabled readonly>
                <div class="valid-feedback">
                Looks good!
                </div>
            </div>
            <div class="col-12">
                <label for="birthdate" class="form-label">Date de naissance</label>
                <input type="date" class="form-control" value="<?= $patientInfo['birthdate'] ?>" id="birthdate" name="birthDate" required disabled readonly>
                <div class="invalid-feedback">
                Please provide a valid city.
                </div>
            </div>
            <div class="col-12">
                <label for="phone" class="form-label">Téléphone</label>
                <input type="text" class="form-control" value="<?= $patientInfo['phone'] ?>"  id="phone" name="phone" required disabled readonly>
                <div class="invalid-feedback">
                Please provide a valid city.
                </div>
            </div>
            <div class="col-12">
                <label for="mail" class="form-label">Mail</label>
                <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                <input type="text" class="form-control" value="<?= $patientInfo['mail'] ?>"  id="mail" name="mail" required disabled readonly>
                <div class="invalid-feedback">
                    Please choose a username.
                </div>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-grad m-0 w-100" type="button" id="edit">modifier</button>
            </div>

            <div class="col-12">
                <button class="btn btn-grad m-0 d-none" id="submit" type="submit" name="submitProfil">Confirmer</button>
            </div>
            <div class="col-12 d-flex justify-content-between">
                <a href="../index.php" class="btn btn-grad2 m-0" >Accueil</a>
                <a href="./liste-patients.php" class="btn btn-grad2 m-0" >Liste</a>
            </div>
        </form>
        <h1>Liste des rendez-vous</h1>
        <div class="row g-3 mb-4">
<?php 

foreach ($rdvByPatient as $rdv) { ?>
            <div class="col-12">
                <div class="card d-flex flex-row myCard">
                    <span><i class="bi bi-person-fill"></i> <?= $rdv['lastname'] ?> <?= $rdv['firstname'] ?></span>
                    <span><i class="bi bi-clock"></i> <?= $rdv['datehour'] ?></span>
                    <form action="./rendezvous.php" method="post">
                        <input type="hidden" name="id" value="<?= $rdv['id'] ?>">
                        <button type="submit" name="rdvInfo" value="ok" class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                    </form>
                    <form action="./profil-patient.php" method="post" class="ms-3">
                        <input type="hidden" name="id" value="<?= $_POST['id'] ?>">
                        <input type="hidden" name="idApp" value="<?= $rdv['id'] ?>">
                        <button type="submit" name="deleteRdv" class="btn btn-secondary"><i class="bi bi-x-square"></i></button>
                    </form>
                </div>
            </div>
<?php
    }?>
        </div>
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
        const inputs = document.querySelectorAll('input');
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

    <?php if ($update) { ?>
        <script>var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
            keyboard: false
          })
          myModal.show();</script>
   <?php } ?>
</body>
</html>