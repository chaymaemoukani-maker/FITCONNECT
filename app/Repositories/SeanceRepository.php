<?php

class SeanceRepository
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $sql = "SELECT
            seance.*,
            adherent.nom,
            adherent.prenom,
            salle.nom_salle,
            activite.nom_activite,
            equipement.nom_equipement
        FROM seance
        INNER JOIN adherent
            ON seance.id_adherent = adherent.id_adherent
        INNER JOIN salle
            ON seance.id_salle = salle.id_salle
        INNER JOIN activite
            ON seance.id_activite = activite.id_activite
        LEFT JOIN equipement
            ON seance.id_equipement = equipement.id_equipement";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM seance WHERE id_seance = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getActivites()
    {
        $sql = "SELECT * FROM activite";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    public function getEquipements()
    {
        $sql = "SELECT * FROM equipement";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    public function abonnementValide($id_adherent)
    {
        $sql = "SELECT COUNT(*)
                FROM abonnement
                WHERE id_adherent = ?
                AND date_fin >= CURDATE()";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id_adherent]);

        return $stmt->fetchColumn();
    }
    public function getAdherents()
{
    $sql = "SELECT id_adherent, nom, prenom
            FROM adherent
            ORDER BY nom, prenom";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute();

    return $stmt;
}


public function getSalles()
{
    $sql = "SELECT id_salle, nom_salle FROM salle";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute();

    return $stmt;
}

    public function add(
        $date_seance,
        $duree,
        $id_adherent,
        $id_salle,
        $id_activite,
        $id_equipement
    ){
        $sql = "INSERT INTO seance
                (date_seance,duree,id_adherent,id_salle,id_activite,id_equipement)
                VALUES(?,?,?,?,?,?)";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            $date_seance,
            $duree,
            $id_adherent,
            $id_salle,
            $id_activite,
            $id_equipement
        ]);
    }
public function update(
    $id,
    $date_seance,
    $duree,
    $id_adherent,
    $id_salle,
    $id_activite,
    $id_equipement
){
    $sql = "UPDATE seance
            SET date_seance = ?,
                duree = ?,
                id_adherent = ?,
                id_salle = ?,
                id_activite = ?,
                id_equipement = ?
            WHERE id_seance = ?";

    $stmt = $this->conn->prepare($sql);

    return $stmt->execute([
        $date_seance,
        $duree,
        $id_adherent,
        $id_salle,
        $id_activite,
        $id_equipement,
        $id
    ]);
}

    public function delete($id)
    {
        $sql = "DELETE FROM seance WHERE id_seance = ?";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([$id]);
    }
}