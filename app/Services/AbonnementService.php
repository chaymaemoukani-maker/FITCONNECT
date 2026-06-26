<?php

class AbonnementService
{
    private $repository;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function getById($id)
    {
        return $this->repository->getById($id);
    }

    public function add(
        $type_abonnement,
        $prix,
        $date_debut,
        $date_fin,
        $statut,
        $id_adherent
    ){
        // Règle métier :
        // un adhérent ne peut avoir qu'un seul abonnement actif

        if($this->repository->abonnementActifExiste($id_adherent) > 0)
        {
            return false;
        }

        return $this->repository->add(
            $type_abonnement,
            $prix,
            $date_debut,
            $date_fin,
            $statut,
            $id_adherent
        );
    }

    public function update(
        $id,
        $type_abonnement,
        $prix,
        $date_debut,
        $date_fin,
        $statut
    ){
        return $this->repository->update(
            $id,
            $type_abonnement,
            $prix,
            $date_debut,
            $date_fin,
            $statut
        );
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}