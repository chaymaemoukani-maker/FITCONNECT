<?php

class AbonnementRepository
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM abonnement";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM abonnement
                WHERE id_abonnement = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function abonnementActifExiste($id_adherent)
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
        $type_abonnement,
        $prix,
        $date_debut,
        $date_fin,
        $statut,
        $id_adherent
    ){
        $sql = "INSERT INTO abonnement
                (type_abonnement, prix, date_debut, date_fin, statut, id_adherent)
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            $type_abonnement,
            $prix,
            $date_debut,
            $date_fin,
            $statut,
            $id_adherent
        ]);
    }

    public function update(
        $id,
        $type_abonnement,
        $prix,
        $date_debut,
        $date_fin,
        $statut
    ){
        $sql = "UPDATE abonnement
                SET type_abonnement = ?,
                    prix = ?,
                    date_debut = ?,
                    date_fin = ?,
                    statut = ?
                WHERE id_abonnement = ?";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            $type_abonnement,
            $prix,
            $date_debut,
            $date_fin,
            $statut,
            $id
        ]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM abonnement
                WHERE id_abonnement = ?";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([$id]);
    }
}