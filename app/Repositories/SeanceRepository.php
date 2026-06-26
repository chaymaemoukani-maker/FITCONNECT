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
        $sql = "SELECT * FROM seance";
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

    public function add(
        $date_seance,
        $duree,
        $id_adherent,
        $id_salle
    ){
        $sql = "INSERT INTO seance
                (date_seance,duree,id_adherent,id_salle)
                VALUES(?,?,?,?)";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            $date_seance,
            $duree,
            $id_adherent,
            $id_salle
        ]);
    }

    public function update(
        $id,
        $date_seance,
        $duree,
        $id_salle
    ){
        $sql = "UPDATE seance
                SET date_seance = ?,
                    duree = ?,
                    id_salle = ?
                WHERE id_seance = ?";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            $date_seance,
            $duree,
            $id_salle,
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