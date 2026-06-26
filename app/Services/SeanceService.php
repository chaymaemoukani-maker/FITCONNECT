<?php

class SeanceService
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
    public function getAdherents()
{
    return $this->repository->getAdherents();
}

public function getSalles()
{
    return $this->repository->getSalles();
}

   public function add(
    $date_seance,
    $duree,
    $id_adherent,
    $id_salle,
    $id_activite,
    $id_equipement
){
        if($this->repository->abonnementValide($id_adherent) == 0)
        {
            return false;
        }

       return $this->repository->add(
    $date_seance,
    $duree,
    $id_adherent,
    $id_salle,
    $id_activite,
    $id_equipement
);
    }

   public function update(
    $id,
    $date_seance,
    $duree,
    $id_salle,
    $id_activite,
    $id_equipement
){
    return $this->repository->update(
        $id,
        $date_seance,
        $duree,
        $id_salle,
        $id_activite,
        $id_equipement
    );
}

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
    public function getActivites()
{
    return $this->repository->getActivites();
}

public function getEquipements()
{
    return $this->repository->getEquipements();
}
}