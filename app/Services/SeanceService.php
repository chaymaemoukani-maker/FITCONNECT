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

    public function add(
        $date_seance,
        $duree,
        $id_adherent,
        $id_salle
    ){
        if($this->repository->abonnementValide($id_adherent) == 0)
        {
            return false;
        }

        return $this->repository->add(
            $date_seance,
            $duree,
            $id_adherent,
            $id_salle
        );
    }

    public function update(
        $id,
        $date_seance,
        $duree,
        $id_salle
    ){
        return $this->repository->update(
            $id,
            $date_seance,
            $duree,
            $id_salle
        );
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}