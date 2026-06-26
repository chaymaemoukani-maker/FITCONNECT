<?php

class AdherentService
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
    public function getSalles()
{
    return $this->repository->getSalles();
}

    public function add(
        $nom,
        $prenom,
        $email,
        $telephone,
        $date,
        $id_salle
    ){
        return $this->repository->add(
            $nom,
            $prenom,
            $email,
            $telephone,
            $date,
            $id_salle
        );
    }

    public function update(
        $id,
        $nom,
        $prenom,
        $email,
        $telephone,
        $id_salle
    ){
        return $this->repository->update(
            $id,
            $nom,
            $prenom,
            $email,
            $telephone,
            $id_salle
        );
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}