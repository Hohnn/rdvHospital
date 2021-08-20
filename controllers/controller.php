<?php 
require '../models/database.php';
require '../models/patients.php';
require '../models/appointments.php';
$patients = new Patients();
$app = new Appointments();


$register = false;
if (isset($_POST['submit'])) {
    $register = false;
    $register = true;
    
    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $email = $_POST['mail'];
    $phone = $_POST['phone'];
    $birthDate = $_POST['birthDate'];
    
    $patients->setPatient($lastName, $firstName, $birthDate, $phone, $email );

}

$patientsInfos = $patients->getAllPatientInfos();

if (isset($_POST['profil'])) {
    $patientInfo = $patients->getPatient($_POST['id']);
    $rdvByPatient = $app->getRdvByPatient($_POST['id']);
}

$update = false;
if (isset($_POST['submitProfil'])) {
    $patients->updatePatient($_POST['id'], $_POST['lastName'], $_POST['firstName'], $_POST['birthDate'], $_POST['phone'], $_POST['mail']);
    $patientInfo = $patients->getPatient($_POST['id']);
    $update = false;
    $update = true;
}

if (isset($_GET['delete'])) {
    $patients->deletePatient($_GET['id']);
    header('Location: ./liste-patients.php');
}


if (isset($_POST['submitRdv'])) {
    $date = $_POST['date'];
    $hour = $_POST['hour'];
    $fullDate = $date . ' ' . $hour;
    $app->setRdv( $fullDate, $_POST['idRdv']);
    $register = false;
    $register = true;
}

$allRdv = $app->getRdv();

if (isset($_POST['deleteRdv'])) {
    $app->deleteRdv($_POST['idApp']);
    $allRdv = $app->getRdv();
    $rdvByPatient = $app->getRdvByPatient($_POST['id']);
    $patientInfo = $patients->getPatient($_POST['id']);
}

if (isset($_POST['rdvInfo'])) {
    $rdvInfo = $app->getRdvInfo($_POST['id']);
    $time = $rdvInfo['datehour'];
    $time = explode(' ', $time);
    $date = $time[0];
    $hour = $time[1];
}

if (isset($_POST['submitUpdateRdv'])) {
    $date = $_POST['date'];
    $hour = $_POST['hour'];
    $fullDate = $date . ' ' . $hour;
    $app->updaterdv($_POST['id'], $fullDate, $_POST['idRdv']);
    $rdvInfo = $app->getRdvInfo($_POST['id']);
    $time = $rdvInfo['datehour'];
    $date = $time[0];
    $hour = $time[1];
    $update = false;
    $update = true;
}

