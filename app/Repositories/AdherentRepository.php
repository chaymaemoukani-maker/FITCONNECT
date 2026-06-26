<?php

class AdherentRepository
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM adherent";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM adherent WHERE id_adherent = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function add(
        $nom,
        $prenom,
        $email,
        $password,
        $telephone,
        $date_inscription,
        $id_salle
    ){
        $sql = "INSERT INTO adherent
                (nom,prenom,email,password,telephone,date_inscription,id_salle)
                VALUES(?,?,?,?,?,?,?)";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            $nom,
            $prenom,
            $email,
            $password,
            $telephone,
            $date_inscription,
            $id_salle
        ]);
    }
    public function update(
    $id,
    $nom,
    $prenom,
    $email,
    $telephone,
    $id_salle
){
    $sql = "UPDATE adherent
            SET nom = ?,
                prenom = ?,
                email = ?,
                telephone = ?,
                id_salle = ?   
            WHERE id_adherent = ?";

    $stmt = $this->conn->prepare($sql);

    return $stmt->execute([
        $nom,
        $prenom,
        $email,
        $telephone,
        $id_salle,
        $id
    ]);
}

public function delete($id)
{
    // Vérifier séances
    $sql = "SELECT COUNT(*) FROM seance
            WHERE id_adherent = ?";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$id]);

    if($stmt->fetchColumn() > 0){
        return false;
    }

    // Vérifier abonnement actif
    $sql = "SELECT COUNT(*)
            FROM abonnement
            WHERE id_adherent = ?
            AND date_fin >= CURDATE()";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$id]);

    if($stmt->fetchColumn() > 0){
        return false;
    }

    $sql = "DELETE FROM adherent
            WHERE id_adherent = ?";

    $stmt = $this->conn->prepare($sql);

    return $stmt->execute([$id]);
}
}