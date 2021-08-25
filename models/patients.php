<?php

class Patients extends database {
        /**
     * Connect to database
     * return SQL connection
     * @param string $condition
     */
    public function returnFetch($condition){
        $bdd = $this->connectDatabase();
        $result = $bdd->query($condition)->fetchAll();   
        return $result;
    }

    public function getAllPatientInfos(){
        $condition = "SELECT *, DATE_FORMAT(`birthdate`, '%d/%m/%Y') as birthdate2 FROM patients";
        return $this->returnFetch($condition);
    }

    public function setPatient($lastname, $firstname, $birthdate, $phone, $email){
        $sql = "INSERT INTO patients (lastname, firstname, birthdate, phone, mail)
            VALUES (?, ?, ?, ?, ?)";  /* attention à l'ordre avec ? */ 
        $bdd = $this->connectDatabase();
        $result = $bdd->prepare($sql);
        $result->bindValue(1, $lastname, PDO::PARAM_STR);
        $result->bindValue(2, $firstname, PDO::PARAM_STR);
        $result->bindValue(3, $birthdate, PDO::PARAM_STR);
        $result->bindValue(4, $phone, PDO::PARAM_STR);
        $result->bindValue(5, $email, PDO::PARAM_STR);
        $result->execute(); 
        return $result;
    }

    public function getPatient($id){
        $condition = "SELECT * FROM patients WHERE id = $id";
        $bdd = $this->connectDatabase();
        $result = $bdd->query($condition)->fetch(); /* pas fetchAll pour pas avoir 2 array */
        return $result;
    }

    public function updatePatient($id, $lastname, $firstname, $birthdate, $phone, $email){
        $condition = "UPDATE patients SET lastname = ?, firstname = ?, birthdate = ?, phone = ?, mail = ? WHERE id = ?";
        $bdd = $this->connectDatabase();
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $lastname, PDO::PARAM_STR);
        $result->bindValue(2, $firstname, PDO::PARAM_STR);
        $result->bindValue(3, $birthdate, PDO::PARAM_STR);
        $result->bindValue(4, $phone, PDO::PARAM_STR);
        $result->bindValue(5, $email, PDO::PARAM_STR);
        $result->bindValue(6, $id, PDO::PARAM_INT);
        $result->execute();
        return $result;
    }

    public function deletePatient($id){
        $condition = "DELETE FROM patients WHERE id = $id";
        $bdd = $this->connectDatabase();
        $bdd->query($condition);
    }

    public function searchPatient($value){
        $condition = "SELECT * FROM patients WHERE firstname LIKE  ? OR lastname LIKE ?";
        $bdd = $this->connectDatabase();
        $result = $bdd->prepare($condition);
        $result->bindValue(1,'%' . $value . '%', PDO::PARAM_STR);
        $result->bindValue(2, '%' . $value . '%', PDO::PARAM_STR);
        $result->execute();
        return $result->fetchAll();
    }

    public function getPagination($page, $limit){
        $bdd = $this->connectDatabase();
        $sql = 'SELECT * FROM `patients` ORDER BY `id` DESC LIMIT ? , ? ;';
        $query = $bdd->prepare($sql);
        $query->bindValue(1, $page, PDO::PARAM_INT);
        $query->bindValue(2, $limit, PDO::PARAM_INT);
        $query->execute();
        $articles = $query->fetchAll(PDO::FETCH_ASSOC);
        return $articles;
    }

    public function getPatientNumber(){
        $condition = "SELECT COUNT(*) as nb_patients FROM patients";
        $bdd = $this->connectDatabase();
        $result = $bdd->query($condition)->fetch();
        return $result['nb_patients'];
    }

    public function getPatientIdByLastname($lastname, $firstname){
        $condition = "SELECT id FROM patients WHERE lastname = ? AND firstname = ?";
        $bdd = $this->connectDatabase();
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $lastname, PDO::PARAM_STR);
        $result->bindValue(2, $firstname, PDO::PARAM_STR);
        $result->execute();
        return $result->fetch();
    }
}
