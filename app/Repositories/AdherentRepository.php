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
        $stmt = $this->conn->prepare("SELECT * FROM adherent");
        $stmt->execute();
        return $stmt;
    }

    public function getSalles()
    {
        $stmt = $this->conn->prepare("SELECT * FROM salle");
        $stmt->execute();
        return $stmt;
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM adherent WHERE id_adherent = ?");
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function add(
        $nom,
        $prenom,
        $email,
        $telephone,
        $date_inscription,
        $id_salle
    ) {
        $stmt = $this->conn->prepare("
            INSERT INTO adherent
            (nom, prenom, email, telephone, date_inscription, id_salle)
            VALUES (?, ?, ?, ?, ?, ?)
        ");

        return $stmt->execute([
            $nom,
            $prenom,
            $email,
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
    ) {
        $stmt = $this->conn->prepare("
            UPDATE adherent
            SET nom = ?,
                prenom = ?,
                email = ?,
                telephone = ?,
                id_salle = ?
            WHERE id_adherent = ?
        ");

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
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM seance WHERE id_adherent = ?");
        $stmt->execute([$id]);

        if ($stmt->fetchColumn() > 0) {
            return false;
        }

        $stmt = $this->conn->prepare("
            SELECT COUNT(*)
            FROM abonnement
            WHERE id_adherent = ?
            AND date_fin >= CURDATE()
        ");
        $stmt->execute([$id]);

        if ($stmt->fetchColumn() > 0) {
            return false;
        }

        $stmt = $this->conn->prepare("DELETE FROM adherent WHERE id_adherent = ?");
        return $stmt->execute([$id]);
    }
}




