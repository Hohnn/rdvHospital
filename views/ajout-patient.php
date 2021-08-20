<?php
require '../controllers/controller.php'

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
        <form class="row g-3 needs-validation myForm"  action="./ajout-patient.php" method="post" novalidate>
            <div class="col-12">
                <label for="firstname" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="firstname" name="firstName" required>
                <div class="valid-feedback">
                Looks good!
                </div>
            </div>
            <div class="col-12">
                <label for="lastname" class="form-label">Nom</label>
                <input type="text" class="form-control" id="lastname" name="lastName" required>
                <div class="valid-feedback">
                Looks good!
                </div>
            </div>
            <div class="col-12">
                <label for="birthdate" class="form-label">Date de naissance</label>
                <input type="date" class="form-control" id="birthdate" name="birthDate" required>
                <div class="invalid-feedback">
                Please provide a valid city.
                </div>
            </div>
            <div class="col-12">
                <label for="phone" class="form-label">Téléphone</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
                <div class="invalid-feedback">
                Please provide a valid city.
                </div>
            </div>
            <div class="col-12">
                <label for="mail" class="form-label">Mail</label>
                <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                <input type="text" class="form-control" id="mail" name="mail" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                    Please choose a username.
                </div>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit" name="submit">Envoyé</button>
            </div>
            <div class="col-12 d-flex justify-content-between">
                <a href="../index.php" class="btn btn-outline-dark" >Accueil</a>
                <a href="./liste-patients.php" class="btn btn-primary" >Liste</a>
            </div>
        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Merci</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Votre inscrition a bien été prise en compte.
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
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