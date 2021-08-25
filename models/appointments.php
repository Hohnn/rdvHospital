<?php 
class Appointments extends database {

    public function setRdv ($datehour, $idPatient){
        $bdd = $this->connectDatabase();
        $condition = "INSERT INTO appointments (datehour, idPatients)
        VALUES (?, ?)";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $datehour, PDO::PARAM_STR);
        $result->bindValue(2, $idPatient, PDO::PARAM_INT);
        $result->execute();
        return $result;
    }

    public function getRdv (){
        $bdd = $this->connectDatabase();
        $condition = "SELECT  `appointments`.`id`, `idPatients`, `firstname`, `lastname`, DATE_FORMAT(`datehour`, '%d/%m/%Y %H:%i') as datehour FROM appointments
        inner join patients on patients.id = appointments.idPatients order by datehour";
        $result = $bdd->query($condition)->fetchAll();
        return $result;
    }

    public function deleteRdv ($id){
        $bdd = $this->connectDatabase();
        $condition = "DELETE FROM appointments WHERE id = ?";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $id, PDO::PARAM_INT);
        $result->execute();
    }

    public function getRdvInfo($id){
        $condition = "SELECT  `appointments`.`id`, `idPatients`, `firstname`, `lastname`, `datehour` FROM appointments
        inner join patients on patients.id = appointments.idPatients WHERE appointments.id = ?";
        $bdd = $this->connectDatabase();
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $id, PDO::PARAM_INT);
        $result->execute();
        $fetch = $result->fetch(); /* pas fetchAll pour pas avoir 2 array */
        return $fetch;
    }

    public function updateRdv($id, $datehour, $idPatients){
        $condition = "UPDATE appointments SET datehour = ?, idPatients = ? WHERE id = ?";
        $bdd = $this->connectDatabase();
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $datehour, PDO::PARAM_STR);
        $result->bindValue(2, $idPatients, PDO::PARAM_INT);
        $result->bindValue(3, $id, PDO::PARAM_INT);
        $result->execute();
        return $result;
    }

    public function getRdvByPatient($idPatient){
        $condition = "SELECT  `appointments`.`id`, `idPatients`, `firstname`, `lastname`, DATE_FORMAT(`datehour`, '%d/%m/%Y %h:%i') as datehour FROM appointments
        inner join patients on patients.id = appointments.idPatients WHERE appointments.idPatients = ? order by datehour";
        $bdd = $this->connectDatabase();
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $idPatient, PDO::PARAM_INT);
        $result->execute();
        $fetch = $result->fetchAll();
        return $fetch;
    }

    public function checkSameRdv($datehour){
        $condition = "SELECT * FROM appointments
        where dateHour = ' ? '";
        $bdd = $this->connectDatabase();
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $datehour, PDO::PARAM_STR);
        $result->execute();
        $fetch = $result->fetch(); /* pas fetchAll pour pas avoir 2 array */
        return $fetch;
    }


    public function deletePatientRdv($idPatient){
        $condition = "DELETE FROM appointments WHERE idPatients = ? ";
        $bdd = $this->connectDatabase();
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $idPatient, PDO::PARAM_INT);
        $result->execute();
    }


}